<template>
  <div class="container pl-5">
    <h3 class="text-center">お気に入りMOVIE</h3>
    <div class="row">
      <div
        v-for="item in movieItems"
        :key="item.id"
        class="content-item col-6">
        <h4>{{ item.name }}</h4>
        <iframe width="560" height="315" :src="item.path" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Movie',

  data() {
    return {
      movieItems: [
        { name:'モチベーションが上がる動画',path: 'https://www.youtube.com/embed/QBwsdG2sJmU'},
        { name:'モチベーションが上がる音楽g',path: 'https://www.youtube.com/embed/8VjWRL8JxLs'},
        { name:'モチベーションが上がる筋トレ動画',path: 'https://www.youtube.com/embed/yPbQ1tpvt3Y'},
        { name:'モチベーションが上がる動画',path: 'https://www.youtube.com/embed/QBwsdG2sJmU'},
        { name:'モチベーションが上がる音楽',path: 'https://www.youtube.com/embed/8VjWRL8JxLs'},
        { name:'モチベーションが上がる筋トレ動画',path: 'https://www.youtube.com/embed/yPbQ1tpvt3Y'},
      ]
    }
  }

}
</script>

<style scoped>
</style>
