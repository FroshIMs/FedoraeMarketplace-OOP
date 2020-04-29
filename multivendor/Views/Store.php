<?php
// getting store
  $seller_id = $_GET['store_id'];
  $store = new StoreControl();
  $stores = $store->acceptStore($seller_id);
// getting seller
  $seller = new SellerControl();
  $sellers = $seller->acceptGetSeller($seller_id);
//getting product(s)
  $id = $_GET['store_id'];
  $product = new StoreControl();
  $products = $product->acceptSellerProducts($id);
 ?>

<div class="uk-container">
  <div class="">
    <div class="uk-card uk-card-default uk-width-expand">
    <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
          <?php foreach ($stores as $store): ?>
            <?php foreach ($sellers as $seller): ?>
              <div class="uk-width-auto">
                  <img class="uk-border-square" width="200" height="200" src="images/avatar.jpg">
              </div>
              <div class="uk-width-expand">
                  <h3 class="uk-card-title uk-margin-remove-bottom"><?php echo ucwords($store['name']); ?></h3>
                  <small><p class="uk-text-meta uk-margin-remove-top"><?php echo ucwords($seller['first_name'].' '.$seller['last_name']); ?></p></small>
              </div>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
    </div>
    <div class="uk-card-body">
        <p><?php echo $store['description']; ?></p>
    </div>
    <div class="uk-card-footer">
        <a href="#" class="uk-button uk-button-text">Read more</a>
    </div>
</div>
  </div>
  <!-- seller products -->
  <div class="uk-container uk-margin">
    <div class="">
      <h3 class="uk-heading">Seller Products</h3>
    </div>
      <div class="uk-container uk-position-relative uk-visible-toggle uk-light">
          <ul class="uk-child-width-1-4@s uk-grid">
              <?php foreach ($products as $product): ?>
              <li>
                  <div class="uk-card uk-card-default uk-card-hover">
                      <div class="uk-card-media-top">
                          <a href="#"><img src="images/photo.jpg" alt=""></a>
                      </div>
                      <div class="uk-card-body">
                          <h3 class="uk-card-title uk-text-center"><a style="color: #000" href="product?product_id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a> </h3>
                          <p class="uk-text-truncate"><?php echo $product['description']; ?></p>
                          <button type="button" class="uk-button uk-button-secondary" name="button" uk-tooltip="Add to cart"><span uk-icon="icon: cart"></button>
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
  </div>
</div>
