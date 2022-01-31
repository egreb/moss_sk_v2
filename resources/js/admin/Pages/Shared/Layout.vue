<template>
  <section class="flex flex-col min-h-screen relative">
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
    <Modal />
    <Notifications :flash="$page.props.flash" />
  </section>
</template>

<script setup>
import Sidebar from '../components/Sidebar.vue'
import Modal from '../Shared/Modal.vue'
import Notifications from '../Shared/Notifications'
</script>
