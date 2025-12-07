<?php

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}

// what was previous website
$previous = $_SERVER['HTTP_REFERER'];

$userInfo = array(
  'ip' => $ip,
  'userAgent' => $_SERVER['HTTP_USER_AGENT'],
  'previous' => $previous
);

echo json_encode($userInfo);