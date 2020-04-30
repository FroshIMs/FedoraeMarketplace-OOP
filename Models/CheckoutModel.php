<?php
class CheckoutModel extends Model {
  public static function OrderInfo() {
    if (isset($_POST['set1'])) {
        $_SESSION['first-name']    = htmlentities($_POST['fname']);
        $_SESSION['last-name']     = htmlentities($_POST['lname']);
        $_SESSION['email']         = htmlentities($_POST['email']);
        $_SESSION['phone']         = htmlentities($_POST['phone']);
        $_SESSION['company']       = htmlentities($_POST['company']);
        $_SESSION['address1']      = htmlentities($_POST['address1']);
        $_SESSION['address2']      = htmlentities($_POST['address2']);
        $_SESSION['postcode']      = htmlentities($_POST['postcode']);
        $_SESSION['region']        = htmlentities($_POST['region']);
        $_SESSION['comments']      = htmlentities($_POST['comments']);
        $_SESSION['paymentMethod'] = htmlentities($_POST['paymentMethod']);

        header('Location: /fedorae/checkout');
    }
  }
}
