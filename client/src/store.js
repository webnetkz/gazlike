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
          console.log(this.requestToServer('http://127.0.0.1:8088/x/index.php', {'action': 'test'}));
          //this.comments.push({'id': 3, 'message': this.searchInput, 'date': '21.01.2009 12:12'})
          //this.requestToServer('./api', {'table': this.searchInput})
              // .then(dataOfServer => {      
 
              //   if (dataOfServer.data.comments) {
              //     this.comments = dataOfServer.data.comments;
              //   }
  
              // });
      } else {
          console.log('Empty input');
      }
    },

    async requestToServer(url, postData) {
      try {
          const response = await fetch(url, {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify(postData)
          });
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          const data = await response.json();
          return data;
      } catch (error) {
          console.error('There was a problem with the fetch operation:', error);
      }
    },

  },
});
