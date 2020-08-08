<template>
  <div class="container pl-5">
    <content-title>
      <template v-slot="slotProps">
        <h3>{{ slotProps.data.title4 }}</h3>
      </template>
    </content-title>
    <div class="row">
      <div
        v-for="item in movieItems"
        :key="item.id"
        class="content-item col-sm-12 col-lg-6">
        <h4>{{ item.name }}</h4>
        <iframe
          width="560"
          height="315"
          :src="item.path"
          frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen />
      </div>
    </div>
  </div>
</template>

<script>
import ContentTitle from './ContentTitle.vue'

export default {
  name: 'Movie',
  data() {
    return {
      movieItems: [
        { name:'モチベーションが上がる動画',path: 'https://www.youtube.com/embed/QBwsdG2sJmU'},
        { name:'モチベーションが上がる音楽',path: 'https://www.youtube.com/embed/8VjWRL8JxLs'},
        { name:'モチベーションが上がる筋トレ動画',path: 'https://www.youtube.com/embed/yPbQ1tpvt3Y'},
        { name:'モチベーションが上がる動画',path: 'https://www.youtube.com/embed/QBwsdG2sJmU'},
        { name:'モチベーションが上がる音楽',path: 'https://www.youtube.com/embed/8VjWRL8JxLs'},
        { name:'モチベーションが上がる筋トレ動画',path: 'https://www.youtube.com/embed/yPbQ1tpvt3Y'},
      ]
    }
  }
}
</script>
