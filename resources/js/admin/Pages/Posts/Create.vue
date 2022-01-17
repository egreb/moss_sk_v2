<template>
  <PageHeader>Ny post</PageHeader>
  <form action="" class="max-w-4xl mx-auto space-y-4">
    <div class="flex flex-col">
      <label for="title" class="font-medium pb-2 text-gray-600">Tittel</label>
      <input id="title" v-model="form.title" type="text" name="title" placeholder="Tittel.." class="border rounded-md px-4 py-2" />
      <div v-if="errors.title" class="text-red-500 text-sm mt-1" v-html="errors.title" />
    </div>
    <div class="flex flex-col">
      <label for="ingress" class="font-medium pb-2 text-gray-600">Ingress</label>
      <v-md-editor id="ingress" v-model="form.ingress" left-toolbar="undo redo" type="text" name="ingress" placeholder="Ledetekst.." class="border rounded-md px-4 py-2 h-32" />
      <div v-if="errors.ingress" class="text-red-500 text-sm mt-1" v-html="errors.ingress" />
    </div>
    <div class="flex flex-col">
      <label for="content" class="font-medium pb-2 text-gray-600">Post</label>
      <v-md-editor id="content" v-model="form.content" left-toolbar="undo redo" type="text" name="content" placeholder="Tekst.." class="border rounded-md px-4 py-2 h-64" />
      <div v-if="errors.content" class="text-red-500 text-sm mt-1" v-html="errors.content" />
    </div>
    <div class="flex flex-col">
      <label for="published" class="font-medium pb-2 text-gray-600">Publiser</label>
      <input id="published" v-model="form.published" type="datetime-local" name="published" placeholder="Tekst.." class="border rounded-md px-4 py-2" />
      <div v-if="errors.published" class="text-red-500 text-sm mt-1" v-html="errors.published" />
    </div>
    <div class="flex">
      <button type="submit" class="self-end rounded-sm ml-auto mt-8 bg-blue-400 hover:bg-blue-500 font-medium px-4 py-2 text-white">Lagre</button>
    </div>
  </form>
</template>
<script setup>
import PageHeader from '../Shared/PageHeader'
import {useForm} from '@inertiajs/inertia-vue3'
import {defineProps} from 'vue'

defineProps({
  errors: Object,
})

const form = useForm({
  title: '',
  ingress: '',
  content: '',
  published: new Date(),
})
</script>

