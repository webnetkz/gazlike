<template>
  <div id="commentsContainer">
       <Comment/>
  </div>
</template>
  
<script>  
    import Comment from './Comment.vue';

    export default {
      name: 'CommentsComponent',

      components: {
        Comment
      },
    }
</script>
  
<style scoped>
  #commentsContainer {
    min-height: 60vh;
    width: 90vw;
    margin-left: 5vw;
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    margin-bottom: 7rem;
  }
</style>
