<?php
  ProductModel::addToCart();
  ProductModel::removeFromCart();
 ?>
 <?php if (!empty($_SESSION['shopping_cart'])): ?>
<?php $total = 0; ?>
<form class="" action="" method="post">
  <div class="uk-overflow-auto">
  <table class="uk-table uk-table-middle uk-table-divider">
      <?php foreach ($_SESSION['shopping_cart'] as $key => $product): ?>
      <tbody>
          <tr>
              <td><img class="uk-preserve-width uk-border-circle" src="images/avatar.jpg" width="40" alt=""></td>
              <td class="uk-table-link">
                  <a class="uk-link-reset" href="product?product_id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
              </td>
              <td class="uk-text"><?php echo "x".$product['quantity']; ?></td>
              <td class="uk-text-nowrap"><?php echo "$".number_format($product['quantity'] * $product['price'], 2); ?></td>
              <td class="uk-text"><a class="uk-button uk-button-danger" href="?action=delete&id=<?php echo $product['id']; ?>">Remove</a> </td>
          </tr>
      </tbody>
      <?php $total = $total + ($product['quantity'] * $product['price']); ?>
      <?php endforeach; ?>
  </table>
  <div class="uk-container">
     <div class="uk-text-right">
       <strong class="">
         <?php echo "Grand Total $".number_format($total, 2); ?>
       </strong>
       <div class="uk-margin">
         <span uk-icon="icon: cart"></span><a class="uk-button uk-button-primary" href="/fedorae/cart">View Cart</a>
         <span uk-icon="icon: forward"></span><a class="uk-button uk-button-primary" href="/fedorae/checkout">CheckOut</a>
       </div>
     </div>
  </div>
 </div>
</form>

<?php else: ?>
  <div class="uk-container">
    <div class="uk-text-center uk-align-center">
      <div class="uk-card uk-card-default">
      <p>Your shopping cart is empty.</p>
    </div>
    </div>
  </div>
 <?php endif; ?>
