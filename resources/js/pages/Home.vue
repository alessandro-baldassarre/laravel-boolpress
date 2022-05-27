<template>
  <div class="main-home d-flex justify-content-center align-items-center">
      <h1>Boolpress</h1>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
div.main-home{
    height: 84.9vh;
    h1{
        font-family: 'Blaka', cursive;
        text-transform: uppercase;
        color: white;
        font-size: 6rem;
        animation: title-load 900ms ease-in;
    }
}

@keyframes title-load{
    0%{
        transform: translateX(-300%);
    }
    100%{
        transform: translateX(0);
    }
}

</style>
