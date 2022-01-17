<template>
  <h1 class="text-4xl">Hello world</h1>

  <h2>Posts</h2>
  <ul>
    <li v-for="post in posts" :key="post.id">
      {{ post.title }}
    </li>
  </ul>
</template>

<script>
export default {
  name: 'Dashboard',
  props: {
    posts: Object,
    schedules: Object,
  },
}
</script>
