<template>
  <div class="form-group row">
    <label
      class="col-md-1 col-form-label"
      :class="{ 'form-required' : required, 'form-undeline' : requiredLine }"
      :for="name">
      {{ label }}
    </label>
    <div class="col-md-6">
      <input
        :id="name"
        :value="value"
        :disabled="disabled"
        class="form-control"
        :placeholder="placeholder"
        :type="type"
        @input="updateValue ">
    </div>
    <div
      v-if="errors"
      class="invalid-feedback d-block pl-5">
      {{ errors[0] }}
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
    },
    requiredLine: {
      type: Boolean,
      default: false,
    },
    errors: {
      type: Array,
      default: undefined,
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
.form-undeline {
  text-decoration: underline;
  text-decoration-color: red;
}
</style>
