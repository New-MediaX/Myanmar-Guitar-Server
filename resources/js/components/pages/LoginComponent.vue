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
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" v-model="remember" />
                <label for="remember"> Remember Me </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
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
export default {
  data: function () {
    return {
      username: "",
      password: "",
      remember: false,
    };
  },
  methods: {
    login(e) {
      e.preventDefault();
      if (this.username !== "") {
        if (this.password !== "") {
          axios
            .post("/auth/login",{"email" : this.username,"password" : this.password})
            .then((res) => {
              if(res.data == "Success") {window.location = '/home'};
            })
            .catch((err) => {
              console.log("error");
            });
        }
      }
    },
  },
};
</script>
