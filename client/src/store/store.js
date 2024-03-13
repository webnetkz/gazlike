import { defineStore } from 'pinia';

export const useStore = defineStore({
  id: 'store',
  state: () => ({
    searchInput: '',
  }),
  actions: {
    
  },
  getters: {
    getSearchInput() {
      return this.searchInput;
    },
  },
});
