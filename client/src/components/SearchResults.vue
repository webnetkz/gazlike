<template>
    <div id="searchResults">
        <b>{{ this.searchValue }}</b>
        <span class="result-comments">{{ this.commentsCount}}</span>
        <span class="result-likes">↑ {{ this.likes }}</span>
        <span class="result-dislikes">↓ {{ this.dislikes }}</span>
    </div>
</template>

<script>
  import { useStore } from '@/store.js';
  import { computed } from 'vue';

  export default {
    name: 'SearchResults',
    setup() {
      const store = useStore();
      const searchValue = computed(() => store.searchInput);
      const commentsCount = computed(() => store.commentsCount);
      const likes = computed(() => store.likes);
      const dislikes = computed(() => store.dislikes);


      return {
        searchValue,
        commentsCount,
        likes,
        dislikes,
      };
    },
  }
</script>

<style scoped>
  #searchResults {
      opacity: 1;
  }

  #searchResults b {
    margin-right: 5px;
  }

  .result-likes,
  .result-dislikes {
      font-size: 0.9rem;
  }
  .result-likes {
      color: var(--green);
  }
  .result-dislikes {
      color: var(--red);
  }
  .result-comments {
    position: absolute;
    font-size: 0.6rem;
    top: 3px;
 }
</style>
