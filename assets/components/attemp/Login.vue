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

              :modelmodel="userLogin"
              :state="isUserExists"

              id="feedback-user"
          ></b-form-input>

          <label for="text-passwordasd">Password</label>
          <b-form-input

              :state="isUserExists"
              :model="userPassword"

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

  mixins: [toast],
  data: () => ({
    userLogin: '',
    userPassword: '',
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

      let test = {
        toast_details: {
          dupa:1
        }
      };


      axios
          .post(
              '/login',
              {
                login: "karol",
                password: "karol1",
              },
              window.default_axios_config
          )
          .then((response) => {
            console.log(response.data);
            console.log(response.data);

            self.isUserExists = response.data.is_user_exists;
            self.redirectAfterLoginUrl = response.data.redirect_url;

            self.showToast(response);
            self.redirectAfterLogin();
          });
    },
  },
  beforeMount() {
    console.log(this);
  }
}
</script>
