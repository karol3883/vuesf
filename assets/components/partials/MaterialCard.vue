<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <div class="container">
        <b-navbar-brand href="#">BelKa!</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto">

            <b-navbar-nav>
              <b-nav-item
                  v-for="navElement in navigation"
                  v-bind:key="navElement.id"
                  :href="navElement.url"
              >
                {{ navElement.name }}
              </b-nav-item>
              <b-nav-item href="#">Link</b-nav-item>
              <b-nav-item href="#" disabled>Disabled</b-nav-item>
            </b-navbar-nav>
<!--            <b-nav-form>-->
<!--              <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>-->
<!--              <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>-->
<!--            </b-nav-form>-->

<!--            <b-nav-item-dropdown text="Lang" right>-->
<!--              <b-dropdown-item href="#">EN</b-dropdown-item>-->
<!--              <b-dropdown-item href="#">ES</b-dropdown-item>-->
<!--              <b-dropdown-item href="#">RU</b-dropdown-item>-->
<!--              <b-dropdown-item href="#">FA</b-dropdown-item>-->
<!--            </b-nav-item-dropdown>-->

<!--            <b-nav-item-dropdown right>-->
<!--              &lt;!&ndash; Using 'button-content' slot &ndash;&gt;-->
<!--              <template #button-content>-->
<!--                <em>User</em>-->
<!--              </template>-->
<!--              <b-dropdown-item href="#">Profile</b-dropdown-item>-->
<!--              <b-dropdown-item href="#">Sign Out</b-dropdown-item>-->
<!--            </b-nav-item-dropdown>-->
          </b-navbar-nav>
        </b-collapse>
      </div>
    </b-navbar>

<!--    <pre>-->
<!--      {{ navigation }}-->
<!--    </pre>-->
  </div>
</template>

<script>
export default {

  props: ['navigation'],

  data: () => ({

  })
}
</script>

<style scoped>

</style>