<?php
if (!isset($_SESSION['token'])) {
  header('location: forgot-password');
}
$resetp = new AuthController();
$resetp->passwordReset();
?>

<v-app>
<v-card width="400" class="mx-auto mt-5">
  <v-card-title>
    <h1 class="display-1">Reset Password</h1>
  </v-card-title>
  <v-card-text>
<!-- Really need to make a validation function/class -->
    <?php if(count($resetp->errors) > 0): ?>
        <v-alert type="warning">
          <?php foreach($resetp->errors as $error): ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </v-alert>
    <?php endif; ?>

    <v-form action="" method="post">
      <div class="form-group">
        <v-text-field type="password" name="password" value="" class="form-control form-control-lg"

          :type="showPassword ? 'text' : 'password'"
          :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="showPassword = !showPassword"
          label="Password"
          prepend-icon="mdi-lock"

           required>
      </div>

      <div class="form-group">
        <v-text-field type="password" name="passwordConf" value="" class="form-control form-control-lg"

          :type="showPassword ? 'text' : 'password'"
          :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="showPassword = !showPassword"
          label="Confirm Password"
          prepend-icon="mdi-shield-check"

           required>
      </div>
      <v-divider></v-divider>
      <v-card-actions>
        <div class="uk-align-center">
          <v-btn type="submit" color="success" name="reset-password-btn" class="uk-align-center">Recover Password</v-btn>
        </div>
      </v-card-actions>
    </v-form>
  </v-card-text>
</v-card>
</v-app>
