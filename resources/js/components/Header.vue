<template>
  <div>
    <header class="position-fixed w-100">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Boolpress</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <router-link class="nav-link" to="/">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/posts">Posts</router-link>
            </li>
            <li class="nav-item">
              <a href="http://127.0.0.1:8000/contacts" class="nav-link" to="/posts">Contact Us</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" v-if="(this.$route.name != 'posts') && (this.$route.name != 'post')">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Search category"
              aria-label="Search"
              v-model="categoryName"
              @keyup="callPostList()"
            />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Search
            </button>
          </form>
        </div>
      </nav>
    </header>
  </div>
</template>

<script>
export default {
  name: "Header",
  data: function () {
    return {
      categoryName: "",
    };
  },
  methods: {
    callPostList() {
    if(this.categoryName.length > 3){

        this.$router.push({name:'posts', query: { category: this.categoryName } });
    }
    },
  },
};
</script>

<style lang="scss" scoped>
header {
  z-index: 6;
  height: 10vh;
}
</style>
