import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useStore = defineStore({
  id: 'store',
  
  state: () => ({
    searchInput: ref('Empty'),
    commentsCount: ref(0),
    likes: ref(0),
    dislikes: ref(0),
    comments: ref([
      {'id': 1, 'message': 'This is message of comment 1', 'date': '21.01.2009 12:12', 'class': false},
      {'id': 2, 'message': 'This is message of comment 2 This is message of comment 2 This is message of comment 2 This is message of comment 2 This is message of comment 2 This is message of comment 2 This is message of comment 2 This is message of comment 2 This is message of comment 2 v This is message of comment 2 This is message of comment 2 This is message of comment 2 This is message of comment 2 This is message of comment 2This is message of comment 2 This is message of comment 2 This is message of comment 2 This is message of comment 2 ', 'date': '21.01.2009 12:12', 'class': null},
      {'id': 2, 'message': 'This is message of comment 2', 'date': '21.01.2009 12:12', 'class': true}
    ]),
  }),

  actions: {
    changeSearchInput(event) {
        this.searchInput = event.target.value;
        
        if (this.searchInput.trim() !== '') {
          this.comments.push({'id': 3, 'message': this.searchInput, 'date': '21.01.2009 12:12'});

          fetch('http://127.0.0.1:8081', {
            method: 'POST',
            body: JSON.stringify({"action": "table", "table": this.searchInput})
          }).then(response => {
            return response.json();
          }).then(data => {
            console.log(data);
          }).catch(error => {
            console.error('Произошла ошибка:', error);
          });

      } else {
          console.log('Empty input');
      }
    },

    async sendRequestToServer(data) {
      try {
        const response = await fetch('http://127.0.0.1:8081/', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        });

        if (!response.ok) {
          throw new Error('Network response was not ok');
        }

        const responseData = await response.json();
        return responseData;
      } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        throw error;
      }
    },

  },
});
