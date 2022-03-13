<template>
    <div class="flex items-center pb-4">
        <PageHeader>Poster</PageHeader>
        <Link
            href="/dashboard/posts/create"
            class="text-sm ml-4 px-4 py-2 bg-blue-400 text-white hover:bg-blue-500 rounded-md"
            >Ny post</Link
        >
    </div>
    <div class="flex flex-col overflow-x-hidden">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
                class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
            >
                <div class="shadow overflow-hidden border-b border-gray-200">
                    <Table>
                        <TableHead>
                            <tr>
                                <TableHeader>Tittel</TableHeader>
                                <TableHeader>Publisert</TableHeader>
                                <TableHeader>Opprettet</TableHeader>
                                <TableHeader></TableHeader>
                            </tr>
                        </TableHead>
                        <TBody>
                            <tr v-for="post in posts.data" :key="post.id">
                                <TableColumn>
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img
                                                v-if="post.image"
                                                class="h-10 w-10 rounded-full"
                                                :src="post.image"
                                                alt
                                            />
                                        </div>
                                        <div class="ml-4">
                                            <a
                                                :href="`/dashboard/posts/${post.id}/edit`"
                                                class="text-sm font-medium text-blue-500 hover:text-blue-400"
                                                >{{ post.title }}</a
                                            >
                                            <div class="text-sm text-gray-500">
                                                Publisert av
                                                {{ post.by.join(', ') }}
                                            </div>
                                        </div>
                                    </div>
                                </TableColumn>
                                <TableColumn
                                    >{{ post.published ? 'Publisert' : 'Draft' }}</TableColumn
                                >
                                <TableColumn>{{ post.created_at }}</TableColumn>
                                <TableColumn
                                    class="text-right text-sm font-medium"
                                >
                                    <div
                                        class="flex space-x-8 items-center justify-end"
                                    >
                                        <Link
                                            :href="`/dashboard/posts/${post.id}/edit`"
                                            class="text-indigo-600 hover:text-indigo-900"
                                            >Edit</Link
                                        >
                                        <button
                                            class="text-red-600 hover:text-red-900"
                                            @click="deletePost(post.id, post.title)"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </TableColumn>
                            </tr>
                        </TBody>
                    </Table>
                </div>
            </div>
        </div>
    </div>
    <Paginator class="mt-6 flex justify-center" :links="posts" />
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import Paginator from './Shared/Paginator'
import PageHeader from './Shared/PageHeader'
import Table from './Shared/Table/Table'
import TableHead from './Shared/Table/TableHead'
import TableHeader from './Shared/Table/TableHeader'
import TBody from './Shared/Table/TableBody'
import TableColumn from './Shared/Table/TableColumn'
import { useModal } from './stores/modal'
import { defineProps } from 'vue'
import { Inertia } from '@inertiajs/inertia'

defineProps({
  posts: Object,
  schedules: Object,
})
const modal = useModal()

const deletePost = (id, title) => {
  modal.toggle({
    heading: 'Slette?',
    message: `Slette ${title}?`,
    confirm: true,
    callback: () => {
      Inertia.delete('/dashboard/posts/' + id)
    },
  })
}
</script>
