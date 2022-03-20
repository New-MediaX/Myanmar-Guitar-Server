<template>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="/" class="h1"><b>Log</b> In</a>
      </div>
      <div class="card-body">
        <form @submit="login">
          <div class="input-group mb-3">
            <input
              type="email"
              class="form-control"
              placeholder="Email"
              v-model="username"
            />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input
              type="password"
              class="form-control"
              placeholder="Password"
              v-model="password"
            />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div v-if="status == 1" class="alert alert-success" role="alert">
            Login Success!
          </div>
          <div v-if="status == 2" class="alert alert-danger" role="alert">
            Invalid Username Or Password!
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">
                Sign In
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</template>

<script>
import axios from "axios";
import settings from "../../settings.json"
export default {
  props: ['url','token'],
  data: function () {
    return {
      username: "",
      password: "",
      status: 0,
    };
  },
  methods: {
    login(e) {
      this.status = 0;
      e.preventDefault();
      if (this.username !== "") {
        if (this.password !== "") {
          axios
            .post(settings.general.login, {
              email: this.username,
              password: this.password,
              _token: this.token
            })
            .then((res) => {
              if (res.data == "Success") {
                this.status = 1;
                window.location = `${this.url}/home`;
              } else {
                this.status = 2;
              }
            })
            .catch((err) => {
              console.log("error");
            });
        }
      }
    },
  },
  mounted() {
    axios.defaults.baseURL = this.url;
  }
};
</script>
