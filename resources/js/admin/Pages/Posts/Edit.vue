<template>
    <Form
        :title="`Rediger ${post.title}`"
        :post-url="`/dashboard/posts/${post.id}/update`"
        v-bind="$props"
    />
</template>
<script setup>
import { defineProps } from "vue";
import Form from "../Shared/forms/PostForm.vue";

defineProps({
    post: Object,
    image: Object,
    errors: Object,
});
</script>
