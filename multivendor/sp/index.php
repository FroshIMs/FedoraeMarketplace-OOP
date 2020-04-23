<?php
// Yes ik, what if the user just go to sp/^nothing^ i'll do something 'eventually' 

  ob_start();

  session_start();

  spl_autoload_register('autoLoader');

    require_once('Routes.php');

    function autoLoader($fileName) {

      require_once('./Components/header.php');


      if (file_exists('./Classes/'.$fileName.'.php')) {
            require_once './Classes/'.$fileName.'.php';
      }
      if (file_exists('../Classes/'.$fileName.'.php')) {
            require_once '../Classes/'.$fileName.'.php';
      }
      if (file_exists('./Controllers/'.$fileName.'.php')) {
            require_once './Controllers/'.$fileName.'.php';
      }
      if (file_exists('./Models/'.$fileName.'.php')) {
            require_once './Models/'.$fileName.'.php';
      }
      if (file_exists('./Views/'.$fileName.'.php')) {
            require_once './Views/'.$fileName.'.php';
      }

    }

    DashUser::isLoggedIn();
    DashUser::logout();

    require_once('./Components/footer.php');

    ob_end_flush();

  ?>
