<template>
  <div>
    <h3 class="text-center">自分の投稿履歴</h3>

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
            <v-list-item-title>ユーザーID:{{ item.id }}</v-list-item-title>
          </v-list-item-content>

          <v-row
            align="center"
            justify="end">
            <v-icon class="mr-1">mdi-heart</v-icon>
            <span class="subheading mr-2">256</span>
            <span class="mr-1">·</span>
            <v-icon class="mr-1">mdi-share-variant</v-icon>
            <span class="subheading">45</span>
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

  mounted() {
    this.fetchUserItem()
  },

  methods: {
    fetchUserItem() {
      const userId = this.userInfo.id

      axios.get(`api/mypage/post/${userId}`).then( res => {
        this.myItems = res.data
        console.log(this.myItems)
      })

    },

    returnPage() {
      this.$router.back()
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
