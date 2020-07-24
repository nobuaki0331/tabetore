
<template>
  <div>
    <h3 class="content-title">商品一覧</h3>
    <v-card
      class="mx-auto"
      max-width="1000">
      <v-system-bar
        color="gray darken-2"
        dark>
        <v-spacer></v-spacer>
      </v-system-bar>

      <v-toolbar>
        <v-btn icon>
          <v-icon>mdi-magnify</v-icon>
        </v-btn>
      </v-toolbar>

      <v-container fluid>
        <v-row dense>
          <v-col
            v-for="card in cards"
            :key="card.id"
            :cols="card.flex">
            <v-card>
              <v-img
                :src="card.src"
                class="white--text align-end"
                gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                height="200px">
                <v-card-title :class="{ 'yellow--text' : card.color }">{{ card.title }}</v-card-title>
              </v-img>

              <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn icon>
                  <v-icon>mdi-heart</v-icon>
                </v-btn>

                <v-btn icon>
                  <v-icon>mdi-bookmark</v-icon>
                </v-btn>

                <v-btn icon>
                  <v-icon>mdi-share-variant</v-icon>
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </div>
</template>

<script>
  export default {
    data: () => ({
      cards: [
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/house.jpg', flex: 12 , color: true},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 3 , color: true},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 3 , color: true},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 3 , color: true},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 3 , color: false},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 3 , color: false},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 3 , color: false},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 3 , color: false},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 3 , color: false},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 3 , color: false},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 3 , color: false},
        { title: '商品名', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 3 , color: false},
        { title: '商品名', src: './img/sample1.jpg', flex: 3 ,color: false},
      ],
    }),
  }
</script>

<style scoped>
.content-title {
  text-align: center;
}
</style>
