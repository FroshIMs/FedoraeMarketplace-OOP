<?php
class DashUser {
  private static $_isLoggedIn = false;

  public static function logout() {

    if (isset($_GET['logout'])) {
      unset($_SESSION['id']);
      session_destroy();
      header('Location: login');
    }

  }

  public static function isLoggedIn() {

    if (isset($_SESSION['id'])) {
      return self::$_isLoggedIn = true;
    }
      header('Location: /fedorae/multivendor/login');
   }

}

// class Users extends Database {
//   private $_db,
//           $_data,
//           $_sessionName,
//           $_isLoggedIn;
//
//   public function __construct($user = null) {
//     $this->_db = Database::getInstance();
//   }
//
//   public function create($fields = array()) {
//     if(!$this->_db->insert('users', $fields)) {
//       throw new \Exception("There was a problem creating the account");
//     }
//   }
//
//   public function find($user = null) {
//     if($user) {
//       $field = (is_numeric($user)) ? 'id' : 'username';
//       $data = $this->_db->get('users', array($field, '=', $user));
//
//       if ($data->count()) {
//         $this->_data = $data->first();
//         return true;
//       }
//     }
//     return false;
//   }
//
//   public static function register() {
//
//     if (Input::exists()) {
//       if (Token::check(Input::get('token'))) {
//         $validate = new Validation();
//         $validation = $validate->check($_POST, array(
//           'username' => array(
//             'required' => true,
//             'min' => 2,
//             'max' => 20,
//             'unique' => 'users'
//           ),
//           'email' => array(
//             'required' => true
//           ),
//           'password' => array(
//             'required' => true,
//             'min' => 6
//           ),
//           'passwordConf' => array(
//             'required' => true,
//             'matches' => 'password'
//           )
//         ));
//
//         // sort this shit out
//         if ($validation->passed()) {
//
//             $user = new User();
//             $password = password_hash(Input::get('password'), PASSWORD_DEFAULT);
//             $token = bin2hex(random_bytes(50));
//             $verified = false;
//             $email = filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL);
//
//             try {
//
//               $user->create(array(
//                 'username' => Input::get('username'),
//                 'email' => $email,
//                 'password' => $password,
//                 'token' => $token,
//                 'joined' => date('Y-m-d H:i:s'),
//                 'group' => Input::get('group')
//               ));
//
//               Session::flash('home', 'You have been registered an can now log in!');
//               Redirect::to('sp/dashboard');
//
//             } catch (\Exception $e) {
//               //should probably redirect
//               die($e->getMessage());
//             }
//
//         } else {
//           foreach ($validation->errors() as $error) {
//             echo $error, '<br />';
//           }
//         }
//       }
//     }
//
//   }
//
//   public static function login() {
//
//     if (Input::exists()) {
//       if (Token::check(Input::get('token'))) {
//
//         $validate = new Validation();
//         $validation = $validate->check($_POST, array(
//             'username' => array('required' => true),
//             'password' => array('required' => true)
//         ));
//
//           if ($validation->passed()) {
//
//             $query = Database::connect()->prepare('SELECT * FROM users WHERE username = :username');
//             $query->execute(array(':username' => Input::get('username')));
//             $users = $query->fetchAll(PDO::FETCH_ASSOC);
//
//             $dbpass = "";
//             $password = "";
//
//             foreach ($users as $key => $user) {
//               $key = $user;
//               $dbpass = $user['username'];
//               $password = password_hash(Input::get('password'), PASSWORD_DEFAULT);
//               $_SESSION['id'] = $user['id'];
//               $session_id = $_SESSION['id'];
//             }
//             if (password_verify($dbpass, $password)) {
//               Session::put(Config::get('session/session_name'), $session_id);
//               Redirect::to('sp/dashboard');
//               die();
//             }
//             } else {
//           foreach ($validation->errors() as $error) {
//             echo $error, '<br />';
//           }
//         }
//       }
//     }
//   }
//
  // public function logout() {
  //
  //   if (isset($_GET['logout'])) {
  //     Session::delete($this->_sessionName);
  //     Redirect::to('/fedorae/multivendor/login');
  //   }
  //
  // }
//
//   //
//   public function data() {
//     return $this->_data;
//   }
//
//   public function isLoggedIn() {
//     return $this->_isLoggedIn;
//   }
//
// }
