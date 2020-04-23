<?php
  SubscribeControl::subscribe();
 ?>
<footer class="uk-margin-xlarge-top uk-background-secondary uk-light uk-margin-bottom-remove">
<hr />
<div class="uk-container">
	<div class="uk-margin">
		<div class="uk-container uk-align-left uk-background-secondary">
			<h2 class="uk-heading-line uk-text-center"><span>Make Money with Us</span></h2>
			<ul class="">
				<li><a href="/fedorae/multivendor/register">Sell on Fedorae Business</a> </li>
			</ul>
		</div>
	</div>
	<div class="uk-margin">
		<?php $errors = array(); // just so no error ?>
		<?php if(count($errors) > 0): ?>
				<v-alert type="warning">
					<?php foreach($errors as $error): ?>
						<li><?php echo $error; ?></li>
					<?php endforeach; ?>
				</v-alert>
		<?php endif; ?>
		<form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="uk-container uk-align-right uk-background-secondary">
				<div class="uk-align-center uk-text-center">
					<h1 class="uk-heading-line uk-text-center"><span>Subscribe</span></h1>
					<p>Get notified of new updates and latest news.</p>
						<div class="uk-inline">
							<span class="uk-form-icon" uk-icon="icon: mail"></span>
							<input class="uk-input" type="email" name="sub-email" placeholder="Enter Your Email...">
						</div>
						<button type="submit" name="subscrip" class="uk-button uk-button-secondary">Sign Up</button>
				</div>
					<div class="uk-text-center">
						<h5 class="uk-heading">Stay connected on social media!</h5>
						<div class="">
							<a href="" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
							<a href="" class="uk-icon-button  uk-margin-small-right" uk-icon="facebook"></a>
							<a href="" class="uk-icon-button" uk-icon="google-plus"></a>
						</div>
					</div>
			</div>
		</form>
	</div>
</div>
</footer>
<div class="uk-text-center uk-background-secondary">
	<hr />
	<div class="uk-container">
		<p>Copyright &copy; Fedorae Company, LLC. All Rights Reserved.</p>
	</div>
</div>
</div> <!-- Vue/Vuetify controller -->

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
			data(){
				return{
					showPassword: false,
          cart: 0,
          seller: "View Seller",
          isHidden: true,
				}
			},
      methods: {
        addToCart: function() {
          this.cart += 1
        },
        removeFromCart: function() {
          this.cart -= 1
        }
      },
      computed: {
        seller() {
          return this.seller
        }
      }
    })
  </script>
</body>
</html>
