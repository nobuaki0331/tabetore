<template>
  <paginate
    class="mt-5 justify-content-center"
    :page-count="pageCount"
    :click-handler="clickCallback"
    :margin-pages="marginPage"
    :prev-text="prevText"
    :next-text="nextText"
    :container-class="'pagination'"
    :page-class="'page-item'"
    :page-link-class="'page-link'"
    :prev-class="'page-item'"
    :prev-link-class="'page-link'"
    :next-class="'page-item'"
    :next-link-class="'page-link'" />
</template>

<script>
import Paginate from 'vuejs-paginate'

export default {
  name: 'pagination',
  components: {
    Paginate,
  },
  props: {
    pageRange: {
      type: String,
      default: '3',
    },
    marginPage: {
      type: String,
      dafault: '1',
    },
    prevText: {
      type: String,
      dafult: 'Prev',
    },
    nextText: {
      type: String,
      dafault: 'Next',
    },
    items: {
      type: Array,
      default: ()=>{[]},
    },
    perPage: {
      type: Number,
      required: true,
    }
  },
  computed: {
    pageCount() {
      return Math.ceil(this.items.length / this.perPage)
    }
  },
  methods: {
    clickCallback(PageNum) {
      // イベント名はjs内に置いて変数やプロパティとして扱われることがない。基本的にはケバブケースを使用する
      this.$emit('click-page', Number(PageNum))
    },
  },
}
</script>
