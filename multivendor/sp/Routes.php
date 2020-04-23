<?php
  DashRoute::set('dashboard', function() {
    DashControl::CreateView('Index');
  });
  DashRoute::set('profile-settings', function() {
    ProfileControl::CreateView('ProfileSettings');
  });
  DashRoute::set('store-settings', function() {
    ProfileControl::CreateView('StoreSettings');
  });
  DashRoute::set('products', function() {
    ProductsControl::CreateView('Products');
  });
  DashRoute::set('add-product', function() {
    AddProductControl::CreateView('AddProduct');
  });
  DashRoute::set('edit-product', function() {
    EditProductControl::CreateView('EditProduct');
  });
  DashRoute::set('producers', function() {
    ProducerControl::CreateView('Producers');
  });
 ?>
