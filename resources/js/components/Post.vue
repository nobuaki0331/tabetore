
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
        required-line
        required />

      <input-text
        v-model="formData.title"
        name="title"
        label="タイトル"
        placeholder="タイトル"
        required-line
        required />

      <text-area
        v-model="formData.content"
        name="content"
        label="投稿内容"
        placeholder="投稿内容"
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
        class="mr-4">
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
      } catch(error) {
        console.log(error)
      }
    }
  }
}
</script>

<style scoped>
.text-color {
  color: black;
}

</style>
