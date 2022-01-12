<template>

  <div>
    <h1> Welcome from component! </h1>
    <button @click="counter++">
      Click me {{ counter }}
    </button>
  </div>
</template>

<script>
export default {
  name: "App",
  data: () => ({
      counter: 0,
  })
}
</script>

<style scoped>

</style>