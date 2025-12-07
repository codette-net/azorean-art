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
            echo '{"success":"<h2>Thank you for contacting us!</h2><p>We will respond to you as soon as possible!</p>"}';
        } catch (Exception $e) {
            // Output error message
            $errors[] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            echo '{"errors":' . json_encode($errors) . '}';
        }