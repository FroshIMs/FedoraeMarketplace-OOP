<?php
// really and truly there should be just a storemodel and not seller, use the usersmodel instead of saying seller
  $store = new StoreModel();
  $datastores = $store->getStore($_SESSION['id']);
  StoreModel::createStore();
 ?>

<?php if ($_SESSION['verified'] == 0): ?>
  <?php require_once './Components/verification-msg.php'; ?>
  <?php else: ?>
    <?php if (!$store->getStore($_SESSION['id'])): ?>
      <div class="uk-container">
        <!-- This is an anchor toggling the modal -->
        <a style="color: #fff" href="#modal-confstore" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" uk-toggle>Configure Store</a>
      </div>
      <?php else: ?>
        <template id="">
          <div class="uk-container uk-margin-xlarge-left uk-margin-remove-right uk-margin-bottom">
            <form class="uk-form-horizontal uk-margin-xlarge-left" action="" method="post" enctype="multipart/form-data">

              <div  class="uk-container">
                <v-row  class="uk-margin-xlarge-left uk-align-right" align="right" justify="left">
                  <input type="hidden" name="update_store" value="<?php echo $_SESSION['id']; ?>">
                  <v-btn type="submit" name="update_store" class="" uk-tooltip="Save"><v-icon color="blue">mdi-content-save</v-icon></v-btn>
                  <v-btn><a href="dashboard"><v-icon color="black" uk-tooltip="Cancel">mdi-reply</v-icon></a></v-btn>
                </v-row>
              </div>

          <ul>
              <li class="uk-list">
                  <h1>Store</h1>
                  <div class="uk-margin">
                      <label class="uk-form-label" for="form-horizontal-text">Store Name</label>
                      <div class="uk-form-controls">
                          <input class="uk-input" id="form-horizontal-text" type="text" name="store-name" value="<?php echo $datastore['store_name']; ?>">
                      </div>
                  </div>
                  <div class="uk-margin">
                      <label class="uk-form-label" for="form-horizontal-text">Address</label>
                      <div class="uk-form-controls">
                          <input class="uk-input" id="form-horizontal-text" type="text" name="address" value="<?php echo $datastore['username']; ?>">
                      </div>
                  </div>
                  <div class="uk-margin">
                      <label class="uk-form-label" for="form-horizontal-text">E-mail</label>
                      <div class="uk-form-controls">
                          <input class="uk-input" id="form-horizontal-text" type="text" name="email" value="<?php echo $datastore['email']; ?>">
                      </div>
                  </div>
                  <div class="uk-margin">
                      <label class="uk-form-label" for="form-horizontal-text">Telephone</label>
                      <div class="uk-form-controls">
                          <input class="uk-input" id="form-horizontal-text" type="text" name="telephone" value="<?php echo $datastore['telephone']; ?>">
                      </div>
                  </div>
                  <div class="uk-margin">
                      <label class="uk-form-label" for="form-horizontal-text">Opening Times</label>
                      <div class="uk-form-controls">
                          <input class="uk-input" id="form-horizontal-text" type="text" name="hours" value="<?php echo $datastore['hours']; ?>">
                      </div>
                  </div>
                   <div class="uk-margin">
                     <label class="uk-form-label" for="form-horizontal-text">Image</label>
                     <v-row class="uk-form-controls">
                       <v-col cols="5" sm="3">
                         <?php foreach ($datastores as $user): ?>
                           <?php if (empty($user['profile_image'])): ?>
                             <!-- I will do something about it, 'eventually' -->
                             <a href="#modal-example" uk-toggle><v-img src="https://randomuser.me/api/portraits/men/81.jpg"></a>
                           <?php endif; ?>
                           <?php if (!empty($user['profile_image'])): ?>
                             <a href="#modal-example" uk-toggle><v-img src="images/<?php echo $user['profile_image']; ?>" alt=""></a>
                           <?php endif; ?>
                         <?php endforeach; ?>
                       </v-col>
                   </div>
                  </div>
                </li>
              </ul>
            </form>
          </div>

          <!-- This is the modal -->
          <div id="modal-example" uk-modal>
              <div class="uk-modal-dialog uk-modal-body">
                <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                  <h2 class="uk-modal-title">Change Photo</h2>
                  <div class="uk-container">
                    <div class="uk-card uk-card-body">
                        <?php if(!empty($msg)): ?>
                          <div class="uk-alert <?php echo $css_class; ?>">
                            <?php echo $msg; ?>
                          </div>
                        <?php endif; ?>
                        <div class="uk-form-controls">
                          <label for="profileImage">Click below to change profile image.</label>
                          <br>
                          <?php if (empty($user['profile_image'])): ?>
                            <img src="https://randomuser.me/api/portraits/men/81.jpg" alt="" onclick="triggerClick()" id="profileDisplay">
                            <input type="file" accept="image/*" name="profileImage" onchange="loadFile(event)" id="uploadImage" class="file_input" style="display: none;" multiple/>
                          <?php endif; ?>
                          <?php if (!empty($user['profile_image'])): ?>
                            <img src="images/<?php echo $user['profile_image']; ?>" alt="" onclick="triggerClick()" id="profileDisplay">
                            <input type="file" accept="image/*" name="profileImage" onchange="loadFile(event)" id="uploadImage" class="file_input" style="display: none;" multiple/>
                          <?php endif; ?>
                        </div>
                    </div>
                  </div>
                  <p class="uk-text-right">
                      <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                      <button class="uk-button uk-button-primary" type="submit" name="save-photo" class="uk-button uk-button-default uk-margin-top">Save</button>
                  </p>
                </form>
              </div>
          </div>
        </template>
    <?php endif; ?>
<?php endif; ?>
