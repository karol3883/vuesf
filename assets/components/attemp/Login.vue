<template>

  <div>


<!--    <div class="vh-100 d-flex justify-content-center align-items-center">-->
<!--      <h1>Centered horizontally and vertically!</h1>-->
<!--    </div>-->
    <div class="container d-flex vh-100 d-flex justify-content-center align-items-center">
      <div class="border border-info p-3">
        <h1> Logowanie </h1>
        <b-form @submit.stop.prevent>
          <label for="feedback-user">User ID</label>
          <b-form-input v-model="userId" :state="validation" id="feedback-user"></b-form-input>
          <b-form-invalid-feedback :state="validation">
            Your user ID must be 5-12 characters long.
          </b-form-invalid-feedback>
          <b-form-valid-feedback :state="validation">
            Looks Good.
          </b-form-valid-feedback>

          <label for="text-passwordasd">Password</label>
          <b-form-input type="password" id="text-password" aria-describedby="password-help-block"></b-form-input>
          <!--        <b-form-text id="password-help-block">-->
          <!--          Your password must be 8-20 characters long, contain letters and numbers, and must not-->
          <!--          contain spaces, special characters, or emoji.-->
          <!--        </b-form-text>-->


          <b-button
            variant="outline-primary mt-2"
            @click="loginAttemp()"
          >
            Login
          </b-button>
        </b-form>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  data: () => ({
    userId: '',
    login: '',
    password: '',
    validation: true,
  }),
  methods: {
    test() {
    },

    loginAttemp() {

      axios
          .post(
              '/login',
              {
                login: "karol",
                password: "karol1",
              },

          )
          .then((response) => {
            console.log(response);
          });
    },
  },
  beforeMount() {
    this.test();
  }
}
</script>

<style scoped>
body{
  height: 100vh;
}
.container{
  height: 100%;
}
</style>