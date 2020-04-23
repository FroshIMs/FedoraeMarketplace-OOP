<?php
$signup = new AuthController();
$signup->customerSignup();
?>
<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="10"
            md="5"
          >
          <!-- error output -->
          <?php if(count($signup->errors) > 0): ?>
            <v-alert type="warning">
              <?php foreach($signup->errors as $error): ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </v-alert>
          <?php endif; ?>
          <!-- -->
            <v-card class="elevation-12">
              <v-toolbar
                class="uk-secondary"
                dark
                flat
              >
                <v-toolbar-title>Register</v-toolbar-title>
                <v-spacer />
                <v-tooltip bottom>
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form action="" method="POST">
                  <!-- probably should make a function to sanitize the input -->
                  <!-- probably should make a function to handle input -->
                  <div class="form-group">
                    <v-text-field type="text" name="username" value="<?php //echo $_POST['username']; ?>" class="form-control form-control-lg"
                      name="name"
                      label="username"
                      prepend-icon="mdi-account-circle"
                      required>
                  </div>
                  <div class="form-group">
                    <v-text-field type="text" name="email" value="<?php //echo $_POST['email']; ?>" class="form-control form-control-lg"
                      name="email"
                      label="Email"
                      prepend-icon="mdi-email"
                      required>
                  </div>

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

                  <div class="my-2 text-center">
                    <input type="hidden" name="token" value="<?php //echo Token::generate(); ?>">
                    <v-btn class="uk-align-center" type="submit" name="signup-btn" color="primary">Sign Up</v-btn> <br />
                    <label><input class="uk-checkbox" type="checkbox" name="terms" value="1" required> I agree to <a href="#">Terms</a>?</label>
                    <p class="text-center uk-margin-remove">Already have an account? <a style="text-decoration: none;" href="/fedorae/login">Sign In</a></p>
                  </div>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer />

              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>
