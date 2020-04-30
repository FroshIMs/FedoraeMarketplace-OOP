<?php
  AuthController::logout();
  ProductModel::addToCart();
  CheckoutModel::OrderInfo();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fedorae Company: Online Shopping | Multi Vending | Producer Selling</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.6/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.6/dist/js/uikit-icons.min.js"></script>
    <!-- vuetify -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/includes/style.css">
  </head>
  <body>
    <div id="app"> <!-- Vue/Vuetify controller -->

    <nav class="uk-navbar uk-margin uk-background-secondary uk-light" uk-navbar>
        <div class="uk-navbar-left">
          <a class="uk-navbar-toggle uk-button" uk-navbar-toggle-icon uk-toggle href="#left_menu"></a>
          <a class="uk-navbar-item uk-logo" href="/fedorae">Fedorae</a>
        </div>
        <div class="uk-navbar-center">
            <div>
              <form class="uk-search uk-search-default">
                <span uk-search-icon></span>
                <input class="uk-search-input" type="search" placeholder="Search...">
              </form>
            </div>
            <button type="button" name="button" class="uk-button uk-button-primary"><span uk-icon="icon: search"></span></button>
          </div>
<!-- right options -->
          <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
              <li class="uk-active">
                <div class="uk-inline uk-margin-right">
                  <?php if (isset($_SESSION['username'])): ?>
                    <small>Hey, <a href="login"><?php echo $_SESSION['username']; ?></a></small>
                    <div uk-dropdown>
                      <ul>
                        <p>My Fedorae</p>
                        <li><a style="color: blue;" href="/fedorae/customer">My Account</a> </li>
                        <li><a style="color: blue;" href="?logout=true">Logout</a> </li>
                    </div>
                  <?php else: ?>
                    <small>Hey, <a href="login">Sign in</a></small>
                    <div uk-dropdown>
                      <ul>
                        <p>Sign in options</p>
                        <li><a style="color: blue;" href="/fedorae/login">Customer</a> </li>
                        <li><a style="color: blue;" href="/fedorae/login">Seller</a> </li>
                        <li><a style="color: blue;" href="/fedorae/login">Producer</a> </li>
                      </ul>
                      Don't have an account? <a class="" style="color: blue;" href="register">Register</a>
                      <div uk-dropdown>
                        <ul>
                          <p>Register options</p>
                          <li><a style="color: blue;" href="/fedorae/register">Customer</a> </li>
                          <li><a style="color: blue;" href="/fedorae/multivendor/register">Seller</a> </li>
                          <li><a style="color: blue;" href="/fedorae/multivendor/register">Producer</a> </li>
                        </ul>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </li>
              <li class="uk-active uk-margin uk-margin-right">
                <div class="uk-inline">
                  <button class="uk-button uk-button-default uk-text-capitalize" type="button" name="button">
                    <span uk-icon="icon: cart">Cart (<?php echo isset($_SESSION['shopping_cart']) ? count( $_SESSION['shopping_cart']) : 0; ?>)</button>
                  <div uk-dropdown>
                    <?php require_once './Components/mini-cart.php'; ?>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
    </nav>
<!-- tab options -->
<div class="uk-container uk-margin-top-remove">
  <template>
    <v-tabs class="uk-link-text">
      <v-tab><a class="uk-active" href="/fedorae">Home</a></v-tab>
      <!-- <v-tab><a href="/fedorae/multivendor/register">Sell</a></v-tab> -->
      <v-tab><a href="/fedorae/multivendor/sellers">Browser Sellers</a></v-tab>
    </v-tabs>
  </template>
</div>


<!-- offcanvas -->
    <div id="left_menu" uk-offcanvas>
        <div class="uk-offcanvas-bar">

            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <h3>Menu</h3>

            <ul>
              <li><a href="/fedorae">Home</a></li>
              <li><a href="/fedorae/login">My Account</a> </li>

            </ul>
            <div class="uk-margin-xlarge-top">
              <?php if (!isset($_SESSION['id'])): ?>
              <li><a href="/fedorae/login">Login</a> </li>
              <?php else: ?>
                <div class="pa-2">
                  <v-btn block><a href="?logout=true" style="color: #000">Logout</a> </v-btn>
                </div>
              <?php endif; ?>
            </div>
        </div>
    </div>
