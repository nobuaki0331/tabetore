<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped>
      <v-list dense>
        <v-list-item
          v-for="item in items"
          :key="item.text"
          link>
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>

              <router-link :to="item.path">{{ item.text }}</router-link>

            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-subheader class="mt-4 grey--text text--darken-1">SUPPORTMEMBERS</v-subheader>
        <v-list>
          <v-list-item
            v-for="item in items2"
            :key="item.text"
            link>
            <v-list-item-avatar>
              <img
                :src="`https://randomuser.me/api/portraits/men/${item.picture}.jpg`"
                alt="">
            </v-list-item-avatar>
            <v-list-item-title v-text="item.text"></v-list-item-title>
          </v-list-item>
        </v-list>
        <v-list-item
          class="mt-4"
          link>
          <v-list-item-action>
            <v-icon color="grey darken-1">mdi-plus-circle-outline</v-icon>
          </v-list-item-action>
          <v-list-item-title class="grey--text text--darken-1">Browse Channels</v-list-item-title>
        </v-list-item>
        <v-list-item link>
          <v-list-item-action>
            <v-icon color="grey darken-1">mdi-cog</v-icon>
          </v-list-item-action>
          <v-list-item-title class="grey--text text--darken-1">Manage Subscriptions</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      clipped-left
      color="red"
      dense>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-icon
        class="sm-display-none mx-4"
        large>
        mdi-youtube
      </v-icon>
      <v-toolbar-title class="title-font-size align-center">
        食べトレ
      </v-toolbar-title>
      <v-spacer></v-spacer>

      <a
        class="link-font-size"
        href="/logout">ログアウト</a>
      <v-chip
        @click="transition"
        class="link-font-size ma-2"
        color="#3949AB"
        text-color="white">
        <v-avatar left>
          <v-icon>mdi-account-circle</v-icon>
        </v-avatar>
        マイページ
      </v-chip>
    </v-app-bar>

    <v-main>
      <router-view :user-info="userInfo"></router-view>
    </v-main>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
      userInfo: {
        type: Object,
        default: () => {},
      },
    },
    data: () => ({
      drawer: null,
      items: [
        { icon: 'mdi-trending-up', text: '新着商品', path: 'newitem' },
        { icon: 'mdi-youtube-subscription', text: '商品一覧', path: 'item' },
        { icon: 'mdi-history', text: '口コミ投稿', path: 'post' },
        { icon: 'mdi-playlist-play', text: '画像', path: 'gallery' },
        { icon: 'mdi-clock', text: '動画', path: 'movie' },
      ],
      items2: [
        { picture: 28, text: 'Joseph' },
        { picture: 38, text: 'Apple' },
        { picture: 48, text: 'Xbox Ahoy' },
        { picture: 58, text: 'Nokia' },
        { picture: 78, text: 'MKBHD' },
      ],
    }),
    created () {
      this.$vuetify.theme.dark = true
    },

    methods: {
      transition() {
        if (this.$route.path !== '/mypage') {
          this.$router.push('mypage')
        }
      }
    }
  }
</script>

<style scoped>
.v-application a {
  color : inherit;
}

.theme--dark.v-application {
  background: white !important;
}

.v-main__wrap {
  width: 90%;
  margin: 0 auto;
}

@media screen and (max-width:500px){
  .link-font-size {
    font-size: 11px;
  }
}

@media screen and (max-width:400px){
  .title-font-size {
    margin-left: 10px;
    font-size: 16px;
  }

  .sm-display-none {
    display: none;
  }
}
</style>
