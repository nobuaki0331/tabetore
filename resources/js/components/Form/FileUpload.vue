<template>
  <div class="form-group row">
    <label
      class="col-md-1 col-form-label"
      for="file">
      添付画像
    </label>
    <input
      name="file"
      type="file"
      @change="fileSelected">
  </div>
</template>

<script>
export default {
  name: 'FileUpload',
  methods: {
    fileSelected(e) {
      this.$emit('select-file', e.target.files[0])
    },
  }
}
</script>

<style scoped>
input[type="file"] {
  color: black;
}
.col-form-label {
  color: black;
  text-align: center;
  line-height: 3;
}
@media screen and (max-width:420px){
  input[type="file"] {
    width: 100%;
  }
}
@media screen and (min-width:1000px){
  input[type="file"] {
    padding: 20px 0 0 10px;
  }
}
</style>
