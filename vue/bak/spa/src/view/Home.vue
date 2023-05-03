<template>
  <div>
    <h1>{{ router }} - {{ msg }}</h1>
  </div>
</template>

<script>
export default {
  name: 'Home',
  data () {
    return {
      router: '라우터',
      msg: 'Home'
    }
  }
}
</script>
