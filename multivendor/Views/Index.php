<?php
// verify the user using token
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  AuthController::verifyUser($token);
  AuthController::resetPassword($token);
}

// if (isset($_GET['password-token'])) {
//   $passwordToken = $_GET['password-token'];
//   resetPassword($passwordToken);
// }


?>
<div class="uk-container">
  <h1>Welcome to our Multi Vendor</h1>
</div>

<!-- this page should have a bunch of crap about the Multi Vendor -->
