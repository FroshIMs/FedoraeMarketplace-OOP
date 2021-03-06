<?php
  $producer = new ProducerModel();
  $producers = $producer->displayProducers();
?>


<div class="uk-container uk-margin-top-remove">
  <?php foreach ($producers as $producer): ?>
    <template>
      <v-card
        :loading="loading"
        class="my-12"
        max-width="800"
      >
        <v-img
          height="100"
          src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
        ></v-img>

        <v-card-title><?php echo $producer['username']; ?></v-card-title>

        <v-card-text>
          <v-row
            align="center"
            class="mx-0"
          >
            <v-rating
              :value="4.5"
              color="amber"
              dense
              half-increments
              readonly
              size="14"
            ></v-rating>

            <div class="grey--text ml-4">4.5 (413)</div>
          </v-row>

          <div class="my-4 subtitle-1">
            $ • Italian, Cafe
          </div>

          <div>Small plates, salads & sandwiches - an intimate setting with 12 indoor seats plus patio seating.</div>
        </v-card-text>

        <v-divider class="mx-4"></v-divider>

        <v-card-title>Tonight's availability</v-card-title>

        <v-card-text>
          <v-chip-group
            v-model="selection"
            active-class="deep-purple accent-4 white--text"
            column
          >
            <v-chip>5:30PM</v-chip>

            <v-chip>7:30PM</v-chip>

            <v-chip>8:00PM</v-chip>

            <v-chip>9:00PM</v-chip>
          </v-chip-group>
        </v-card-text>

        <v-card-actions>
          <v-btn
            color="deep-purple lighten-2"
            text
            @click="reserve"
          >
            Reserve
          </v-btn>
          <v-btn
            color="deep-purple lighten-2"
            text
            @click="reserve"
          >
            Contact
          </v-btn>
          <v-btn
            color="deep-purple lighten-2"
            text
            @click="reserve"
          >
            View
          </v-btn>
        </v-card-actions>
      </v-card>
    </template>
  <?php endforeach; ?>
</div>
