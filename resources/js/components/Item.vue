
<template>
<div>
  <h3 class="text-positon">口コミ一覧</h3>

  <div class="content">
    <div class="m-2">
      <form>
        <input
          v-model="user_id"
          type="text"
          style="width: 160px; height: 30px; padding: 5px;"
          placeholder="ユーザーIDで検索する" >

        <input
          v-model="title"
          type="text"
          style="width: 160px; height: 30px; padding: 5px;"
          placeholder="タイトルで検索する" >

        <input
          v-model="content"
          type="text"
          style="width: 160px; height: 30px; padding: 5px;"
          placeholder="投稿内容で検索する" >

        <v-btn
          @click.prevent="searchData"
          small color="primary">検索</v-btn>

        <v-btn
          @click.prevent="clearData"
          small color="gray">検索クリア</v-btn>

      </form>

      <div class="mt-8">
        <v-btn
          @click="onClickIdDesc"
          text color="primary"
          small>IDで降順</v-btn>
        <v-btn
          @click="onClickIdAsc"
          text color="error"
          small>IDで昇順</v-btn>
      </div>
    </div>
    <v-simple-table light>
      <thead>
        <tr>
          <th
            class="text-left">ID</th>
          <th class="text-left">タイトル</th>
          <th class="text-left">投稿内容</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in postItems" :key="item.id">
          <td>{{ item.user_id }}</td>
          <td>{{ item.title }}</td>
          <td>{{ item.content }}</td>
        </tr>
      </tbody>
    </v-simple-table>
  </div>
</div>
</template>

<script>
  export default {
    data () {
      return {
        postItems: [],

        user_id: '',
        title: '',
        content: '',
      }
    },

    mounted() {
      this.fetchItem()
    },

    methods: {
      async fetchItem() {
        try {
          const res = await axios.get('api/item')
          this.postItems = res.data
        } catch (error) {
          console.log(error)
        }
      },

      async searchData () {
        try {
          const params = {
            // 検索のパラメータを指定
            user_id: this.user_id,
            title: this.title,
            content: this.content
          }
          const res = await axios.get('api/item/keywords',{ params });
          this.postItems = res.data;

        } catch (error) {
          console.log(error)
        }
      },

      clearData() {
        this.user_id = ''
        this.title = ''
        this.content = ''

        this.fetchItem()
      },

      //　降順ソート
      onClickIdDesc() {
        this.postItems.sort((a,b) => {
          if(a.user_id > b.user_id) return -1;
          if(a.user_id < b.user_id) return 1;

          return 0;
        })
      },

      // 昇順ソート
      onClickIdAsc() {
        this.postItems.sort((a,b) => {
          if(a.user_id < b.user_id) return -1;
          if(a.user_id > b.user_id) return 1;

          return 0;
        })
      },
    }
  }
</script>

<style scoped>
.content {
  width: 90%;
  margin: 0 auto;
}
.text-positon {
  text-align: center;
}

tbody > tr > td {
  padding: 15px !important;
}

input {
  border: 1px solid gray;
}
</style>
