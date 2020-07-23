import Router from 'vue-router'
import NewItem from './components/NewItem.vue'
import Item from './components/Item.vue'
import Post from './components/Post.vue'
import Gallery from './components/Gallery.vue'
import Movie from './components/Movie.vue'

export default new Router({
  mode: 'history',
  routes: [
    // {
    //   path: '/hoge',
    //   name: 'hoge',
    //   component: Hoge
    // },
    {
      path: '/newitem',
      name: 'newitem',
      component: NewItem
    },
    {
      path: '/item',
      name: 'item',
      component: Item
    },
    {
      path: '/post',
      name: 'post',
      component: Post
    },
    {
      path: '/gallery',
      name: 'gallery',
      component: Gallery
    },
    {
      path: '/movie',
      name: 'movie',
      component: Movie
    },
  ]
});
