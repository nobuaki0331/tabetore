<template>
  <div>
    <h3 class="text-center">{{ postHistory }}</h3>

    <v-card
      v-for="item in myItems"
      :key="item.id"
      class="mx-auto mt-4"
      color="#616161"
      dark>
      <v-card-title>
        <v-icon
          large
          left>
          mdi-twitter
        </v-icon>
        <span class="title font-weight-light">{{ item.title }}</span>
      </v-card-title>

      <v-card-text class="headline font-weight-bold">
        {{ item.content }}
      </v-card-text>

      <v-card-actions>
        <v-list-item class="grow">
          <v-list-item-avatar color="grey darken-3">
            <v-img
              class="elevation-6"
              src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light">
            </v-img>
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>{{ userInfo.name }}</v-list-item-title>
          </v-list-item-content>

          <v-row
            align="center"
            justify="end">
            <v-icon class="mr-1">mdi-heart</v-icon>
            <span class="subheading mr-2">256</span>
            <v-chip
              class="ma-2"
              color="red"
              text-color="white"
              @click="removePostItem(item.id)">
              削除
            </v-chip>
          </v-row>
        </v-list-item>
      </v-card-actions>
    </v-card>

      <div
        class="btn-box mt-4">
        <v-btn
          class="btn"
          color="error"
          @click="returnPage">
          前の画面に戻る
        </v-btn>
      </div>
  </div>
</template>

<script>
export default {
  name: 'PostItem',

  props: {
    userInfo: {
      type: Object,
      default: () => {}
    }
  },

  data() {
    return {
      content: '',
      title: '',

      myItems: [],
    }
  },

  created() {
    this.fetchUserItem()
  },

  computed: {
    postHistory() {
      const item = this.myItems ? '自分の投稿した履歴' : '現在の投稿はありません'
      return item;
    }
  },

  methods: {
    async fetchUserItem() {
      try {
        const userId = this.userInfo.id
        const res = await axios.get(`api/mypage/post/${userId}`);

        this.myItems = res.data;
      } catch (error) {
        console.log(error)
      }
    },

    returnPage() {
      this.$router.back()
    },

    async removePostItem(id=null) {
      const result = confirm('投稿を削除しますか？');

      if (result) {
        try {
          await axios.delete(`api/mypage/post/${id}`)
          alert('削除成功')

          this.fetchUserItem()

        } catch (error) {
            console.log(error)
            alert('削除できませんでした...')
        }
      }
    }
  }
}
</script>

<style scoped>
.v-card {
  width: 80%;
}

.btn-box {
  display:flex;
  padding: 0 118px;
}

.btn {
  margin-left: auto;
}
</style>
