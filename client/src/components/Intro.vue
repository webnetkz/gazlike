<template>
    <div id="intro">
        <h1>Absolutely anonymous reviews</h1>
        <p>service for collecting anonymous statistics and conducting surveys</p>
    </div>    
</template>
  
<script>  
    export default {
      name: 'IntroComponent',
      setup() {
        return {
  
        };
      },
    }
</script>
  
<style scoped>
  #intro {
    min-height: 50vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: var(--theme-color);
  }

  #intro h1 {
    font-size: 4rem;
    border-bottom: 2px solid var(--theme-color);
    padding-bottom: 1rem;
    margin-bottom: 1rem;
  }

  #intro p {
    font-size: 1.5rem;
  }
</style>
