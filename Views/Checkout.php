<?php
  CheckoutModel::OrderInfo();
 ?>
<?php if (!empty($_SESSION['shopping_cart'])): ?>
  <?php $total = 0; ?>
  <div class="uk-container">
    <div class="uk-margin">
      <h1>Checkout</h1>
      <ul uk-accordion>
        <li class="uk-open">
            <a class="uk-accordion-title" href="#" uk-icon="icon:  chevron-down">Step 1: Account & Billing Details</a>
            <div class="uk-accordion-content">
              <div class="uk-text-left" uk-grid>
                  <div class="uk-width-1-2">
                      <div class="uk-card uk-card-default uk-card-body">
                        <div class="">
                          <!-- probably gonna have to do some validation on these -->
                          <form class="uk-form-stacked" action="" method="post">
                            <h1 class="uk-heading">Your Personal Details</h1>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">First Name</label>
                                <div class="uk-form-controls">
                                  <input class="uk-input" id="form-stacked-text" type="text" name="fname" value="<?php echo isset($_SESSION['first-name']); ?>" placeholder="First Name...">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Last Name</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="lname" value="<?php echo isset($_SESSION['last-name']); ?>" placeholder="Last Name...">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">E-Mail</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="email" value="<?php echo isset($_SESSION['email']); ?>" placeholder="E-Mail...">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Telephone</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" name="phone" value="<?php echo isset($_SESSION['phone']); ?>" placeholder="Telephone...">
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="uk-width-1-2">
                      <div class="uk-card uk-card-default uk-card-body">
                        <h1 class="uk-heading">Your Address</h1>
                          <div class="uk-margin">
                              <label class="uk-form-label" for="form-stacked-text">Company</label>
                              <div class="uk-form-controls">
                                  <input class="uk-input" id="form-stacked-text" type="text" name="company" value="<?php echo isset($_SESSION['company']); ?>" placeholder="Company...">
                              </div>
                          </div>
                          <div class="uk-margin">
                              <label class="uk-form-label" for="form-stacked-text">Address 1</label>
                              <div class="uk-form-controls">
                                  <input class="uk-input" id="form-stacked-text" type="text" name="address1" value="<?php echo isset($_SESSION['address1']); ?>" placeholder="Address 1...">
                              </div>
                          </div>
                          <div class="uk-margin">
                              <label class="uk-form-label" for="form-stacked-text">Address 2</label>
                              <div class="uk-form-controls">
                                  <input class="uk-input" id="form-stacked-text" type="text" name="address2" value="<?php echo isset($_SESSION['address2']); ?>" placeholder="Address 2...">
                              </div>
                          </div>
                          <div class="uk-margin">
                              <label class="uk-form-label" for="form-stacked-text">Post Code</label>
                              <div class="uk-form-controls">
                                  <input class="uk-input" id="form-stacked-text" type="text" name="postcode" value="<?php echo isset($_SESSION['postcode']); ?>" placeholder="Post Code...">
                              </div>
                          </div>

                          <div class="uk-margin">
                              <label class="uk-form-label" for="form-stacked-select">Region / State</label>
                              <div class="uk-form-controls">
                                  <select class="uk-select" id="form-stacked-select" value="" name="region">
                                      <option>--- Please Select ---</option>
                                      <option>Hanover Parish</option>
                                      <option>Saint Elizabeth Parish</option>
                                      <option>Saint James Parish</option>
                                      <option>Trelawny Parish</option>
                                      <option>Westmoreland Parish</option>
                                      <option>Clarendon Parish</option>
                                      <option>Manchester Parish</option>
                                      <option>Saint Ann Parish</option>
                                      <option>Saint Catherine Parish</option>
                                      <option>Saint Mary Parish</option>
                                      <option>Kingston Parish Parish</option>
                                      <option>Portland Parish</option>
                                      <option>Saint Andrew Parish</option>
                                      <option>Saint Thomas Parish</option>
                                  </select>
                              </div>
                          </div>
                          <button type="submit" class="uk-button uk-button-primary uk-align-right" name="set1" onclick="document.getElementById('set2Button').click()">Continue</button>
                      </form>
                      </div>
                  </div>
              </div>
            </div>
        </li>
        <li>
            <a id="set2Button" class="uk-accordion-title" href="#" uk-icon="icon:  chevron-down">Step 2: Payment Method</a>
            <div class="uk-accordion-content">
              <div class="uk-margin">
                <div class="uk-form-controls">
                  <label><input class="uk-radio" type="radio" name="paypal"> PayPal</label><br>
                  <label><input class="uk-radio" type="radio" name="guestCheckout"> Guest Checkout</label><br>
                  <label><input class="uk-radio" type="radio" name="cashOnDelivery"> Cash on Delivery</label>
                </div>
              </div>
              <div class="uk-margin">
                <textarea class="uk-textarea" rows="5" name="comments" placeholder=""><?php echo isset($_SESSION['comments']); ?></textarea>
              </div>
              <div class="uk-text-right">
                <p>I have read and agree to the <a href="#">Terms & Conditions</a> <input type="checkbox" name="paymentMethod" value="1" required></p>
                <button type="button" class="uk-button uk-button-primary uk-align-right" name="set1" onclick="document.getElementById('set3Button').click()">Continue</button>
              </div>
            </div>
        </li>
        <li>
            <a id="set3Button" class="uk-accordion-title" href="#" uk-icon="icon:  chevron-down">Step 3: Confirm Order</a>
            <div class="uk-accordion-content">
              <div class="uk-container">
                <div class="uk-margin-top">
                  <form class="" action="" method="post">
                    <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-middle uk-table-divider">
                        <thead>
                            <tr>
                                <th class="uk-table-shrink">Product Name</th>
                                <th class="uk-width-small">Quantity</th>
                                <th class="uk-width-small">Unit Price</th>
                                <th class="uk-width-small">Total</th>
                            </tr>
                        </thead>
                        <?php foreach ($_SESSION['shopping_cart'] as $key => $product): ?>
                        <tbody>
                            <tr>
                                <td class="uk-table-link">
                                    <a class="uk-link-reset" href="product?product_id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                </td>
                                <td class="uk-text"><?php echo $product['quantity']; ?></td>
                                <td class="uk-text-nowrap"><?php echo "$".$product['price']; ?></td>
                                <td class="uk-text-nowrap"><?php echo "$".number_format($product['quantity'] * $product['price'], 2); ?></td>
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
                           <button class="uk-button uk-button-primary" href="/fedorae/order-success" type="submit">Confirm Order</button>
                         </div>
                       </div>
                    </div>
                   </div>
                  </form>
                </div>
              </div>
            </div>
        </li>
      </ul>
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
