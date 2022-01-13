<template>
  <div>
    <h1> Welcome from component!!!!!!!!!!!1 </h1>
    <button @click="counter++; test()">
      Click me {{ counter }}
    </button>
    <b-button>
      XDXDXD W T F
    </b-button>

    <h1> {{ awdgb }}</h1>
    <div v-for="element in navigation">
        <h1> {{ element.name }}</h1>
    </div>
  </div>
</template>

<script>
export default {

  props: ['navigation'],
  data: () => ({
      counter: 0,
      navigation: [],
      awdgb: 0,
  }),
  methods: {
    test() {
      console.log(this);

      const selfasd = this;
      axios.get('/getNavbarElements asdadads')
          .then((response) => {
            self.navigation = response.data;
          });
    }
  },
  beforeMount() {
    // console.log(this);
    this.test();
  }
}
</script>

<style scoped>

</style>