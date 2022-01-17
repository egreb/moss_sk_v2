<template>
  <aside class="col-span-1 bg-gray-800">
    <section class="p-4">
      <ul class="flex flex-col space-y-4">
        <NavLink href="">Dashboard</NavLink>
        <NavLink href="/posts">Poster</NavLink>
        <NavLink href="/tournaments">Turneringer</NavLink>
      </ul>
    </section>
  </aside>
</template>

<script>
import NavLink from '../Shared/NavLink'

export default {
  name: 'Sidebar',
  components: {
    NavLink,
  },
}
</script>
