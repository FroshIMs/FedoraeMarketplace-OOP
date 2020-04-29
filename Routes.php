<?php
  Route::set('index.php', function() {
    IndexControl::CreateView('Index');
  });
  Route::set('product', function() {
    ProductControl::CreateView('Product');
  });
  Route::set('sellers', function() {
    SellersControl::CreateView('Sellers');
  });
  Route::set('store', function() {
    StoreControl::CreateView('Store');
  });
  Route::set('register', function() {
    AuthController::CreateView('Register');
  });
  Route::set('login', function() {
    AuthController::CreateView('Login');
  });
  Route::set('customer', function() {
    AuthController::CreateView('Customer');
  });
  Route::set('cart', function() {
    CartControl::CreateView('Cart');
  });
  Route::set('checkout', function() {
    CartControl::CreateView('Checkout');
  });
