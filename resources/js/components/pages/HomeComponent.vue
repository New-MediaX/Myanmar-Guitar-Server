<template>
  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ appName }} | Dashboard</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"
                ><i class="fas fa-music"></i
              ></span>

              <div class="info-box-content">
                <span class="info-box-text">Songs</span>
                <span class="info-box-number">
                  {{ songs }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"
                ><i class="fas fa-users"></i
              ></span>

              <div class="info-box-content">
                <span class="info-box-text">Authors</span>
                <span class="info-box-number">{{ authors }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"
                ><i class="fas fa-compact-disc"></i
              ></span>

              <div class="info-box-content">
                <span class="info-box-text">Albums</span>
                <span class="info-box-number">
                  {{ albums }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!--/. container-fluid -->
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
      appName: "",
      songs: 0,
      albums: 0,
      authors: 0,
    };
  },
  mounted() {
    axios.defaults.baseURL = this.baseUrl;
    axios
      .get("/getAppName")
      .then((res) => (this.appName = res.data))
      .catch((err) => console.log("error"));
    axios
      .get("/songs/all")
      .then((res) => (this.songs = res.data.data.length))
      .catch((err) => console.log("error getting songs"));
    axios
      .get("/albums/all")
      .then((res) => (this.albums = res.data.data.length))
      .catch((err) => console.log("error getting albums"));
    axios
      .get("/authors/all")
      .then((res) => (this.authors = res.data.data.length))
      .catch((err) => console.log("error getting authors"));
  },
};
</script>