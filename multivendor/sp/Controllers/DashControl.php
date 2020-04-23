<?php
  /**
   *
   */
  class DashControl extends Database {
    public static function doSomething(){}

    public static function CreateView($viewname) {
       require_once("./Views/$viewname.php");
       static::doSomething();
    }

  }

 ?>
