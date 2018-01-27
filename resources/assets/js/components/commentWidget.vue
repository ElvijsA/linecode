<template>
   <div class="comment">
      <div class="field">
        <label for="name" class="label">Comment</label>
       <p class="control">
          <div class="boxsizingBorder">
            <textarea  class="input" v-model="commentBody"></textarea>
          </div>
       </p>
     </div>
     <div class="flex right">
        <input class="button" @click="commentPost()" value="Add Comment">
     </div>
   </div>
</template>

<script>
   export default {
      data: function(){
         return{
            commentBody: '',
            api_token: this.$root.api_token,
            user_id: this.$root.user_id,
            post_id: this.$root.post_id
         }
      },
      methods: {
      commentPost() {
         let vm = this;
            if(this.api_token) {
               axios.get('/api/comments/store',  {
                  params: {
                     api_token: vm.api_token,
                     commentBody: vm.commentBody,
                     user_id: vm.user_id,
                     post_id: vm.post_id
                  }
               })
               .then(response =>{})
               .catch(e => {
                  app.errors.push(e)
            })
      }
      }
      }
   }
</script>
