<?php
require_once './Core/const.php';
require_once './vendor/autoload.php';

class MailUp {
  # Don't repeat code - fix that!

  public static function sendVerificationEmail($email, $username, $token){

    // Create the Transport
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(PASSWORD);

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

    $body = '<!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Verify Email</title>
      </head>
      <body>
        <div class="uk-container">
          <p>Hello '. $username.',<br/>
          <p>Thank you for signing up on our website. Please click on the link below to verify your email.</p>
          <a href="http://localhost/fedorae/multivendor/index.php?token='. $token .'">
            Verify your email address
          </a>
        </div>
        <div>
        <br />
          <p>Department of Computer & Information Sciences<br/>
            Northern Caribbean University<br/>
            Mandeville P.O., Manchester, JA, W.I.<br/>
            T: (876) 123-4578 w: https:\\\abc.com</p>
        </div>
      </body>
    </html>';

    // Create a message
    $message = (new Swift_Message('Multi-Vendor - Please verify your new multi-vendor account.'))
      ->setFrom([EMAIL => 'Fedorae Verification'])
      ->setTo([$email => $username])
      ->setBody($body, 'text/html');

      // Send the message
      $result = $mailer->send($message);
      return $result;
  }


  public static function sendPasswordResetLink($email, $username, $token){

    // Create the Transport
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(PASSWORD);

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  $body = '<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Verify Email</title>
    </head>
    <body>
      <div class="uk-container">
        <p>Hello '. $username.',<br/>
          Click the link below to reset your password.
        </p>
        <a href="http://localhost/fedorae/multivendor/index.php?password-token='. $token .'">
          Reset Password
        </a>
      </div>
      <div>
      <br />
        <p>Department of Computer & Information Sciences<br/>
          Northern Caribbean University<br/>
          Mandeville P.O., Manchester, JA, W.I.<br/>
          T: (876) 123-4578 w: https:\\\abc.com</p>
      </div>
    </body>
  </html>';

  // Create a message
  $message = (new Swift_Message('Multi-Vendor - Seems like you have forgotten your password.'))
    ->setFrom([EMAIL => 'Fedorae Password Reset'])
    ->setTo([$email => $username])
    ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);
    return $result;
  }
}
