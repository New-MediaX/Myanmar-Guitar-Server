<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ form_song_name_mm }}
                 <a class="btn btn-success btn-md" :href="url+'/songs/list'" role="button">Song List <i class="fas fa-list"></i></a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Song</li>
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
                <h3 class="card-title">Edit Song | {{ form_song_name_mm }}</h3>
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
                    <label for="author">Author</label>
                    <select
                      class="custom-select form-control-border"
                      id="author"
                      v-model="form_author_id"
                    >
                      <option value="0" selected>No Author</option>
                      <option
                        v-for="author in authors"
                        :key="author.id"
                        :value="author.id"
                      >
                        {{ author.author_name_mm }}
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="album">Album</label>
                    <select
                      class="custom-select form-control-border"
                      id="album"
                      v-model="form_album_id"
                    >
                      <option value="0" selected>No Album</option>
                      <option
                        v-for="album in albums"
                        :key="album.id"
                        :value="album.id"
                      >
                        {{ album.album_name_mm }}
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="song_name_en">Song Name (EN)</label>
                    <input
                      type="text"
                      :class="
                        errors.song_name_en
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                      id="song_name_en"
                      placeholder="Song Name"
                      v-model="form_song_name_en"
                    />
                    <div
                      class="invalid-feedback text-sm text-danger"
                      v-for="(err, index) in errors.song_name_en"
                      :key="index"
                    >
                      {{ err }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="song_name_mm">Song Name (MM)</label>
                    <input
                      type="text"
                      :class="
                        errors.song_name_mm
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                      id="song_name_mm"
                      placeholder="Song Name"
                      v-model="form_song_name_mm"
                    />
                    <div
                      class="invalid-feedback text-sm text-danger"
                      v-for="(err, index) in errors.song_name_mm"
                      :key="index"
                    >
                      {{ err }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="file">Song Image File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input
                          type="file"
                          ref="mainImageInput"
                          @change="setFile"
                          accept="image/jpeg"
                          :class="
                            errors.image
                              ? 'form-control is-invalid'
                              : 'form-control'
                          "
                        />
                        <br />
                        <p
                          class="invalid-feedback text-sm text-danger"
                          v-for="(err, index) in errors.file"
                          :key="index"
                        >
                          {{ err }}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div>
                    <img
                      v-if="form_file "
                      :src="form_file"
                      class="preview-img img-fluid"
                    />
                    <img
                      v-if="form_new_file "
                      :src="form_new_file"
                      class="preview-img img-fluid"
                    />
                  </div>
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="is_new"
                      v-model="form_is_new"
                      :checked="form_is_new == true ? 'checked' : ''"
                    />
                    <label class="form-check-label" for="is_new">New</label>
                  </div>
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="is_popular"
                      v-model="form_is_popular"
                      :checked="form_is_popular == true ? 'checked' : ''"
                    />
                    <label class="form-check-label" for="is_popular"
                      >Popular</label
                    >
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
      authors: [],
      albums: [],
      errors: {},
      form_author_id: 0,
      form_album_id: 0,
      form_song_name_en: "",
      form_song_name_mm: "",
      form_file: "",
      form_new_file: "",
      form_is_new: false,
      form_is_popular: false,
      status: 0,
    };
  },
  methods: {
    update(e) {
      window.scrollTo(0, 0);
      this.status = 0;
      e.preventDefault();

      const data = {
        author_id: this.form_author_id,
        album_id: this.form_album_id,
        song_name_en: this.form_song_name_en,
        song_name_mm: this.form_song_name_mm,
        is_new: this.form_is_new,
        is_popular: this.form_is_popular,
        image: this.form_file,
        new_image: this.form_new_file
      };

      this.errors = {};

      axios
        .put(settings.songs.update + this.id, data)
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
    setFile(e) {
      const file = e.target.files[0];
      if (!file.type.includes("image/")) {
        alert("Please select an image file");
        return;
      }
      if (typeof FileReader === "function") {
        const reader = new FileReader();
        reader.onload = (event) => {
          this.form_new_file = event.target.result;
          this.form_file = "";
        };
        reader.readAsDataURL(file);
      } else {
        alert("Sorry, FileReader API not supported");
      }
    },
  },
  mounted() {
    axios.defaults.baseURL = this.url;
    axios
      .get(settings.songs.get + this.id)
      .then((res) => {
        if (res) {
          this.form_author_id = res.data.author_id;
          this.form_album_id = res.data.album_id;
          this.form_song_name_en = res.data.song_name_en;
          this.form_song_name_mm = res.data.song_name_mm;
          this.form_is_new = res.data.is_new;
          this.form_is_popular = res.data.is_popular;
          this.form_file = res.data.file;
        }
      })
      .catch((err) => {
        console.log("error getting albums");
      });

    axios
      .get(settings.albums.getAll)
      .then((res) => {
        this.albums = res.data;
      })
      .catch((err) => {
        console.log("error getting albums");
      });

    axios
      .get(settings.authors.getAll)
      .then((res) => {
        this.authors = res.data;
      })
      .catch((err) => {
        console.log("error getting authors");
      });
  },
};
</script>

<style>
.preview-img {
  width: 400px;
  height: 600px;
}
</style>