
<template>
  <div class="p-5">

    <h3>商品の口コミを投稿する</h3>

    <form class="mt-4">
      <input-text
        v-model="item_name"
        name="name"
        label="商品名"
        placeholder="商品名"
        required />

      <input-text
        v-model="title"
        name="title"
        label="タイトル"
        placeholder="タイトル"
        required />

      <input-text
        v-model="content"
        name="content"
        label="投稿内容"
        placeholder="投稿内容"
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
        color="primary"
        class="mr-4">
        投稿する
      </v-btn>
    </form>
  </div>
</template>

<script>
import InputText from './Form/InputText.vue'

export default {
  name: 'PostPage',

  components: {
    InputText,
  },

  data() {
    return {
      item_name: '',
      title: '',
      content: '',

      checkbox: '',
    }
  },

  methods: {
    // prototype
    Intialize() {
      this.item_name = ''
      this.title = ''
      this.content = ''
    }
  }
}
</script>
