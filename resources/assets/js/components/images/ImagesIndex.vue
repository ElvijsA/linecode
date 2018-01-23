<template lang="html">
  <div>
      <p>
          <router-link :to="{ name: 'createImage'}" class="button is-pulled-right">Add New Image</router-link>
      </p>

        <table class="table is-narrow is-fullwidth">
          <thead>
            <tr>
              <th>Title</th>
              <th>Image</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="image, index in images">
              <td>{{ image.title }}</td>
              <td>{{ image.image }}</td>
              <td>
                <router-link :to="{name: 'editImage', params: {id: image.id}}" class="button is-small is-pulled-right">
                  Edit
                </router-link>
                
              </td>
            </tr>
        </tbody>
        </table>

  </div>

</template>

<script>
export default {
  data: function () {
            return {
                images: []
            }
        },
  mounted(){
    var app = this;
    axios.get('/api/v1/images')
      .then(function (resp){
        app.images = resp.data;
      })
      .catch(function(resp){
        console.log(resp);
        alert("Could not load Images");
      });
  },
  methods: {
    deleteEntry(id, index) {
      if(confirm("Do you relly want to delete it?")) {
        var app = this;
        axios.delete('/api/v1/images' + id)
          .then(function(resp){
            app.images.splice(index, 1);
          })
          .catch(function(){
            alert("Coult not delete Image")
          });
      }
    }
  }
}
</script>

<style lang="css">
</style>
