<template>
  <div class="content">
    <h3>ユーザー情報の編集</h3>
    <form
      ref="clear_form"
      class="mt-4">
      <input-text
        v-model="formData.id"
        name="id"
        label="登録ID"
        placeholder="登録ID"
        disabled
        required />
      <input-text
        v-model="formData.name"
        name="name"
        label="ユーザーネーム"
        placeholder="ユーザーネーム"
        :errors="errors.name"
        required />
      <input-text
        v-model="formData.email"
        name="email"
        label="メールアドレス"
        placeholder="メールアドレス"
        :errors="errors.email"
        required />
      <v-btn
        color="error"
        class="mr-4 mt-4"
        @click="returnPage">
        前の画面に戻る
      </v-btn>
      <v-btn
        color="primary"
        class="mr-4 mt-4"
        @click.prevent="updateUserInfo">
        入力情報を更新する
      </v-btn>
      <v-btn
        color="grey lighten-2"
        class="btn-font-color mr-4 mt-4"
        @click="transitionPage">
        自分の投稿履歴を見にいく
      </v-btn>
    </form>
  </div>
</template>

<script>
import InputText from './Form/InputText.vue'
import TextArea from './Form/TextArea.vue'
import axios from 'axios';

export default {
  name: 'Mypage',
  components: {
    InputText,
    TextArea,
  },
  props: {
    userInfo: {
      type: Object,
      default: () => {}
    }
  },
  data() {
    return {
      formData: {
        id: '',
        name: '',
        email: '',
      },
      errors: {},
    }
  },
  created() {
    this.formData.id = this.userInfo.id
    this.formData.name = this.userInfo.name
    this.formData.email = this.userInfo.email
  },
  methods: {
    returnPage() {
      this.$router.back()
    },
    async updateUserInfo() {
      try {
        await axios.post(`api/mypage/${this.formData.id}`, {
        id: this.formData.id,
        name: this.formData.name,
        email: this.formData.email,
        })
        alert('更新が成功しました')
      } catch(e) {
        this.errors = e.response.data.errors
      }
    },
    transitionPage() {
      this.$router.push({ name: 'my-post-item' })
    }
  }
}
</script>

<style scoped>
.content {
  width: 90%;
  margin: 0 auto;
}
.text-color {
  color: black;
}
.btn-font-color {
  color: black;
}
</style>
