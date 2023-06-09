<template>
  <div class="about">
    <h1>This is an {{pageName}} page</h1>
  </div>
</template>

<script>
export default {
  setup() {
    const pageName = 'About';

    return {
      pageName
    }
  }
}
</script>