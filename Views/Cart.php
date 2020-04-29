<?php
  ProductModel::addToCart();
  ProductModel::removeFromCart();
 ?>
 <?php if (!empty($_SESSION['shopping_cart'])): ?>
<?php $total = 0; ?>
     <div class="uk-container">
       <div class="uk-margin-top">
         <h1 class="uk-heading">Shopping Cart</h1>
         <form class="" action="" method="post">
           <div class="uk-overflow-auto">
           <table class="uk-table uk-table-middle uk-table-divider">
               <thead>
                   <tr>
                       <th class="uk-table-shrink">Image</th>
                       <th class="uk-table-shrink">Product Name</th>
                       <th class="uk-width-small">Quantity</th>
                       <th class="uk-width-small">Unit Price</th>
                       <th class="uk-width-small">Total</th>
                       <th class="uk-width-small">Action</th>
                   </tr>
               </thead>
               <?php foreach ($_SESSION['shopping_cart'] as $key => $product): ?>
               <tbody>
                   <tr>
                       <td><img class="uk-preserve-width uk-border-circle" src="images/avatar.jpg" width="40" alt=""></td>
                       <td class="uk-table-link">
                           <a class="uk-link-reset" href="product?product_id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                       </td>
                       <td class="uk-text"><?php echo $product['quantity']; ?></td>
                       <td class="uk-text-nowrap"><?php echo "$".$product['price']; ?></td>
                       <td class="uk-text-nowrap"><?php echo "$".number_format($product['quantity'] * $product['price'], 2); ?></td>
                       <td class="uk-text"><a class="uk-button uk-button-danger" href="cart?action=delete&id=<?php echo $product['id']; ?>">Remove</a> </td>
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
                  <a class="uk-button uk-button-primary" href="/fedorae/checkout">CheckOut</a>
                </div>
              </div>
           </div>
          </div>
         </form>
       </div>
     </div>

   <?php else: ?>
  <div class="uk-container">
    <div class="uk-text-center uk-align-center">
      <div class="uk-card uk-card-default uk-card-body">
      <h3 class="uk-card-title">Your shopping cart is empty.</h3>
    </div>
    </div>
    <div class="uk-text-right uk-align-right">
       <a class="uk-button uk-button-primary" href="/fedorae">Continue Shopping</a>
    </div>
  </div>
 <?php endif; ?>
