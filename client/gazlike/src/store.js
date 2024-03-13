import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useMyStore = defineStore({
  id: 'myStore',
  state: () => ({
    searchInput: ref(''),
    comments_count: ref(0),
    likes: ref(0),
    dislikes: ref(0),
    comments: ref([])
  }),
  actions: {
    sendRequest() {
      // ваша логика отправки запроса
    }
  }
});
