<?php
  $product = new AddProductModel();
  $product->addProduct();
?>
<template id="" class="uk-margin">

  <div class="uk-container uk-card uk-card-default uk-card-body">

    <form class="uk-form-horizontal pull-right" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

    <div  class="uk-container">
      <v-row  class="uk-margin-xlarge-left uk-align-right" align="right" justify="left">
        <v-btn type="submit" name="save" class="" uk-tooltip="Save"><v-icon color="blue">mdi-content-save</v-icon></v-btn>
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
                <input class="uk-input" id="form-horizontal-text" type="text" name="product-name" placeholder="Product Name">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Description</label>
            <div class="uk-form-controls">
              <textarea class="uk-textarea" id="form-horizontal-text" type="text" name="product-description" rows="5" placeholder=""></textarea>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Meta Tag Title</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" type="text" name="meta-tag-title" placeholder="Meta Tag Title">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Meta Tag Description</label>
            <div class="uk-form-controls">
              <textarea class="uk-textarea" id="form-horizontal-text" type="text" name="meta-tag-description" rows="3" placeholder="Meta Tag Description"></textarea>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Meta Tag Keywords</label>
            <div class="uk-form-controls">
              <textarea class="uk-textarea" id="form-horizontal-text" type="text" name="meta-tag-keywords" rows="3" placeholder="Meta Tag Keywords"></textarea>
            </div>
        </div>
      </li>
      <li>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">SKU</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" type="text" name="sku" placeholder="SKU">
            </div>
        </div>
        <div class="uk-margin">
          <label class="uk-form-label" for="form-horizontal-text">Price</label>
          <div class="uk-form-controls">
              <input class="uk-input" id="form-horizontal-text" type="text" name="price" placeholder="Price">
          </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Quantity</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" type="text" name="quantity" value="1">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Availability</label>
            <div class="uk-form-controls">
              <select class="uk-select" name="availability">
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
                <input class="uk-input" id="form-horizontal-text" type="text" name="weight" placeholder="Weight">
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
          <div class="uk-alert-primary" uk-alert>
            <p>Only one image per product.</p>
          </div>
          <label class="uk-form-label" for="form-horizontal-text">Image</label>
          <v-spacer></v-spacer>
          <v-col cols="5" sm="3" class="uk-margin-large-left">

          <input type="file" accept="image/*" name="productImage" onchange="loadFile(event)" id="productImage" style="display: none;" multiple>
          <img src="images\imageplaceholder.png" id="displayImage" alt="" onclick="imageClick()" width="100" height="100">

          <!-- <input type="file" accept="image/*" name="productImage" onchange="loadFile(event)" id="productImage">
          <img id="output" width="100" height="100"/> -->

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
            <input class="uk-input" id="form-horizontal-text" type="text" name="seo" placeholder="Keyword">
          </div>
        </div>
      </li>
    </ul>
    </form>
  </div>

</template>
