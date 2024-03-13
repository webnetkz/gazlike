<template>
  <header>
        <SearchInput/>  
        <SearchResults/>  
  </header>
</template>

<script>
  import SearchInput from './SearchInput.vue';
  import SearchResults from './SearchResults.vue';

  export default {
    name: 'HeaderComponent',
    setup() {
      return {

      };
    },
    components: {
      SearchInput,
      SearchResults
    },
  }
</script>

<style scoped>
  header {
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 5px;
      z-index: var(--z-header);
      width: 100vw;
      height: var(--header-height);
      background-color: var( --theme-color);
  }
  @media (max-width: 1200px) {
    header {
      flex-direction: column;
      height: calc(var(--header-height) * 1.6);
    }
  }
</style>
