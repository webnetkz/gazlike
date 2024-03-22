<template>
  <div class="comment-container" v-for="comment in comments" :key="comment.id" :class="{'comment-dislike': !comment.rate, 'comment-like': comment.rate == 1}">
    <p>{{ comment.comment }}</p>
    <span class="comment-date">{{ comment.create_date }}</span>
  </div>
</template>
  
<script>  
    import { useStore } from '@/store.js';
    import { computed } from 'vue';

    export default {
      name: 'CommentComponent',
      setup() {
        const store = useStore();
        const comments = computed(() => store.comments);

        return {
          comments,
        };
      },
    }
</script>
  
<style scoped>
  .comment-container {
      position: relative;
      padding: 5px 15px;
      border: 1px solid var(--theme-color);
      border-radius: var(--radius);
      width: 100%;
      min-height: 50px;
      margin: 3px;
      background: var(--bg-light);
      color: var(--theme-color);
  }
  .comment-container:hover {
      cursor: pointer;
      background: var(--theme-color);
      color: var(--bg);
  }
  .comment-container:hover .comment-date {
    transform: scale(1.4);
    right: 20px;
  }
  .comment-container p {
    text-align: left;
    padding-bottom: 1rem;
  }
  .comment-like {
      border-color: var(--theme-color);
  }
  .comment-like::after {
      content: "↑";
  }
  .comment-dislike {
      border-color: var(--gray);
      color: var(--gray);
  }
  .comment-dislike::after {
      content: "↓";
  }
  .comment-like::after,
  .comment-dislike::after {
      position: absolute;
      right: 5px;
      top: 5px;
  }
  .comment-date {
      position: absolute;
      right: 5px;
      bottom: 5px;
      font-size: 0.5rem;
      color: var(--gray);
  }
</style>
