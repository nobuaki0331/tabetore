<template>
  <div>
    <slot :data="$data" />
  </div>
</template>

<script>
export default {
  name: 'Sam',
  data() {
    return {
      title1: '商品の口コミを投稿する',
      title2: '新着商品',
      title3: '口コミ一覧',
      title4: 'お気に入りMOVIE',
    }
  }
}
</script>
