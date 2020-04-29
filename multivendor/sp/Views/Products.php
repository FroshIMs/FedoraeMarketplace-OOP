<?php
  require_once './Var/Stuff.php';
  $products = ProductsModel::displayProducts($_SESSION['id']);
  ProductsModel::deleteProduct();
  $store = new StoreModel(); // if you dont have a store you cant have product
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
        <template>
          <v-card
            class="mx-auto uk-margin-large-left uk-align-right uk-width-1-2"
            justify="right"
            max-width="1800"
            uk-grid
          >

            <form class="uk-form-horizontal pull-right" action="" method="post">

            <div class="">
              <template id="">
                <v-row class="uk-margin-large-left uk-align-right" align="right" justify="left">
                  <v-btn><a href="add-product"><v-icon class="uk-link" uk-tooltip="New Product">mdi-plus-box</v-icon></a>
                  <input type="hidden"
                          name="delete_id"
                          value="<?php echo $product['id']; ?>"
                        ></v-btn>
                  <button type="hidden"
                          name="delete"
                          id="primaryButton"
                          onclick="ExistingLogic()"
                        ></button>
                  <v-btn class="uk-danger"
                          type="submit"
                          href="#modal-sections"
                          uk-tooltip="Delete Product"
                          uk-toggle
                        ><v-icon class="uk-link">mdi-delete</v-icon></v-btn>

                  <div id="modal-sections" uk-modal>
                      <div class="uk-modal-dialog">
                          <button class="uk-modal-close-default" type="button" uk-close></button>
                          <div class="uk-modal-header">
                              <h2 class="uk-modal-title">Confirm Delete</h2>
                          </div>
                          <div class="uk-modal-body">
                              <p>Are you sure you want to delete this product?</p>
                          </div>
                          <div class="uk-modal-footer uk-text-right">
                              <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                              <button class="uk-button uk-button-danger"
                                      type="button"
                                      id="secondaryButton"
                                      onclick="document.getElementById('primaryButton').click()"
                                    >Delete</button>
                          </div>
                      </div>
                  </div>

                </v-row>
              </template>
            </div>

            <table class="uk-table uk-table-divider uk-margin-xlarge uk-margin-xlarge-right">
              <thead>
                  <tr>
                    <th class="uk-table-shrink"></th>
                    <th class="uk-table-shrink">Image</th>
                    <th class="uk-table-shrink">Product Name</th>
                    <th class="uk-table-shrink">Price</th>
                    <th class="uk-table-shrink">Quantity</th>
                    <th class="uk-table-shrink">Status</th>
                    <th class="uk-table-shrink">Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach ($products as $product): ?>
                  <tr class="">
                      <td><input class="uk-checkbox" type="checkbox" name="chkbox[]" value="<?php echo $product['id']; ?>"></td>
                      <td><img class="uk-border-circle" src="..\images\products\<?php echo $product['image']; ?>" width="40" alt=""></td>
                      <td class="uk-table-expand"><?php echo $product['name']; ?></td>
                      <td class=""><?php echo '$'.$product['price']; ?></td>
                      <td class="uk-text-nowrap"><?php echo $product['quantity']; ?></td>
                      <td class=""><?php echo $product['status']; ?></td>
                      <td class="uk-link"><a href="edit-product?id=<?php echo $product['id']; ?>"><v-icon>mdi-pencil</v-icon></a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </form>
    </v-card>
  </template>
    <?php endif; ?>
<?php endif; ?>
