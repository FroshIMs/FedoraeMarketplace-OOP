<?php
  require_once './Var/Stuff.php';
  // do a one login but different redirect / but what if you are a seller and customer?

  if (isset($_SESSION['id'])) {
    $session_id = $_SESSION['id'];
    $users = UserModel::getuser($session_id);
  } else {
    header('Location: http://localhost/fedorae/login');
  }

  if ($_SESSION['user_type'] == 0) {
      header('Location: http://localhost/fedorae/customer');
  }

  $logout = new DashUser();
  $logout->logout();
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/css/uikit.min.css" />
  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.0/dist/js/uikit-icons.min.js"></script>
  <link rel="stylesheet" href="css\styles.css">
  <title>Multi-Vendor</title>
</head>
<body>
  <div id="app">
      <v-app dark>
        <v-navigation-drawer
          v-model="drawer"
          :mini-variant="miniVariant"
          :clipped="clipped"
          fixed
          app
        >
          <v-list>
            <template>
              <v-list-item two-line :class="miniVariant && 'px-0'">
                <v-list-item-avatar>
                  <img src="https://randomuser.me/api/portraits/men/81.jpg">
                </v-list-item-avatar>

                <v-list-item-content>
                  <?php foreach ($users as $user): ?>
                    <v-list-item-title><?php echo $user['username']; ?></v-list-item-title>
                  <?php if ($user['user_type'] == 2): ?>
                    <v-list-item-subtitle>Vendor</v-list-item-subtitle>
                  <?php elseif($user['user_type'] == 3): ?>
                    <v-list-item-subtitle>Producer</v-list-item-subtitle>
                  <?php else: ?>
                    <v-list-item-subtitle>Administrator</v-list-item-subtitle>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </v-list-item-content>
              </v-list-item>
            </template>

            <v-divider></v-divider>
                <template>
                  <?php foreach ($menu as $key => $value): ?>
                    <?php foreach ($value as $option => $to): ?>
                      <v-list>
                        <v-list-item class="hovy">
                          <v-hover >
                            <v-list-item-title >
                              <a style="text-decoration: none; color: rgba(0,0,0,.90);" href=<?php echo $to; ?>>
                                <v-list-item-action>
                                  <v-icon><?php echo $key; ?></v-icon>
                                 </v-list-item-action>
                                 <?php echo $option; ?>
                               </a>
                              <v-hover>
                            </v-list-item-title>
                        </v-list-item>
                      <v-list>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
                </template>
            </v-navigation-drawer>

          <v-app-bar :clipped-left="clipped" fixed app>

            <template>
              <v-btn @click.stop="miniVariant = !miniVariant" icon>
                <v-icon>mdi-{{ `chevron-${miniVariant ? 'right' : 'left'}` }}</v-icon>
              </v-btn>
              <v-btn @click.stop="clipped = !clipped" icon>
                <v-icon>mdi-application</v-icon>
              </v-btn>
              <v-btn @click.stop="drawer = !drawer" icon>
                <v-icon>mdi-minus</v-icon>
              </v-btn>
            </template>

          <v-spacer></v-spacer>
          <v-toolbar-title></v-toolbar-title>
          <v-spacer></v-spacer>

          <!-- username-dropdown-menu -->
          <v-menu offset-y>
            <template v-slot:activator="{ on }">
              <v-btn v-on="on" color="primary" dark>
                <v-icon>mdi-account</v-icon>
                <v-icon>mdi-chevron-down</v-icon>
              </v-btn>
            </template>

            <template id="">
              <v-list>
                <v-list-item>
                  <v-list-item-title>
                    <a style="text-decoration: none; color: rgba(0,0,0,.90);" href="/fedorae/multivendor/store?store_id=<?php echo $_SESSION['id']; ?>" target="_blank">
                      <v-list-item-action>
                        <v-icon>mdi-storefront<v-icon>
                      </v-list-item-action>
                      <!-- comes from database *should-->
                      Store
                    </a>
                  </v-list-item-title>
                </v-list-item>
              </v-list>
            </template>
            <v-divider></v-divider>

          <template>
            <?php foreach ($dropdown as $key => $value): ?>
              <?php foreach ($value as $option => $to): ?>
                <v-list>
                  <v-list-item class="hovy">
                    <v-list-item-title>
                      <a style="text-decoration: none; color: rgba(0,0,0,.90);" href="<?php echo $to; ?>">
                        <v-list-item-action>
                          <v-icon><?php echo $key; ?></v-icon>
                        </v-list-item-action>
                        <?php echo $option; ?>
                      </a>
                    </v-list-item-title>
                  </v-list-item>
                </v-list>
              <?php endforeach; ?>
            <?php endforeach; ?>
          </template>
          </v-menu>
      <!-- -->

    <template>
      <v-btn @click.stop="rightDrawer = !rightDrawer" icon>
        <a href="?logout=true"><v-icon>mdi-logout</v-icon></a>
      </v-btn>
    </template>

    </v-app-bar>

    <!-- space from top -->
    <div class="uk-margin-xlarge-bottom"></div>
