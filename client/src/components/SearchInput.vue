<template>
    <div id="searchContainer">
        <input type="text" v-mode="searchValue" @input="changeSearchInput" id="search" placeholder="Create/Search" autocomplete="off">
    </div>
</template>

<script>
    import { useStore } from '@/store.js';
    import { computed } from 'vue';

    export default {
        name: 'SearchInput',
        setup() {
            const store = useStore();

            const searchInput = computed(() => store.searchInput);

            const changeSearchInput = (event) => {
                store.changeSearchInput(event);
            };
    
            return {
                searchInput,
                changeSearchInput,
            };
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