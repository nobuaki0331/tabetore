
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
        <input
          v-model="highlight"
          type="text"
          label="ハイライト検索"
          style="width: 215px; height: 30px; margin-bottom: 10px; padding: 5px;"
          placeholder="ページ内でハイライト検索する" >
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
            <th class="text-left">お気に入り</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in getItems" :key="item.id">
            <td v-html="highlightSerch(item.user_id)"></td>
            <td v-html="highlightSerch(item.title)"></td>
            <td v-html="highlightSerch(item.content)"></td>
            <td>
              <v-btn @click="detailConntent(item.id)">詳細</v-btn>
            </td>
            <td>
              <font-awesome-icon
                icon="grin-hearts"
                id="icon"
                class="icon-style" />
            </td>
          </tr>
        </tbody>
      </v-simple-table>

      <paginate
        @click-page="onClickPage"
        :items="postItems"
        :per-page="parPage"
        prev-text="＜"
        next-text="＞"/>
    </div>
  </div>
</template>

<script>
import ContentTitle from './ContentTitle.vue'
import Paginate from './Paginate.vue'

export default {
  name: 'Item',
  components: {
    ContentTitle,
    Paginate,
  },
  data () {
    return {
      highlight: '',
      postItems: [],
      currentPage: 1,
      parPage: 5,
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
  },
  mounted() {
    this.fetchItem()
  },
  methods: {
    highlightSerch(text) {
      let highlightWord = this.highlight.trim()
      if (highlightWord === '' && !text.includes(highlightWord)) return text
      const re = new RegExp(highlightWord, 'ig');
      return text.replace(re, search => {
        return `<span style="background-color:yellow;font-weight:bold">${search}</span>`
      })
    },
    onClickPage(currentPage) {
      console.log(typeof currentPage)
      console.log(currentPage)
      this.currentPage = currentPage
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
      this.highlight = ''
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
.icon-style {
  font-size: 1.6rem;
}
</style>
