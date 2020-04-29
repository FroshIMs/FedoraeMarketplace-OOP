<?php
  $store = new StoreModel();
  StoreModel::createStore();
 ?>
<?php if ($_SESSION['verified'] == 0): ?>
  <?php require_once './Components/verification-msg.php'; ?>
<?php else: ?>
  <div class="uk-container">
     <?php if (!$store->getStore($_SESSION['id'])): ?>
        <!-- This is an anchor toggling the modal -->
        <a style="color: #fff" href="#modal-confstore" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" uk-toggle>Configure Store</a>

        <!-- This is the modal -->
        <div id="modal-confstore" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <h2 class="uk-modal-title">Store Details</h2>
                <form class="uk-form-horizontal uk-margin-large" action="" method="post">
                  <!-- Not really needed -->
                  <input type="hidden" name="userStoreId" value="<?php echo $_SESSION['id']; ?>">
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-horizontal-text">Store Name</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-horizontal-text" type="text" name="storeName" placeholder="Store Name...">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-horizontal-text">Telephone</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-horizontal-text" type="text" name="storeTele" placeholder="Store Telephone...">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-horizontal-text">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-horizontal-text" type="text" name="storeEmail" placeholder="Store Email...">
                    </div>
                </div>
                <p>You may add other information later by clicking the settings option.</p>
                <div class="">
                  <p class="uk-text-right">
                      <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                      <button class="uk-button uk-button-primary" type="submit" name="create-store">Create</button>
                  </p>
                </div>
                </form>
            </div>
        </div>
     <?php else: ?>
         <h1>Dashboard</h1>
     <?php endif; ?>
  </div>
<?php endif; ?>
