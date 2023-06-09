<template>
  <div class="home">
    <h1>This is an {{pageName}} page</h1>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from "@/components/HelloWorld.vue";

export default {
  name: "HomeView",
  components: {
    HelloWorld,
  },
  setup() {
    const pageName = 'Home';

    return {
      pageName
    }
  }
};
</script>
