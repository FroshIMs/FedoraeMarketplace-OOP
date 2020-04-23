<?php
// id should come from url
  $id = $_GET['product_id'];
  $product = new ProductControl();
  $products = $product->acceptProducts($id);
  $reviews = $product->acceptProductReviews($id);
  $addReview = $product->acceptGetReview();

  foreach ($products as $product) {
    $seller_id = $product['id'];
    $seller = new SellersControl();
    $sellers = $seller->acceptSellers($seller_id);
  }
 ?>

<div class="uk-container uk-margin">
  <div class="">
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
        <div class="">
          <img src="images/light.jpg" alt="" uk-cover>
          <canvas width="600" height="400"></canvas>
        </div>
    </div>
    <div>
      <div class="uk-margin-left uk-margin-top">
        <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="heart"></a>
        <a href="" class="uk-icon-button  uk-margin-small-right" uk-icon="move"></a>
      </div>
        <div class="uk-card-body">
            <h3 class="uk-card-title"><?php echo $product['name']; ?></h3>
            <small><a href="multivendor/store?store_id=<?php echo $product['user_id']; ?>">{{ seller }}</a></small>
            <p>Price: <?php echo '$'.$product['price']; ?></p>
            <ul class="uk-list-item">
              <li v-if="inventory >= 10">In stock</li>
              <li v-else-if="inventory < 10 && inventory > 0">Almost Out of Stock</li>
              <li v-else>Out of Stock</li>
            </ul>
            <div class="">
              <div>
                <div class="uk-text-center">
                  <button v-on:click="addToCart()"
                          onclick="UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Product was successfully added.'})"
                          :disabled="inventory <= 0"
                          class="uk-margin-right uk-button uk-button-secondary"
                          dark>Add to cart
                        </button>

                  <button v-on:click="addToCart()"
                          onclick="UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Product was successfully added.'})"
                          :disabled="inventory <= 0"
                          class="uk-margin-left uk-button uk-button-default">Buy now</button>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="">
<ul class="uk-subnav uk-subnav-pill" uk-switcher>
  <li><a href="#">Details</a></li>
  <li><a href="#">Reviews</a></li>
</ul>
<ul class="uk-switcher uk-margin">
  <li><p><?php echo $product['description']; ?></p></li>
  <dl class="uk-description-list uk-description-list-divider">
  <?php if (!empty($reviews)): ?>
    <?php foreach ($reviews as $review): ?>
      <dt><?php echo $review['title']; ?></dt>
      <dd><?php echo $review['description']; ?></dd>
      <dd>Rated: <?php echo $review['rating']; ?></dd>
      <dd><small>Posted by <strong><?php echo $review['author']; ?></strong> on <?php echo $review['created_at']; ?></small></dd>
      <a class="uk-button uk-button-default uk-margin" href="#add-review" uk-toggle>Add Review</a>
  <?php endforeach; ?>
    <?php else: ?>
      <dt>There are no reviews for this product.</dt>
      <a class="uk-button uk-button-default uk-margin" href="#add-review" uk-toggle>Add Review</a>
  <?php endif; ?>
  </dl>
</ul>
</div>
<!-- related products -->
<div class="uk-container uk-margin">
  <div class="">
    <h3 class="uk-heading">Related Products</h3>
  </div>
    <div class="uk-container uk-position-relative uk-visible-toggle uk-light">
        <ul class=" uk-child-width-1-4@s uk-grid">
            <?php foreach ($products as $product): ?>
            <li>
                <div class="uk-card uk-card-default uk-card-hover">
                    <div class="uk-card-media-top">
                        <a href="#"><img src="images/photo.jpg" alt=""></a>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title uk-text-center"><a style="color: #000" href="#"><?php echo $product['name']; ?></a> </h3>
                        <p class="uk-text-truncate"><?php echo $product['description']; ?></p>
                        <button v-on:click="addToCart()"
                                onclick="UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Product was successfully added.'})"
                                :disabled="inventory <= 0"
                                type="button"
                                class="uk-button uk-button-secondary"
                                name="button"
                                uk-tooltip="Add to cart">
                                <span uk-icon="icon: cart">
                              </button>
                        <button type="button" class="uk-button uk-button-secondary" name="button" uk-tooltip="Add to compare"><span uk-icon="icon: move"></button>
                    </div>
                </div>
            </li>
          <?php endforeach; ?>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>


<!-- This is the modal -->
<div id="add-review" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
      <?php $errorInst = new ProductModel(); ?>
      <!-- error output -->
      <?php if(count($errorInst->errors) > 0): ?>
        <v-alert type="warning">
          <?php foreach($errorInst->errors as $error): ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </v-alert>
      <?php endif; ?>
      <!-- -->
        <h2 class="uk-modal-title">Add Review</h2>
        <form class="uk-form-horizontal uk-margin-large" action="" method="post">
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Title</label>
            <div class="uk-form-controls">
                <input class="uk-input" name="title" id="form-horizontal-text" type="text" placeholder="Review Title...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Description</label>
            <div class="uk-form-controls">
                <input class="uk-input" name="description" id="form-horizontal-text" type="text" placeholder="Review Description...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Author</label>
            <div class="uk-form-controls">
                <input class="uk-input" name="author" id="form-horizontal-text" type="text" placeholder="Posting by...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Rating</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="rating" id="form-horizontal-select">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" name="add-review" type="submit">Save</button>
        </p>
      </form>
    </div>
</div>
</div>
