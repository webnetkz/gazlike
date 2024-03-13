<template>
    <div id="createCommentContainer">
        <textarea id="comment" placeholder="Your comment"></textarea>
        <div class="likes-container">
            <span class="like-btn"></span>
            <span class="dislike-btn"></span>
        </div>
    </div>
</template>
  
<script>  
    export default {
      name: 'CreateComment',
      setup() {
        return {
  
        };
      },
    }
</script>
  
<style scoped>
  #createCommentContainer {
      position: fixed;
      bottom: -20vh;
      right: 0;
      padding: 20px 5px;
      width: 100vw;
      min-height: 10vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: var(--bg);
      border-top: 3px solid var(--theme-color);
  }

  #createCommentContainer textarea {
      width: 94%;
      height: 100%;
      border: 2px solid var(--theme-color);
      background-color: var(--bg);
  }
  .likes-container {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: flex-end;
      margin-left: 10px;
  }
  .like-btn,
  .dislike-btn {
      width: 30px;
      height: 30px;
      background: red;
      background: url('@/assets/logo32.png');
      background-size: 80%;
      background-repeat: no-repeat;
  }
  .like-btn:hover {
      cursor: pointer;
  }
  .dislike-btn:hover {
      cursor: pointer;
  }
  .dislike-btn {
      transform: rotate(180deg);
  }
</style>
