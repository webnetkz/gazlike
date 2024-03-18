<template>
    <div id="searchContainer">
        <input type="text" v-mode="searchValue" @input="changeSearchInput" id="search" placeholder="Create/Search" autocomplete="off">
        <button v-if="isCreate" @click="createTable();" class="create-table">Create</button>
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
            const isCreate = computed(() => store.isCreate);

            const changeSearchInput = (event) => {
                if (event.target.value.trim() != '' && event.target.value.length <= 25) {
                    store.changeSearchInput(event);
                } else {
                    store.isCreate = false;
                }
            };
    
            return {
                searchInput,
                isCreate,
                changeSearchInput,
                createTable: store.createTable,
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

    .create-table {
        position: absolute;
        font-size: 1rem;
        right: calc(100% - 300px);
    }
    
    @media (max-width: 1200px) {
        .create-table {
            right: 10px;
        }
        #searchContainer,
        #search {
            width: 100%;
        }
    }
</style>