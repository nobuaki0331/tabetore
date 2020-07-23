<template>
  <div class="form-group row">
    <label
      class="col-1 col-form-label"
      :class="{ 'form-required' : required }"
      :for="name">
      {{ label }}
    </label>

    <div class="col-6">
      <input
        :id="name"
        :value="value"
        :disabled="disabled"
        class="form-control"
        :placeholder="placeholder"
        :type="type"
        @input="updateValue "/>
    </div>
  </div>
</template>

<script>

export default {
  name: 'InputText',

  props: {
    value: {
      type: [String, Number],
      required: true,
    },

    name: {
      type: String,
      required: true,
    },

    label: {
      type: String,
      required: true,
    },

    disabled: {
      type: Boolean,
      default: false,
    },

    required: {
      type: Boolean,
      default: false,
    },

    type: {
      type: String,
      default: null,
    },

    placeholder: {
      type: String,
      default: null,
    }
  },

  methods: {
    updateValue(e){
      this.$emit('input', e.target.value)
    }
  }
}

</script>

<style scoped>
.col-form-label {
  color: black;
  text-align: center;
  line-height: 3;
}
</style>
