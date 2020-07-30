
<template>
  <div class="p-5">

    <h3>商品の口コミを投稿する</h3>

    <form
      ref="clear_form"
      class="mt-4">
      <input-text
        v-model="formData.id"
        name="id"
        label="登録ID"
        placeholder="登録ID"
        :errors="errors.user_id"
        required-line
        required />

      <input-text
        v-model="formData.title"
        name="title"
        label="タイトル"
        placeholder="タイトル"
        :errors="errors.title"
        required-line
        required />

      <text-area
        v-model="formData.content"
        name="content"
        label="投稿内容"
        placeholder="投稿内容"
        :errors="errors.content"
        required-line
        required />

      <v-checkbox
        v-model="checkbox"
        label="Do you agree?"
        required />

      <v-btn
        color="error"
        class="mr-4"
        @click="Intialize">
        入力をやり直す
      </v-btn>

      <v-btn
        @click.prevent = "fetchItem"
        color="primary"
        class="btn-mt-sm mr-4">
        投稿する
      </v-btn>
    </form>
  </div>
</template>

<script>
import InputText from './Form/InputText.vue'
import TextArea from './Form/TextArea.vue'
import axios from 'axios';

export default {
  name: 'PostPage',

  components: {
    InputText,
    TextArea,
  },

  data() {
    return {
      formData: {
        id: '',
        title: '',
        content: '',
      },

      checkbox: '',
      errors: {},
    }
  },

  methods: {
    Intialize() {
      this.$refs.clear_form.reset()
    },

    async fetchItem(){
      try {
        await axios.post('api/post/', {
          user_id: this.formData.id,
          title: this.formData.title,
          content: this.formData.content,
        })

        alert('口コミ投稿しました')

        this.Intialize()
      } catch(e) {
        this.errors = e.response.data.errors
      }
    }
  }
}
</script>

<style scoped>
.text-color {
  color: black;
}

@media screen and (max-width:367px){
  .btn-mt-sm {
    margin-top: 10px;
  }
}

</style>
