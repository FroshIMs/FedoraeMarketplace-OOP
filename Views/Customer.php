<?php
// find of mess up, what if the seller wants to be a customer?
  if ($_SESSION['user_type'] == 2) {
    header('Location: /fedorae/multivendor/sp/dashboard');
  }
  if (!isset($_SESSION['id'])) {
      header('Location: login');
  }
 ?>
<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
          <v-card
            class="mx-auto"
            height="400"
            width="256"
          >
            <v-navigation-drawer
              class="deep-purple accent-4"
              dark
              permanent
            >
              <v-list>
                <v-list-item>
                  <v-list-item-content>
                    <v-list-item-title>Hey, <?php echo $_SESSION['username']; ?></v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list>

            <v-divider></v-divider>

            <?php if (isset($_SESSION['user_type'])): ?>
              <?php if ($_SESSION['user_type'] == 2): ?>
                <v-list
                  dense
                  nav
                >
                  <v-list-item class="uk-text-center">
                    <v-list-item-content>
                      <h4><a class="uk-button uk-button-secondary" style="color: #fff" href="/fedorae/multivendor/sp/dashboard">Seller Panel</a> </h4>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>
              <?php endif; ?>
            <?php endif; ?>

              <template v-slot:append>
                <div class="pa-2">
                  <v-btn block><a href="?logout=true">Logout</a> </v-btn>
                </div>
              </template>
            </v-navigation-drawer>
          </v-card>
        </v-app>
      </v-content>
    </v-container>
  </v-row>
</template>
