<template>
  <div>
    <Preloader :showLoader="showLoader" />
    <div class="container cta-100" v-if="!showLoader">
      <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-md-12">
            <figure>
              <img class="post-img" alt="" :src="post.photo" />
            </figure>
            <h1>{{ post.title }}</h1>
            <p>
              {{ post.description }}
            </p>
            <div>
              <span class="badge">{{ getPostDate() }}</span>
              <div class="pull-right">
                <span
                  v-for="(category, index) in categories"
                  :key="index"
                  class="badge"
                  :style="categoryColor(category.id)"
                  >{{ category.name }}</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Preloader from "../components/Preloader.vue";
export default {
  name: "App",
  components: {
    Preloader,
  },
  data: function () {
    return {
      post: {},
      author: {},
      categories: [],
      showLoader: true,
      postId: "",
    };
  },
  methods: {
    getPost() {
      this.postId = this.$route.params.postId;
      const apiUrl = "http://localhost:8000/api/posts/" + this.postId;
      axios
        .get(apiUrl)
        .then((result) => {
          const { results, author, categories } = result.data;
          this.post = results;
          this.author = author;
          this.categories = categories;
          console.log(result);
        })
        .catch((error) => {
          console.warn(error);
        });
    },
    getPostDate() {
      const date = new Date(this.post.created_at);
      return (
        date.getDate() +
        "/" +
        date.getMonth() +
        "/" +
        date.getFullYear() +
        " " +
        date.getHours() +
        ":" +
        date.getMinutes()
      );
    },

    categoryColor(id) {
      this.categories.forEach((element) => {
        if (element.id === id) {console.log(element.color);
          return {

            "background-color": element.color
          };
        }
      });
    },
  },

  created() {
    this.getPost();
  },

  mounted() {
    setTimeout(() => (this.showLoader = false), 2000);
  },
};
</script>

<style lang="scss" scoped>
.cta-100 {
  padding: 2rem;
  height: 72.9vh;
  .post-img {
    width: 250px;
  }
}
</style>
