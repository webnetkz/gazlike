import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useStore = defineStore({
  id: 'store',
  
  state: () => ({
    searchInput: ref('Empty'),
    commentsCount: ref(0),
    likes: ref(0),
    dislikes: ref(0),
    isCreate: ref(0),
    comments: ref([]),
    newComment: '',
  }),

  actions: {
    changeSearchInput(event) {
        this.searchInput = event.target.value;
        
        if (this.searchInput.trim() !== '') {
          fetch('http://127.0.0.1:8081/', {
            method: 'POST',
            body: JSON.stringify({"action": "search_table", "table": this.searchInput})
          }).then(response => {
            return response.json();
          }).then(data => {
            if (data?.data?.table) {
              this.isCreate = true;
              this.comments = [];
            } else {
              this.isCreate = false;
            }
            this.comments = data.data.data.comments;
          }).catch(error => {
            console.error('Произошла ошибка:', error);
          });

      } else {
          console.log('Empty input');
      }
    },

    changeMessageInput(event) {
      this.newComment = event.target.value;
      fetch('http://127.0.0.1:8081/', {
            method: 'POST',
            body: JSON.stringify({"action": "create_comment", "table": this.searchInput, "comment": this.newComment})
          }).then(response => {
            return response.json();
          }).then(data => {
            console.log(data);
            this.comments.unshift({'comment': this.newComment, rate: 2, 'create_date': this.formattedDateTime()})
          }).catch(error => {
            console.error('Произошла ошибка:', error);
          });
    },

    createTable() {
      this.isCreate = false;
      fetch('http://127.0.0.1:8081/', {
            method: 'POST',
            body: JSON.stringify({"action": "create_table", "table": this.searchInput})
          }).then(response => {
            return response.json();
          }).then(data => {
            console.log(data);
          }).catch(error => {
            console.error('Произошла ошибка:', error);
          });
    },
    
    formattedDateTime() {
      let currentDate = new Date();
      const year = currentDate.getFullYear();
      const month = String(currentDate.getMonth() + 1).padStart(2, '0');
      const day = String(currentDate.getDate()).padStart(2, '0');
      const hours = String(currentDate.getHours()).padStart(2, '0');
      const minutes = String(currentDate.getMinutes()).padStart(2, '0');
      const seconds = String(currentDate.getSeconds()).padStart(2, '0');
      return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }
  

  },
});
