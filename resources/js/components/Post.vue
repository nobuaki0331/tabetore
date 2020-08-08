
<template>
  <div class="pl-5">
    <content-title>
      <template v-slot="slotProps">
        <h3>{{ slotProps.data.title1 }}</h3>
      </template>
    </content-title>
    <form
      ref="clear_form"
      enctype="multipart/form-data"
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
      <file-upload
        @select-file="fileSelected"/>
      <text-area
        v-model="formData.content"
        name="content"
        label="投稿内容"
        placeholder="投稿内容"
        :errors="errors.content"
        required-line
        required />
      <text-area
        v-model="formData.remarks"
        name="remarks"
        label="備考欄"
        placeholder="備考欄"
        textHeight
        :errors="errors.remarks" />
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
        @click.prevent="onClickSubmit"
        color="primary"
        class="btn-mt-sm mr-4">
        投稿する
      </v-btn>
    </form>
  </div>
</template>

<script>
import ContentTitle from './ContentTitle.vue'
import InputText from './Form/InputText.vue'
import TextArea from './Form/TextArea.vue'
import FileUpload from './Form/FileUpload.vue'
import axios from 'axios';

export default {
  name: 'PostPage',
  components: {
    ContentTitle,
    InputText,
    TextArea,
    FileUpload,
  },
  data() {
    return {
      formData: {
        id: '',
        title: '',
        content: '',
        remarks: '',
      },
      checkbox: '',
      errors: {},
      fileInfo: '',
    }
  },
  methods: {
    Intialize() {
      this.$refs.clear_form.reset()
    },
    async PostItem(){
      try {
        await axios.post('api/post/', {
          user_id: this.formData.id,
          title: this.formData.title,
          content: this.formData.content,
          remarks: this.formData.remarks,
        })
        alert('口コミを投稿しました')
      } catch(e) {
        this.errors = e.response.data.errors
      }
    },
    // 画像ファイル用api
    async filePostItem(){
      try {
        const res = await axios.post('api/post/upload/', this.fileInfo)
      } catch(e) {
        this.errors = e.response.data.errors
      }
    },
    onClickSubmit() {
      this.PostItem()
      // 初期化
      this.Intialize()
    },
    fileSelected(fileInfo) {
      this.fileInfo = fileInfo
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
