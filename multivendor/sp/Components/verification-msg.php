<template>
  <v-card
    class="mx-auto"
    max-width="430"
  >
    <v-card-text>
      <p class="display-1 text--primary">
        Verification Required
      </p>
      <div class="text--primary">
        You need to verify your account.
          Sign into your email account and click on the
          verification link we just emailed you at
          <strong><?php echo $_SESSION['email']; ?></strong>
      </div>
    </v-card-text>
  </v-card>
</template>
