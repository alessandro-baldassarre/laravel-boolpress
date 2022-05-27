<template>
  <div class="container cta-100">
    <div class="container">
      <div class="row blog">
        <Post v-for="(post, index) in posts" :key="index" :post="post" />
      </div>
      <div class="row pagination-links">
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <li
              class="page-item"
              v-if="pagination.currentPage > 1"
              @click="getPosts(pagination.currentPage - 1)"
            >
              <a class="page-link">Previous</a>
            </li>

            <li class="page-item">
              <a class="page-link">{{ pagination.currentPage }}</a>
            </li>

            <li
              class="page-item"
              v-if="pagination.currentPage < pagination.lastPage"
              @click="getPosts(pagination.currentPage + 1)"
            >
              <a class="page-link">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
import Post from "../components/post-list/Post.vue";
export default {
  name: "App",
  components: {
    Post,
  },
  data: function () {
    return {
      posts: [],
      pagination: {},
    };
  },
  methods: {
    getPosts(page) {
      const apiUrl = 'http://localhost:8000/api/posts?page=' + page;
      axios
        .get(apiUrl)
        .then((result) => {
          const { data, current_page, last_page } = result.data.results;
          this.posts = data;
          this.pagination = { currentPage: current_page, lastPage: last_page };
        })
        .catch((error) => {
          console.warn(error);
        });
    },
  },
  created() {
    this.getPosts();
  },
};
</script>

<style lang="scss" scoped>
.cta-100 {
  padding: 2rem;
    .pagination-links{
        padding-top: 2rem;
        justify-content: center;
        li{
            cursor: pointer;
        }
    }
}

</style>
