<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Song List
              <a
                class="btn btn-success btn-md"
                :href="url+'/songs/create'"
                role="button"
                >Create New <i class="fas fa-plus-circle"></i
              ></a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Song List</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Song List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Song Name(MM)</th>
                      <th>Song Name(EN)</th>
                      <th>Author Name</th>
                      <th>Album Name</th>
                      <th>View Count</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="song in songs.data" :key="song.id">
                      <td>{{ song.id }}</td>
                      <td>{{ song.song_name_mm }}</td>
                      <td>{{ song.song_name_en }}</td>
                      <td>
                        {{
                          song.author ? song.author.author_name_mm : "No Author"
                        }}
                      </td>
                      <td>
                        {{ song.album ? song.album.album_name_mm : "No Album" }}
                      </td>
                      <td>{{ song.view_count }}</td>
                      <td>
                        <a
                          class="btn btn-warning"
                          :href="url+'/songs/edit/' + song.id"
                          role="button"
                          ><i class="fas fa-edit"></i
                        ></a>
                        <button
                          @click="destory(song.id)"
                          type="button"
                          class="btn btn-danger"
                        >
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <pagination
                    :data="songs"
                    @pagination-change-page="getSongs"
                    :limit="20"
                  ></pagination>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
import axios from "axios";
import VueSweetalert2 from "vue-sweetalert2";
Vue.component("pagination", require("laravel-vue-pagination"));
import "sweetalert2/dist/sweetalert2.min.css";
Vue.use(VueSweetalert2);

export default {
  props: ["url"],
  data: function () {
    return {
      songs: {},
    };
  },
  methods: {
    destory(id) {
      this.$swal
        .fire({
          title: "Do you want to delete?",
          text: "Do you really want to delete this song?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Delete",
          cancelButtonText: "Cancel",
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios
              .delete(`/songs/delete/${id}`)
              .then((res) => {
                this.$swal.fire({
                  icon: "success",
                  title: "Delete Successful",
                  text: "Song Delete Success",
                  showConfirmButton: false,
                  timer: 2000,
                });
                this.getSongs();
              })
              .catch((err) => {
                this.$swal.fire(
                  "Deleted!",
                  "Song Deleted Error",
                  "Error"
                );
              });
          }
        });
    },
    getSongs( page = 1)
    {
      axios
      .get("/songs/all?page=" + page)
      .then((res) => {
        this.songs = res.data;
      })
      .catch((err) => {
        console.log("error");
      });
    }
  },
  mounted() {
    axios.defaults.baseURL = this.url;
    this.getSongs();
  },
};
</script>

<style>
</style>