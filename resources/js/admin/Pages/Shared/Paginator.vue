<template>
  <div>
    <Component
      :is="link.url ? 'Link' : 'span'" v-for="link in links.links" :key="link.label" :href="link.url"
      class="px-4 hover:cursor-pointer"
      :class="{'text-gray-400 pointer-events-none': (! link.url), 'text-blue-500': link.active, 'hover:text-blue-500': !link.active}"
      v-html="link.label"
    />
  </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'
export default {
  name: 'Paginator',
  components: {
    Link,
  },
  props: {
    links: Object,
  },
}
</script>
