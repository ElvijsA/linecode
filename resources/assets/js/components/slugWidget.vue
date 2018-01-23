<style scoped>
   .slug-widget {
      display: flex;
      justify-content: flex-start;
      align-items: center;
   }
   .wrapper{
      margin: 5px;
   }
   .slug{
      background-color: #E7EEF8;
      padding: 2px 4px;
   }
   .input {
      width: auto;
   }
   .url-wrapper{
      height: 28px;
      display: flex;
      align-items: center;
   }
</style>

<template>
   <div class="slug-widget">

      <div class="icon-wrapper wrapper">
         <i class="fa fa-link"></i>
      </div>

      <div class="url-wrapper wrapper">
         <span class="root-url">{{url}}</span
         ><span class="subdirectory-url">{{subdirectory}}</span
         ><span class="slug" v-show="slug && !isEditing">{{slug}}</span
         ><input type="text" name="slug" class="input is-small" v-show="isEditing" v-model="customSlug"/>
      </div>

      <div class="button-wrapper wrapper">
         <button class="save-slug-button button is-small" v-show="!isEditing" @click.prevent="editSlug">Edit</button>
         <button class="save-slug-button button is-small" v-show="isEditing" @click.prevent="saveSlug">Save</button>
         <button class="save-slug-button button is-small" v-show="isEditing" @click.prevent="resetSlug">Reset</button>
      </div>

   </div>
</template>

<script>
   export default {
      props: {
         url: {
            type: String,
            require: true
         },
         subdirectory: {
            type: String,
            required: true
         },
         title: {
            type: String,
            required: true
         }
      },
      data: function() {
         return {
            slug: this.convertTitle(),
            isEditing: false,
            customSlug: '',
            wasEdited: false
         }
      },
      methods: {
         convertTitle: function() {
            return Slug(this.title)
         },
         editSlug: function() {
            this.customSlug = this.slug;
            this.isEditing = true;
         },
         saveSlug: function() {
            // run ajax to see if new slug in unique
            if (this.customSlug !== this.slug) this.wasEdited = true;
            this.slug = Slug(this.customSlug);
            this.isEditing = false;
         },
         resetSlug: function() {
            this.slug = this.convertTitle();
            this.wasEdited = false;
            this.isEditing = false;
         }
      },
      watch: {
         title: _.debounce(function(){
            if (this.wasEdited == false) this.slug = this.convertTitle()
            // run ajax to see if slug is unique
            //if not unique, customize the slug
            }, 500),
            slug: function(val) {
               this.$emit('slug-changed', this.slug)
            }
         }
    }
</script>
