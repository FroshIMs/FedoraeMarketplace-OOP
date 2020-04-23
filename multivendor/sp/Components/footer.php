<template id="">
  <footer class="uk-margin-xlarge-top">
    <div class="uk-text-center">
    	<hr />
    	<div class="uk-container">
    		<p>Copyright &copy; Fedorae - Multi-Vendor Version 3.3.1.0. All Rights Reserved.</p>
    	</div>
    </div>
  </footer>
  </div> <!-- vuetify controller -->
</template>

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
			data(){
				return{
          drawer: true,
          group: null,
          loading: false,
          selection: 1,
				}
      },
      methods: {
      reserve () {
        this.loading = true

        setTimeout(() => (this.loading = false), 2000)
        },
      },
      watch: {
        group () {
          this.drawer = false
        },
      },
    })
  </script>
</body>
</html>
