<template>

    <div class="col-md-4">
        <div class="item-box-blog">
            <div class="item-box-blog-image">
                <div class="item-box-blog-date bg-blue-ui white">
                    <span class="mon">{{getPostDate()}}</span>
                </div>
              <!--Image-->
                <figure>
                    <img
                    class="img-fluid"
                    alt=""
                    :src="post.photo"
                    />
                </figure>
            </div>
            <div class="item-box-blog-body">
              <div class="item-box-blog-heading">
                <a href="#" tabindex="0">
                  <h5>{{post.title}}</h5>
                </a>
              </div>
              <div class="item-box-blog-data" style="padding: px 15px">
                <p>
                  <i class="fa fa-user-o"></i> Admin,
                  <i class="fa fa-comments-o"></i> Comments(3)
                </p>
              </div>
              <div class="item-box-blog-text">
                <p>
                  {{post.description}}
                </p>
              </div>
              <div class="mt">
                <a href="#" tabindex="0" class="btn bg-blue-ui white read"
                  >read more</a
                >
              </div>
            </div>
          </div>
        </div>

</template>

<script>
export default {
  name: "App",
  components: {},
  props: ["post"],
  methods:{
      capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
      getPostDate(){
          const date = new Date(this.post.created_at);
          const monthName = this.capitalizeFirstLetter(date.toLocaleString('default', {month: 'long',}));
          const day = date.getDate();
          const postDate = monthName + ' ' + day;

          return postDate;

      }
  },
};
</script>

<style lang="scss" scoped>


    .item-box-blog {
    border: 1px solid #dadada;
    text-align: center;
    z-index: 4;
    padding: 30px 15px 15px 15px;
    outline: medium none;
    margin-bottom: 5rem;
    }

    .item-box-blog-image {
    position: relative;
    }

    .item-box-blog-image figure img {
    width: 100%;
    height: auto;
    }

    .item-box-blog-date {
    position: absolute;
    z-index: 5;
    padding: 4px 20px;
    top: -45px;
    right: 8px;
    background-color: #41cb52;
    }

    .item-box-blog-date span {
    color: #fff;
    display: block;
    text-align: center;
    line-height: 1.2;
    }

    .item-box-blog-date span.mon {
    font-size: 18px;
    }

    .item-box-blog-date span.day {
    font-size: 16px;
    }

    .item-box-blog-body {
    padding: 10px;
    }

    .item-heading-blog a h5 {
    margin: 0;
    line-height: 1;
    text-decoration:none;
    transition: color 0.3s;
    }

    .item-box-blog-heading {
        height: 50px;
        a {
        text-decoration: none;
    }
    }

    .item-box-blog-data p {
    font-size: 13px;
    }

    .item-box-blog-data p i {
    font-size: 12px;
    }

    .item-box-blog-text {
    height: 100px;
    overflow: hidden;
    color: rgb(166, 164, 164);
    }

    .mt-10 {
    float: left;
    margin-top: -10px;
    padding-top: 10px;
    }

    figure img{
        width: 100%;
        height: auto;
    }

    .btn.bg-blue-ui.white.read {
    cursor: pointer;
    padding: 4px 20px;
    float: left;
    margin-top: 10px;
    background-color: #fff;
    }


</style>
