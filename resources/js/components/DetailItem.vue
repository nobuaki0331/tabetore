<template>
  <div>
    <v-card
      :loading="loading"
      class="mx-auto my-12"
      max-width="700">
      <v-img
        height="300"
        src="https://cdn.vuetifyjs.com/images/cards/cooking.png">
      </v-img>
      <h3 class="content-title">{{ postItems.title }}</h3>
      <v-card-title>{{ postItems.content }}</v-card-title>
      <v-card-text>
        <v-row
          align="center"
          class="mx-0">
          <font-awesome-icon
            @click.prevent="onIconClicked"
            icon="grin-hearts"
            :aria-disabled="disabled"
            :class="{ 'icon-color': isLikedColor , 'icon-size' : isLikedSize }"/>
          <div class="grey--text ml-4">4.5 (413)←ここにはいいね、の数を入れる</div>
        </v-row>
        <div class="my-4 subtitle-1">
          ここには店の場所をいれる
        </div>
        <div>投稿したユーザーのID:{{ postItems.user_id }}</div>
      </v-card-text>
      <div v-if="postItems.remarks">
        <v-divider class="mx-4"></v-divider>
        <v-card-text>
          <h4 class="content-second-title">備考欄</h4>
          {{ postItems.remarks }}
        </v-card-text>
      </div>
    </v-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      selection: 1,
      id: this.$route.params.id,
      postItems: {},
      isLikedSize: true,
      isLikedColor: false,
      disabled: false,
    }
  },
  created() {
    this.fetchItem()
  },
  methods: {
    async fetchItem() {
      try {
        const res =  await axios.get('/api/item/' + this.id)
        this.postItems = res.data
      } catch (error) {
        console.log(error)
      }
    },
    onIconClicked() {
      console.log('クリツクしました')
      this.isLikedColor = true
      this.disabled = true
    },
  },
}
</script>

<style scoped>
.content-title {
  padding: 15px 0 0 15px;
  color: white;
}
.content-second-title {
  color: white;
}
.icon-color {
  color: red;
}
.icon-size {
  font-size: 2rem;
}
</style>
