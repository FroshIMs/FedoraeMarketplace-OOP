<?php
  $products = ProductsModel::products();
  $updateInst = new ProductsModel();
  $update = $updateInst->updateProduct();
 ?>
<template>
  <?php foreach ($products as $product): ?>
    <v-card
      class="mx-auto uk-margin-xlarge-left uk-align-right"
      justify="right"
      max-width="1500"
    >
      <form class="uk-form-horizontal pull-right" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

      <div  class="uk-container">
        <v-row  class="uk-margin-xlarge-left uk-align-right" align="right" justify="left">
          <input type="hidden" name="update_id" value="<?php echo $product['id']; ?>">
          <v-btn type="submit" name="update" class="" uk-tooltip="Update"><v-icon color="blue">mdi-content-save</v-icon></v-btn>
          <v-btn><a href="products"><v-icon color="black" uk-tooltip="Cancel">mdi-reply</v-icon></a></v-btn>
        </v-row>
      </div>

      <ul class="uk-subnav uk-tab uk-margin-xlarge-left uk-margin-xlarge-right" uk-switcher>
        <li><a href="#">General</a></li>
        <li><a href="#">Data</a></li>
        <li><a href="#">Images</a></li>
        <li><a href="#">SEO</a></li>
      </ul>

      <ul class="uk-switcher uk-margin">
        <li>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Product Name</label>
              <div class="uk-form-controls">
                  <input class="uk-input" id="form-horizontal-text" type="text" name="product-name" value="<?php echo $product['name']; ?>">
              </div>
          </div>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Description</label>
              <div class="uk-form-controls">
                <textarea class="uk-textarea" id="form-horizontal-text" type="text" name="product-description" rows="5">
                  <?php echo $product['description']; ?>
                </textarea>
              </div>
          </div>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Meta Tag Title</label>
              <div class="uk-form-controls">
                  <input class="uk-input" id="form-horizontal-text" type="text" name="meta-tag-title" value="<?php //echo $product['meta_tag_title']; ?>">
              </div>
          </div>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Meta Tag Description</label>
              <div class="uk-form-controls">
                <textarea class="uk-textarea" id="form-horizontal-text" type="text" name="meta-tag-description" rows="3" placeholder="Meta Tag Description"><?php //echo $product['meta_tag_description']; ?></textarea>
              </div>
          </div>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Meta Tag Keywords</label>
              <div class="uk-form-controls">
                <textarea class="uk-textarea" id="form-horizontal-text" type="text" name="meta-tag-keywords" rows="3" placeholder="Meta Tag Keywords"><?php //echo $product['meta_tag_keywords']; ?></textarea>
              </div>
          </div>
        </li>
        <li>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">SKU</label>
              <div class="uk-form-controls">
                  <input class="uk-input" id="form-horizontal-text" type="text" name="sku" value="<?php echo $product['sku']; ?>" required>
              </div>
          </div>
          <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Price</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" type="text" name="price" value="<?php echo $product['price']; ?>">
            </div>
          </div>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Quantity</label>
              <div class="uk-form-controls">
                  <input class="uk-input" id="form-horizontal-text" type="text" name="quantity" value="<?php echo $product['quantity']; ?>">
              </div>
          </div>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Out of Status</label>
              <div class="uk-form-controls">
                <select class="uk-select" name="out-of-status">
                    <option>2-3 Days</option>
                    <option>In Stock</option>
                    <option>Out of Stock</option>
                    <option>Pre-order</option>
                </select>
              </div>
          </div>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Weight</label>
              <div class="uk-form-controls">
                  <input class="uk-input" id="form-horizontal-text" type="text" name="weight" value="<?php //echo $product['weight']; ?>">
              </div>
          </div>
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Status</label>
              <div class="uk-form-controls uk-margin">
                <select class="uk-select" name="status">
                  <option>Enabled</option>
                  <option>Disabled</option>
                </select>
              </div>
          </div>
        </li>
        <li>
          <div class="uk-margin">
            <?php if (!empty($product['image'])): ?>
              <div class="uk-alert-primary" uk-alert>
                <p>Only one image per product.</p>
              </div>
            <?php endif; ?>
            <label class="uk-form-label" for="form-horizontal-text">Image</label>
            <v-spacer></v-spacer>
            <v-col cols="5" sm="3" class="uk-margin-large-left">
                <?php if (empty($product['image'])): ?>
                  <input type="file" accept="image/*" name="productImage" onchange="loadFile(event)" id="productImage" style="display: none;" multiple>
                  <img src="..\images\placeholder\imageplaceholder.png" id="displayImage" alt="" onclick="imageClick()" width="100" height="100">
                <?php endif; ?>
                <?php if (!empty($product['image'])): ?>
                  <input type="file" accept="image/*" name="productImage" onchange="loadFile(event)" id="productImage" style="display: none;" multiple>
                  <img src="../images/products/<?php echo $product['image']; ?>" id="displayImage" alt="" onclick="imageClick()" width="100" height="100">
                <?php endif; ?>

                <script type="text/javascript">
                function imageClick() {
                  document.querySelector('#productImage').click();
                }


                window.onload = function() {
                  if (window.File && window.FileList && window.FileReader) {
                    var filesInput = document.getElementById("productImage");
                    filesInput.addEventListener("change", function(event) {
                      var files = event.target.files;
                      var output = document.getElementById("displayImage");
                      for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        if (!file.type.match('image'))
                          continue;
                        var picReader = new FileReader();

                        picReader.onload = function(event){
                          document.querySelector('#displayImage').setAttribute('src', event.target.result);
                        }
                        picReader.readAsDataURL(file);
                      }

                    });
                  }
                }
                </script>
            </v-col>
          </div>
        </li>
        <li>
          <div class="uk-margin">
            <div class="uk-alert-primary" uk-alert>
              <p>Do not use spaces, instead replace spaces with - and make sure the SEO URL is globally unique.</p>
            </div>
            <label class="uk-form-label" for="form-horizontal-text">Keyword</label>
            <div class="uk-form-controls">
              <input class="uk-input" id="form-horizontal-text" type="text" name="seo" value="<?php //echo $product['seo']; ?>">
            </div>
          </div>
        </li>
      </ul>
      </form>
    </v-card>
  <?php endforeach; ?>
</template>
