<template>
  <HeaderComponent/>
  <Intro/>
  <Comments/>
  <CreateComment/>
</template>

<script>
  import HeaderComponent from '@/components/header/Header.vue';
  import Intro from '@/components/Intro.vue';
  import Comments from '@/components/comments/Comments.vue';
  import CreateComment from '@/components/comments/CreateComment.vue';


  export default {
    name: 'App',
    components: {
      HeaderComponent,
      Intro,
      Comments,
      CreateComment,
    }
  }
</script>

<style>
@import url(assets/variables.css);
@import url(assets/styles.css);
@import url(assets/scroll.css);

  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
</style>./components/Header.vue./components/header/Header.vue
