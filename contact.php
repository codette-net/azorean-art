<?php
session_start();
// Namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require 'lib/phpmailer/Exception.php';
require 'lib/phpmailer/PHPMailer.php';
require 'lib/phpmailer/SMTP.php';
// load captcha library
require 'vendor/google/recaptcha/src/autoload.php';

require 'config.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// Connect to the MySQL database using the PDO interface
try {
    $pdo = new PDO('mysql:host=' . db_host . ';dbname=' . db_name . ';charset=' . db_charset, db_user, db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to database!');
}
// Check if user submitted the contact form
if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'],  $_POST['g-recaptcha-response'])) {
    // Errors array
    $errors = [];
    // Extra values to store in the database
    $extra = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'city' => $_POST['city'],
        'postal_code' => $_POST['postal_code'],
        'country' => $_POST['country'],
        'contact_method' => $_POST['contact_method'],
        'message' => $_POST['message'],
        'artworkId' => $_POST['artwork_id'],
        'attachments' => ''
    ];
    // Form validation
    // Check to see if the email is valid.
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address!';
    }
    // First name must contain only alphabet characters.
    // if (!preg_match('/^[a-zA-Z]+$/', $_POST['first_name'])) {
    //     $errors['first_name'] = 'First name must contain only characters!';
    // }
    // first name must match letters from any language, spacers, apostrophes and hyphens
    if (!preg_match('/^[\p{L}\s\'\-]+$/', $_POST['first_name'])) {
        $errors['first_name'] = 'First name must contain only characters!';
    }
    // last name must match letters from any language, spacers, apostrophes and hyphens
    if (!preg_match('/^[\p{L}\s\'\-]+$/', $_POST['last_name'])) {
        $errors['last_name'] = 'Last name must contain only characters!';
    }

    // 
    // Message must not be empty
    // if (empty($_POST['message'])) {
    //     $errors['message'] = 'Please enter your message!';
    // }
    $recaptcha = new \ReCaptcha\ReCaptcha('6LfUEvQpAAAAACbwRQhjNcRkek6bp8t07UiB8CNb');
    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

    if (!$resp->isSuccess()) {
        $errors['recaptcha'] = 'Captcha validation failed. Please try again.';
    }
    // Check if the user has uploaded files
    if (!$errors && isset($_FILES['files'])) {
        // Iterate all the uploaded files
        for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
            // Get the file extension (png, jpg, pdf, etc)
            $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
            // The file name will contain a unique code to prevent multiple files with the same name.
            $file_path = file_upload_directory . sha1(uniqid() . $i) .  '.' . $ext;
            // Ensure the file is valid
            if (!empty($_FILES['files']['tmp_name'][$i])) {
                if ($_FILES['files']['size'][$i] <= max_allowed_upload_file_size) {
                    // If everything checks out we can move the uploaded file to its final destination...
                    move_uploaded_file($_FILES['files']['tmp_name'][$i], $file_path);
                    // Append the new file URL to the attachments variable
                    $extra['attachments'] .= $file_path . ',';
                } else {
                    // Format bytes
                    $unit = ['B', 'KB', 'MB', 'GB'];
                    $exp = floor(log(max_allowed_upload_file_size, 1024)) | 0;
                    $size = round(max_allowed_upload_file_size / (pow(1024, $exp)), 2) . $unit[$exp];
                    // Size exceeds threshold
                    $errors[] = 'Uploaded files must be less than ' . $size . '!';
                }
            }
        }
    }
    // If no errors exist
    if (!$errors) {
        // check if all other fields are set and not empty , sanitze them and store them in the extra array
        foreach ($extra as $key => $value) {
            if (isset($_POST[$key]) && !empty($_POST[$key])) {
                $extra[$key] = htmlspecialchars($_POST[$key]);
            }
        }

        // Prepare the final message
        $final_msg = 'Artwork DB ID: ' . $_POST['artwork_id'] . '<br>';
        $final_msg .= 'Name: ' . $_POST['first_name'] . ' ' . $_POST['last_name'] . '<br>';
        $final_msg .= 'Email: ' . $_POST['email'] . '<br>';
        $final_msg .= !empty($_POST['phone']) ? 'Phone: ' . $_POST['phone'] . '<br>' : '';
        $final_msg .= !empty($_POST['address']) ? 'Address: ' . $_POST['address'] . '<br>' : '';
        $final_msg .= !empty($_POST['city']) ? 'City: ' . $_POST['city'] . '<br>' : '';
        $final_msg .= !empty($_POST['postal_code']) ? 'Postal Code: ' . $_POST['postal_code'] . '<br>' : '';
        $final_msg .= !empty($_POST['country']) ? 'Country: ' . $_POST['country'] . '<br>' : '';
        $final_msg .= !empty($_POST['contact_method']) ? 'Contact Method: ' . $_POST['contact_method'] . '<br>' : '';
        $final_msg .= !empty($_POST['message']) ? 'Message: ' . $_POST['message'] . '<br>' : '';


        // Insert the message into the database
        $stmt = $pdo->prepare('INSERT INTO messages (email, msg, extra) VALUES (?,?,?)');
        $stmt->execute([$_POST['email'], $final_msg, json_encode($extra)]);
        // Try to send the mail using PHPMailer
        try {
            // Server settings
            if (SMTP) {
                $mail->isSMTP();
                $mail->Host = smtp_host;
                $mail->SMTPAuth = true;
                $mail->Username = smtp_username;
                $mail->Password = smtp_password;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = smtp_port;
            }
            // Recipients
            $mail->setFrom(mail_from, $_POST['first_name'] . ' ' . $_POST['last_name']);
            $mail->addAddress(support_email, 'Support');
            $mail->addReplyTo($_POST['email'], $_POST['first_name'] . ' ' . $_POST['last_name']);
            // Attachments
            foreach (explode(',', $extra['attachments']) as $attachment) {
                if (!file_exists($attachment)) continue;
                $mail->addAttachment($attachment);
            }
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'AzoreanArt Query by '  . $_POST['first_name'] . ' ' . $_POST['last_name'] . ' - ' . $_POST['email'];
            $mail->Body = $final_msg;
            $mail->AltBody = strip_tags($final_msg);
            // Send mail
            $mail->send();
            // Output success message
            echo '{"success":"<p>We will respond to you as soon as possible!</p>"}';
        } catch (Exception $e) {
            // Output error message
            $errors[] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            echo '{"errors":' . json_encode($errors) . '}';
        }
    } else {
        // Could not send message, output error
        echo '{"errors":' . json_encode($errors) . '}';
    }
}
