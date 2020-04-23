<?php
  Route::set('index.php', function() {
    Controller::CreateView('Index');
  });
  Route::set('register', function() {
    AuthController::CreateView('Register');
  });
  Route::set('login', function() {
    AuthController::CreateView('Login');
  });
  Route::set('store', function() {
    StoreControl::CreateView('Store');
  });
  Route::set('sellers', function() {
    StoreControl::CreateView('Sellers');
  });
  Route::set('confirm-email', function() {
    Controller::CreateView('ConfirmEmail');
  });
  Route::set('forgot-password', function() {
    AuthController::CreateView('ForgotPassword');
  });
  Route::set('password-message', function() {
    AuthController::CreateView('PasswordMessage');
  });
  Route::set('reset-message', function() {
    AuthController::CreateView('ResetMessage');
  });
  Route::set('reset-password', function() {
    AuthController::CreateView('ResetPassword');
  });
