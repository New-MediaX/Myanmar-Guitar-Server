<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ form_author_name_mm }}
                 <a class="btn btn-success btn-md" :href="url+'/authors/list'" role="button">Author List <i class="fas fa-list"></i></a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Author</li>
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
                <h3 class="card-title">Edit Author | {{ form_author_name_mm }}</h3>
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
                    <label for="author_name_en">Author Name (EN)</label>
                    <input
                      type="text"
                      :class="
                        errors.author_name_en
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                      id="author_name_en"
                      placeholder="Author Name"
                      v-model="form_author_name_en"
                    />
                    <div
                      class="invalid-feedback text-sm text-danger"
                      v-for="(err, index) in errors.author_name_en"
                      :key="index"
                    >
                      {{ err }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="author_name_mm">Author Name (MM)</label>
                    <input
                      type="text"
                      :class="
                        errors.author_name_mm
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                      id="author_name_mm"
                      placeholder="Author Name"
                      v-model="form_author_name_mm"
                    />
                    <div
                      class="invalid-feedback text-sm text-danger"
                      v-for="(err, index) in errors.author_name_mm"
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
import settings from "../../../settings.json"
export default {
  props: ["id","url"],
  data: function () {
    return {
      errors: {},
      form_author_name_en: "",
      form_author_name_mm: "",
      status: 0,
    };
  },
  methods: {
    update(e) {
      window.scrollTo(0, 0);
      this.status = 0;
      e.preventDefault();

      const data = {
        author_name_en: this.form_author_name_en,
        author_name_mm: this.form_author_name_mm,
      };

      this.errors = {};

      axios
        .put(settings.authors.update + this.id, data)
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
      .get(settings.authors.get + this.id)
      .then((res) => {
        if (res) {
          this.form_author_name_en = res.data.author_name_en;
          this.form_author_name_mm = res.data.author_name_mm;
        }
      })
      .catch((err) => {
        console.log("Error getting author");
      });

  },
};
</script>

<style>
</style>