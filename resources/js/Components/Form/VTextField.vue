<template>
  <div>
    <label :for="id">{{ label }}</label>
    <input :id="id" @input="$emit('input', $event.target.value)" :value="value" />
  </div>
</template>

<script>
export default {
  name: 'VTextField',
  props: ['label', 'value'],
  computed: {
    id() {
      return 'input-' + this.label.replace(/\s+/, '-')
    }
  }
}
</script>

<style scoped></style>
