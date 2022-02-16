<template>
    <PageHeader>{{ title }}</PageHeader>
    <form class="max-w-4xl mx-auto space-y-4" @submit.prevent="submit">
        <FormGroup>
            <label for="title" class="font-medium pb-2 text-gray-600">Bilde</label>
            <figure v-if="state.image && state.image.url" class="grid place-items-center py-4">
                <img
                    v-if="state.image && state.image.url"
                    :key="state.image.id"
                    class="w-64 h-64 rounded-lg"
                    :src="state.image.url"
                    :alt="state.image.id"
                    @error="console.error"
                />
            </figure>

            <file-pond
                ref="pond"
                name="image"
                :label-idle="state.image && state.image.url ? 'Oppdater bilde' : 'Legg til bilde'"
                accepted-file-types="image/*"
                max-file-size="5mb"
                :required="false"
                @processfile="handleImage"
            />
        </FormGroup>

        <FormGroup>
            <label for="title" class="font-medium pb-2 text-gray-600">Tittel</label>
            <input
                id="title"
                v-model="form.title"
                type="text"
                name="title"
                placeholder="Tittel.."
                class="border rounded-md px-4 py-2"
            />
            <div v-if="errors.title" class="text-red-500 text-sm mt-1" v-html="errors.title" />
        </FormGroup>
        <FormGroup>
            <label for="ingress" class="font-medium pb-2 text-gray-600">Ingress</label>
            <v-md-editor
                id="ingress"
                v-model="form.ingress"
                left-toolbar="undo redo"
                type="text"
                name="ingress"
                placeholder="Ledetekst.."
                class="border rounded-md px-4 py-2 h-32"
            />
            <div v-if="errors.ingress" class="text-red-500 text-sm mt-1" v-html="errors.ingress" />
        </FormGroup>
        <FormGroup>
            <label for="story" class="font-medium pb-2 text-gray-600">Post</label>
            <v-md-editor
                id="story"
                v-model="form.story"
                left-toolbar="undo redo"
                type="text"
                name="story"
                placeholder="Tekst.."
                class="border rounded-md px-4 py-2 h-64"
            />
            <div v-if="errors.story" class="text-red-500 text-sm mt-1" v-html="errors.story" />
        </FormGroup>
        <div class="flex gap-x-1">
            <FormGroup class="w-6/12">
                <label for="published_at" class="font-medium pb-2 text-gray-600">Publiser</label>
                <input
                    id="published_at"
                    v-model="form.published_at"
                    type="datetime-local"
                    name="published_at"
                    placeholder="Tekst.."
                    class="border rounded-md px-4 py-2"
                />
                <div
                    v-if="errors.published_at"
                    class="text-red-500 text-sm mt-1"
                    v-html="errors.published_at"
                />
            </FormGroup>
            <FormGroup class="w-6/12 flex justify-center">
                <div class="flex gap-x-2 items-center pl-4 pt-6">
                    <input
                        id="publish"
                        v-model="form.publish"
                        type="checkbox"
                        name="publish"
                        class="border rounded-md px-4 py-2"
                    />
                    <label for="publish" class="font-medium text-gray-600">Publiser</label>
                </div>
                <div
                    v-if="errors.publish"
                    class="text-red-500 text-sm mt-1"
                    v-html="errors.publish"
                />
            </FormGroup>
        </div>
        <div class="flex">
            <button
                type="submit"
                class="self-end rounded-sm ml-auto mt-8 bg-blue-400 hover:bg-blue-500 font-medium px-4 py-2 text-white"
            >Lagre</button>
        </div>
    </form>
</template>
<script setup>
import PageHeader from "../PageHeader";
import FormGroup from "../FormGroup";
import { defineProps } from "vue";
import vueFilePond, { setOptions } from "vue-filepond";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import { usePost } from '../../hooks/usePost'
import "filepond/dist/filepond.min.css";

setOptions({
    server: {
        process: {
            url: "/dashboard/image",
            headers: {
                "X-CSRF-TOKEN": document.head.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        },
    },
});
const FilePond = vueFilePond(FilePondPluginFileValidateType);

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    postUrl: {
        type: String,
        required: true,
    },
    image: Object,
    post: Object,
    errors: Object,
});

const { submit, handleImage, form, state } = usePost(props)
</script>
