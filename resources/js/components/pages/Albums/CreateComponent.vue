<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Album <a class="btn btn-success btn-md" href="/albums/list" role="button">Album List <i class="fas fa-list"></i></a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Album</li>
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
                <h3 class="card-title">Create New Album</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data" @submit="register">
                <div class="card-body">
                  <div
                    v-if="status == 1"
                    class="alert alert-success"
                    role="alert"
                  >
                    Create Success!
                  </div>
                  <div
                    v-if="status == 2"
                    class="alert alert-danger"
                    role="alert"
                  >
                    Create Error!
                  </div>
                  <div class="form-group">
                    <label for="album_name_en">Album Name (EN)</label>
                    <input
                      type="text"
                      :class="
                        errors.album_name_en
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                      id="album_name_en"
                      placeholder="album Name"
                      v-model="form_album_name_en"
                    />
                    <div
                      class="invalid-feedback text-sm text-danger"
                      v-for="(err, index) in errors.album_name_en"
                      :key="index"
                    >
                      {{ err }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="album_name_mm">Album Name (MM)</label>
                    <input
                      type="text"
                      :class="
                        errors.album_name_mm
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                      id="album_name_mm"
                      placeholder="album Name"
                      v-model="form_album_name_mm"
                    />
                    <div
                      class="invalid-feedback text-sm text-danger"
                      v-for="(err, index) in errors.album_name_mm"
                      :key="index"
                    >
                      {{ err }}
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">
                    Create New Album
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
  props: ["baseUrl"],
  data: function () {
    return {
      errors: {},
      form_album_name_en: "",
      form_album_name_mm: "",
      status: 0,
    };
  },
  methods: {
    register(e) {
      e.preventDefault();

      const data = {
        album_name_en: this.form_album_name_en,
        album_name_mm: this.form_album_name_mm,
      };

      this.errors = {};

      axios
        .post("/albums/create", data)
        .then((res) => {
          if(res.data == "Success")
          {
            this.clearInputs();
            this.status = 1;
          }
          
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          this.status = 2;
        });
    },
    clearInputs() {
      this.form_album_name_en = "";
      this.form_album_name_mm = "";
    },
  },
  mounted() {
    axios.defaults.baseURL = this.baseUrl;
  },
};
</script>

<style>
</style>