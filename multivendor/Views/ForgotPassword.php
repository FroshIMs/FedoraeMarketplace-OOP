<?php
  $forgotp = new AuthController();
  $forgotp->forgotPassword();
 ?>
<template id="">
  <v-app>
  <v-card width="400" class="mx-auto mt-5">
    <v-card-title>
      <h1 class="display-1 uk-align-center">Recover Password</h1>
      <p class="uk-text-small">Please enter the email address you used to sign up and we will assist in recovering your password.</p>
    </v-card-title>
    <v-card-text>

      <?php if(count($forgotp->errors) > 0): ?>
          <v-alert type="warning">
            <?php foreach($forgotp->errors as $error): ?>
              <li><?php echo $error; ?></li>
            <?php endforeach; ?>
          </v-alert>
      <?php endif; ?>

      <v-form action="" method="post">
        <div class="form-group">
          <v-text-field type="text" name="email" value="<?php //echo $email; ?>" class="form-control form-control-lg"
            name="email"
            label="Email"
            prepend-icon="mdi-account-circle"
            required>
        </div>
        <v-divider></v-divider>
        <div class="uk-text-center">
          <v-btn type="submit" color="info" name="forgot-password" class="uk-align-center">Recover Password</v-btn>
          <br />
          <a href="javascript:self.history.back();">Cancel</a>
        </div>
      </v-form>

    </v-card-text>
  </v-card>
</v-app>
</template>
