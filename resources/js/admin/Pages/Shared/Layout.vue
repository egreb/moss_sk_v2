<template>
  <section class="flex flex-col min-h-screen">
    <header class="bg-gray-800 px-4 py-6">
      <h1 class="text-xl text-white font-semibold">
        Moss Schakklub - Dashboard
      </h1>
    </header>
    <section class="grid grid-cols-12 flex-grow">
      <Sidebar />
      <main class="col-span-10">
        <section class="p-4">
          <slot />
        </section>
      </main>
    </section>
  </section>
</template>

<script>
import Sidebar from '../components/Sidebar.vue'

export default {
  name: 'Layout',
  components: { Sidebar },
}
</script>
