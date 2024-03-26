<template>
    <div id="createCommentContainer" v-if="!isCreate && (searchInput != 'Empty' && (searchInput.length > 1))">
        <textarea id="comment" placeholder="Your comment"></textarea>
        <div class="likes-container">
            <span class="like-btn" @click="createComment"></span>
            <span class="dislike-btn" @click="createComment"></span>
        </div>
    </div>
</template>
  
<script>  
    import { useStore } from '@/store.js';
    import { computed } from 'vue';

    export default {
      name: 'CreateComment',
      setup() {
            const store = useStore();

            const newComment = computed(() => store.newComment);
            const isCreate = computed(() => store.isCreate);
            const searchInput = computed(() => store.searchInput);


            const createComment = (event) => {
                store.createComment(event);
            };
    
            return {
                newComment,
                isCreate,
                searchInput,
                createComment,
            };
        },
    }
</script>
  
<style scoped>
  #createCommentContainer {
      position: fixed;
      bottom: 0vh;
      right: 0;
      padding: 20px 5px;
      width: 100vw;
      min-height: 10vh;
      display: flex;
      justify-content: center;
      align-items: center;
      backdrop-filter: blur(12px);
  }

  #createCommentContainer textarea {
      width: 94%;
      height: 100%;
      border: 2px solid var(--theme-color);
      background-color: var(--bg);
      color: var(--white);
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
      transform: scale(1.2);
  }
  .dislike-btn:hover {
      cursor: pointer;
      transform: scale(1.2) rotate(180deg);
  }
  .dislike-btn {
      transform: rotate(180deg);
  }
</style>
