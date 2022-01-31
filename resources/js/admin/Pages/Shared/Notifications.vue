<template>
  <transition name="fade" appear>
    <div v-if="state.show" class="absolute w-screen flex justify-end bottom-10 right-10">
      <div class="w-64">
        <div class="bg-green-800 rounded-md border shadow-md">
          <div class="text-white">
            <header class="py-4 px-4 font-bold text-lg">{{ props.flash.message }}</header>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script setup>
import {reactive, defineProps, watch} from 'vue'

const props = defineProps({
  flash: Object({
    message: String,
  }),
})

const state = reactive({
  show: false,
})

watch(() => props, (prev, curr) => {
  state.show = curr.flash?.message !== null
  setTimeout(() => {
    state.show = false
  }, 5000)
}, {
  deep: true,
})
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: all 1s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(30px);
}
</style>
