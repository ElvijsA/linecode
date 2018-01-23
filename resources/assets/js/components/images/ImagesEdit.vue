<template lang="html">
  <div>
    <div class="row is-fullwidth">

      <form v-on:submit="saveForm()">


        <div class="field">
          <label for="title" class="label">Image Title</label>
          <p class="control">
            <input type="text" v-model="image.title" class="input" name="title" id="title">
          </p>
        </div>

        <div class="field">
          <label for="image" class="label">Image</label>
          <p class="control">
            <input type="text" v-model="image.image" class="input" name="image" id="image">
          </p>
        </div>

        <button class="button is-success">Add</button>
        <router-link to="/" class="button">Back</router-link>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
          let app = this;
          let id = app.$route.params.id;
          app.imageId = id;
          axios.get('/api/v1/images/' + id)
              .then(function (resp) {
                  app.image = resp.data;
              })
              .catch(function () {
                  alert("Could not load your image")
              });
      },
      data: function () {
          return {
              imageId: null,
              image: {
                  title: '',
                  image: '',
              }
          }
      },
      methods: {
          saveForm() {
              var app = this;
              var newImage = app.image;
              axios.patch('/api/v1/images/' + app.imageId, newImage)
                  .then(function (resp) {
                      app.$router.replace({path: '/'});
                  })
                  .catch(function (resp) {
                      console.log(resp);
                      alert("Could not create your image");
                  });
          }
      }
}
</script>

<style lang="css">
</style>
