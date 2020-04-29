<?php
  require_once('Components\carousel.php');

  // verify the user using token
  if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
  }

  if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
  }
?>
<?php
  $product = new ProductControl();
  $products = $product->acceptDisplayProducts();

  $seller = new sellersControl();
  $sellers = $seller->acceptMonthSellers();
 ?>
<div class="uk-container uk-margin">
  <div class="uk-child-width-1-4@s uk-grid-small uk-text-center" uk-grid>
    <div>
      <a href="#">
        <div class="uk-tile uk-tile-muted uk-padding-small uk-text-center">
          <p class="uk-h4">New Arrivals</p>
        </div>
      </a>
    </div>
    <div>
      <a href="#">
        <div class="uk-tile uk-tile-muted uk-padding-small uk-text-center">
          <p class="uk-h4">Returns</p>
        </div>
      </a>
    </div>
    <div>
      <a href="#">
        <div class="uk-tile uk-tile-muted uk-padding-small uk-text-center">
          <p class="uk-h4">Delivery Policy</p>
        </div>
      </a>
    </div>
    <div>
      <a href="#">
        <div class="uk-tile uk-tile-muted uk-padding-small uk-text-center">
          <p class="uk-h4">23 Store Locations</p>
        </div>
      </a>
    </div>
  </div>
</div>
<!-- product categories -->
<div class="uk-container">
  <div class="uk-grid-small uk-text-center" uk-grid>
    <div class="uk-margin-right">
      <h3 class="uk-heading">Top Categories</h3>
    </div>
      <div class="">
        <a href="#">
          <img src="https://getuikit.com/docs/images/slider1.jpg" alt="" width="70px" height="70px">
          <h5>Electronics</h5>
        </a>
      </div>
      <div class="uk-margin-remove">
        <a class="" href="#">
          <img src="https://getuikit.com/docs/images/slider2.jpg" alt="" width="70px" height="70px">
          <h5>Sporting Goods</h5>
        </a>
      </div>
      <div class="uk-margin-remove">
        <img src="https://getuikit.com/docs/images/slider3.jpg" alt="" width="70px" height="70px">
        <h5>Fashion</h5>
      </div>
      <div class="uk-margin-remove">
        <img src="https://getuikit.com/docs/images/slider4.jpg" alt="" width="70px" height="70px">
        <h5>Home & Garden</h5>
      </div>
      <div class="uk-margin-remove">
        <img src="https://getuikit.com/docs/images/slider5.jpg" alt="" width="70px" height="70px">
        <h5>Business & Industrial</h5>
      </div>
  </div>
</div>
<!-- featured products -->
<div class="uk-container uk-margin" uk-slider="center: false">
  <div class="">
    <h3 class="uk-heading">Featured Products</h3>
  </div>
    <div class="uk-container uk-position-relative uk-visible-toggle uk-light">
        <ul class="uk-slider-items uk-child-width-1-4@s uk-grid">
            <?php foreach ($products as $product): ?>
            <li>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <a href="product?product_id=<?php echo $product['id']; ?>"><img src="images/photo.jpg" alt=""></a>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title uk-text-center"><a style="color: #000" href="product?product_id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a> </h3>
                        <p class="uk-text-truncate"><?php echo $product['description']; ?></p>
                        <form class="" action="" method="post">
                          <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                          <input type="hidden" name="productName" value="<?php echo $product['name']; ?>">
                          <input type="hidden" name="productPrice" value="<?php echo $product['price']; ?>">
                          <input type="hidden" name="productQuantity" value="1">
                          <button class="uk-margin-right uk-button uk-button-primary"
                                  type="submit"
                                  name="add-to-cart"
                                  onclick="UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Product was successfully added.'})"
                                  uk-tooltip="Add to cart">
                          <span uk-icon="icon: cart"></button>
                          <button type="button" class="uk-button uk-button-secondary" name="button" uk-tooltip="Add to compare"><span uk-icon="icon: move"></button>
                        </form>
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
<!-- sellers of the months -->
<div class="uk-container uk-margin">
  <div class="">
    <h3 class="uk-heading">Sellers of the months</h3>
  </div>
  <div class="uk-align-center uk-text-center">
    <div class="uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid>
      <?php foreach ($sellers as $seller): ?>
        <div>
          <a style="color: #000;" href="multivendor/store?store_id=<?php echo $seller['id']; ?>">
            <img src="images/avatar.jpg" width="50" height="50">
            <span class="uk-text-top"><?php echo $seller['username']; ?></span>
          </a>
          <p><a class="uk-button uk-button-default" href="multivendor/store?store_id=<?php echo $seller['id']; ?>">View Store</a> </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- new arrivals -->
<div class="uk-container uk-margin-large-top">
  <div class="">
    <h3 class="uk-heading">New Arrivals</h3>
  </div>
  <div class="uk-text-center">
    <div class="uk-child-width-1-10@m uk-child-width-1-5@s uk-margin-remove" uk-grid>
      <?php foreach ($products as $product): ?>
        <div class="">
          <a href="product?product_id=<?php echo $product['id']; ?>">
            <img src="https://getuikit.com/docs/images/slider4.jpg" alt="" width="70px" height="70px">
            <h5><?php echo $product['name']; ?></h5>
          </a>
        </div>
        <?php endforeach; ?>
    </div>
  </div>
</div>
