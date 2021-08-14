<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Album List
              <a
                class="btn btn-success btn-md"
                href="/albums/create"
                role="button"
                >Create New <i class="fas fa-plus-circle"></i
              ></a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Album List</li>
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
                <h3 class="card-title">Album List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="list" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Album Name(MM)</th>
                      <th>Album Name(EN)</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="album in albums.data" :key="album.id">
                      <td>{{ album.id }}</td>
                      <td>{{ album.album_name_mm }}</td>
                      <td>{{ album.album_name_en }}</td>
                      <td>
                        <a
                          class="btn btn-warning"
                          :href="'/albums/edit/' + album.id"
                          role="button"
                          ><i class="fas fa-edit"></i
                        ></a>
                        <button
                          @click="destory(album.id)"
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
                    :data="albums"
                    @pagination-change-page="getAlbums"
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
  data: function () {
    return {
      albums: {},
    };
  },
  methods: {
    destory(id) {
      this.$swal
        .fire({
          title: "Do you want to delete?",
          text: "Do you really want to delete this album?",
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
              .delete(`/albums/delete/${id}`)
              .then((res) => {
                this.$swal.fire({
                  icon: "success",
                  title: "Delete Successful",
                  text: "Album Delete Success",
                  showConfirmButton: false,
                  timer: 2000,
                });
                this.getAlbums();
              })
              .catch((err) => {
                this.$swal.fire(
                  "Deleted!",
                  "Album Deleted Error",
                  "Error"
                );
              });
          }
        });
    },
    getAlbums( page = 1)
    {
      axios
      .get("/albums/all?page=" + page)
      .then((res) => {
        this.albums = res.data;
      })
      .catch((err) => {
        console.log("error");
      });
    }
  },
  mounted() {
    this.getAlbums();
  },
};
</script>

<style>
</style>