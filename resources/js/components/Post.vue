
<template>
  <div class="p-5">

    <h3>商品の口コミを投稿する</h3>

    <form
      ref="clear_form"
      class="mt-4">
      <input-text
        v-model="formData.item_name"
        name="name"
        label="商品名"
        placeholder="商品名"
        required />

      <input-text
        v-model="formData.title"
        name="title"
        label="タイトル"
        placeholder="タイトル"
        required />

      <text-area
        v-model="formData.content"
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

    <!-- <v-img
      src="../img/sample1.jpg"
      class="image-postion"
      max-height="200"
      aspect-ratio="1.4"
      contain>
    </v-img> -->
  </div>
</template>

<script>
import InputText from './Form/InputText.vue'
import TextArea from './Form/TextArea.vue'

export default {
  name: 'PostPage',

  components: {
    InputText,
    TextArea,
  },

  data() {
    return {
      formData: {
        item_name: '',
        title: '',
        content: '',
      },

      checkbox: '',
    }
  },

  methods: {
    Intialize() {
      this.$refs.clear_form.reset()
    }
  }
}
</script>

<style scoped>
</style>
