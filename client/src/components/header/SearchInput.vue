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
                if (event.target.value.length > 3 && event.target.value.length <= 25) {
                    store.changeSearchInput(event);
                }
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
    input {
        background: var(--bg);
        color: var(--white);
    }

    #search:focus {
        padding-right: 30px;
    }
    @media (max-width: 1200px) {
        #searchContainer,
        #search {
            width: 100%;
        }
    }
</style>