<template>
    <div id="searchContainer">
        <input type="text" id="search" placeholder="Create/Search" autocomplete="off">
    </div>
</template>

<script>
    export default {
        name: 'Search',
        data() {
            return {
            
            }
        },    
    }
</script>

<style scoped>
#searchContainer {
    display: flex;
    justify-content: center;
    align-items: center;
}

#search:focus {
    border-color: var(--white);
}
</style>