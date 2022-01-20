<template>

  <div>


<!--    <div class="vh-100 d-flex justify-content-center align-items-center">-->
<!--      <h1>Centered horizontally and vertically!</h1>-->
<!--    </div>-->
    <div class="container d-flex vh-100 d-flex justify-content-center align-items-center">
      <div class="border border-info p-3">
        <h1> Logowanie </h1>
        <b-form @submit.stop.prevent>
          <label for="feedback-user">Login</label>

          <b-form-input

              v-model="userLogin"
              :state="isUserExists"

              id="feedback-user"
          ></b-form-input>

          <label for="text-passwordasd">Password</label>
          <b-form-input

              v-model="userPassword"
              :state="isUserExists"

              type="password"
              id="text-password"
              aria-describedby="password-help-block"
          >

          </b-form-input>

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
import toast from "../../js/mixins/toast";
export default {

  props:  ['csrf_token'],
  mixins: [toast],
  data: () => ({
    userLogin: 'karoladmin',
    userPassword: 'karol',
    validation: null,
    passwordValidation: null,
    invalidPassword: null,

    isUserExists: null,
    redirectAfterLoginUrl: '',
  }),
  methods: {
    test() {
    },

    redirectAfterLogin() {
      setTimeout(1000);
      window.location.href = this.redirectAfterLoginUrl;
    },

    loginAttemp() {
      let self = this;
      console.log({
        login: this.userLogin,
        password: this.userPassword,
        csrfToken: this.csrf_token,
      });

      axios
          .post(
              // '/login',
              '/api/login',
              {
                username: this.userLogin,
                password: this.userPassword,
              },

              {
                headers: {
                  'Content-Type': 'application/json'
                }
              }

          )
          .then((response) => {
            self.showToast(response, () => self.$router.push({ name: "home"}));
          });
    },
  },
  beforeMount() {
    console.log(this);
  }
}
</script>
