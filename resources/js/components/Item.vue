
<template>
<div>
  <h3 class="text-positon">口コミ一覧</h3>

  <div class="content">
    <div class="m-2">
      <v-btn
        @click="onClickIdDesc"
        text color="primary"
        small>IDで降順</v-btn>
      <v-btn
        @click="onClickIdAsc"
        text color="error"
        small>IDで昇順</v-btn>
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
        postItems: {},
      }
    },

    mounted() {
      this.fetchItem()
    },

    methods: {
      fetchItem() {
        axios.get('api/item').then(res => {
          this.postItems = res.data
        })
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
</style>
