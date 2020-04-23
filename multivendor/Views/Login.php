<?php
  header('Location: /fedorae/login');
  $login = new AuthController();
  $login->login();
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
            sm="8"
            md="4"
          >
          <!-- error output -->
          <?php if(count($login->errors) > 0): ?>
            <v-alert type="warning">
              <?php foreach($login->errors as $error): ?>
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
                <v-toolbar-title>Login</v-toolbar-title>
                <v-spacer />
                <v-tooltip bottom>
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form action="" method="POST">
                  <div class="form-group">
                    <v-text-field type="text" name="username" value="" class="form-control form-control-lg"
                      name="name"
                      label="Username or Email"
                      prepend-icon="mdi-account-circle"
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
                  <v-divider></v-divider>
                  <v-card-actions>
                    <input type="hidden" name="token" value="<?php //echo Token::generate(); ?>">
                    <v-btn color="success"><a style="color: #fff; text-decoration: none;" href="/fedorae/multivendor/register">Register</a></v-btn>
                    <v-spacer></v-spacer>
                    <v-btn type="submit" name="login-btn" color="info">Login</v-btn>
                  </v-card-actions>
                  <div class="uk-text-center">
                    <div class="">
                      <br />
                      <p class=""><a class="" href="forgot-password">Forgot password?</a></p>
                      <br />
                    </div>
                  </div>
                </v-form>
              </v-card-text>

            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>
