<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>API Token</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Token</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Token</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data" @submit="update">
                <div class="card-body">
                  <div
                    v-if="status == 1"
                    class="alert alert-success"
                    role="alert"
                  >
                    Update Success!
                  </div>
                  <div
                    v-if="status == 2"
                    class="alert alert-danger"
                    role="alert"
                  >
                    Update Error!
                  </div>
                  <div class="form-group">
                    <label for="token">Token</label>
                    <input
                      type="text"
                      :class="
                        errors.token
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                      id="token"
                      placeholder="Token"
                      v-model="token"
                    />
                    <div
                      class="invalid-feedback text-sm text-danger"
                      v-for="(err, index) in errors.token"
                      :key="index"
                    >
                      {{ err }}
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">
                    Update
                  </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["id", "url"],
  data: function () {
    return {
      errors: {},
      token: "",
      status: 0,
    };
  },
  methods: {
    update(e) {
      window.scrollTo(0, 0);
      this.status = 0;
      e.preventDefault();

      const data = {
        token: this.token,
      };

      this.errors = {};

      axios
        .put("/token/edit/", data)
        .then((res) => {
          if (res.data == "Success") {
            this.status = 1;
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          this.status = 2;
        });
    },
  },
  mounted() {
    axios.defaults.baseURL = this.url;

    axios
      .get("/token/getToken")
      .then((res) => {
        this.token = res.data.token;
      })
      .catch((err) => console.log("Error"));
  },
};
</script>

<style>
</style>