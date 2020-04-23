<?php
  //require_once('controllers/authController.php');

// main menu to left

$menu = array('mdi-view-dashboard' => array('Dashboard' => 'dashboard' ),
              'mdi-chart-bubble' => array('Products' => 'products'),
              'mdi-barley' => array('Producers' => 'producers'),
              'mdi-airplane' => array('Logistics' => 'logistics'),
              'mdi-cloud-sync' => array('Backup' => 'backup'),
              'mdi-settings' => array('Settings' => 'store-settings') // This could work, for now
 );

// dropdown menu to right
$dropdown = array('mdi-settings' => array('Settings' => 'profile-settings'),
                  'mdi-logout' => array('Sign Out' => '?logout=true')
);

//prodController
$products = array();


// Other Variables -->
$title = 'CMS';
$vendor = 'Vendor';

// profile image is_uploaded
$msg = "";
$css_class = "";

// product headers

$productheaders = array('<input class="uk-checkbox" type="checkbox" onClick="toggle(this)" id="checkall" />','Image', 'Product Name', 'Price', 'Quantity', 'Status', 'Action');
