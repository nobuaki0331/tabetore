
<template>
  <div class="pl-5">
    <content-title>
      <template v-slot="slotProps">
        <h3>
          {{ slotProps.data.title3 }}
        </h3>
      </template>
    </content-title>
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
            small
            color="primary">
            検索
          </v-btn>
          <v-btn
            @click.prevent="clearData"
            small color="gray">
            検索クリア
          </v-btn>
        </form>
        <div class="mt-8">
          <v-btn
            @click="onClickIdDesc"
            text color="primary"
            small>
            IDで降順
          </v-btn>
          <v-btn
            @click="onClickIdAsc"
            text color="error"
            small>
            IDで昇順
          </v-btn>
        </div>
      </div>
      <v-simple-table light>
        <thead>
          <tr>
            <th class="text-left">ID</th>
            <th class="text-left">タイトル</th>
            <th class="text-left">投稿内容</th>
            <th class="text-left">詳細</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in getItems" :key="item.id">
            <td>{{ item.user_id }}</td>
            <td>{{ item.title }}</td>
            <td>{{ item.content }}</td>
            <td>
              <v-btn @click="detailConntent(item.id)">詳細</v-btn>
            </td>
          </tr>
        </tbody>
      </v-simple-table>

      <paginate
        class="mt-5 justify-content-center"
        :page-count="getPageCount"
        :page-range="3"
        :margin-pages="2"
        :click-handler="clickCallback"
        :prev-text="'＜'"
        :next-text="'＞'"
        :container-class="'pagination'"
        :page-class="'page-item'"
        :page-link-class="'page-link'"
        :prev-class="'page-item'"
        :prev-link-class="'page-link'"
        :next-class="'page-item'"
        :next-link-class="'page-link'" />
    </div>
  </div>
</template>

<script>
import ContentTitle from './ContentTitle.vue'
import Paginate from 'vuejs-paginate'

export default {
  name: 'Item',
  components: {
    ContentTitle,
    Paginate,
  },
  data () {
    return {
      postItems: [],
      parPage: 5,
      currentPage: 1,
      user_id: '',
      title: '',
      content: '',
    }
  },
  computed: {
    getItems() {
      let current = this.currentPage * this.parPage;
      let start = current - this.parPage;
      return this.postItems.slice(start, current)
    },
    getPageCount: function() {
      return Math.ceil(this.postItems.length / this.parPage);
    },
  },
  mounted() {
    this.fetchItem()
  },
  methods: {
    clickCallback (pageNum) {
      this.currentPage = Number(pageNum);
    },

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
    detailConntent(postId) {
      this.$router.push({ name: 'detail-item', params: { id : postId }})
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
.text-positon {
  text-align: center;
}
tbody > tr > td {
  padding: 15px !important;
}
input {
  border: 1px solid gray;
}
a {
  padding: 10px;
  border: 1px solid black;
}
</style>
