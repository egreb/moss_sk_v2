<template>
    <Link :href="url" class="text-white hover:bg-green-400 px-6 py-4 rounded-md" :class="{'bg-red-500 font-semibold':active}">
        <slot/>
    </Link>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'

export default {
    name: "NavLink",
    props: {
        href: String,
    },
    computed: {
        url() {
            return `/dashboard${this.href}`
        },
        active() {
            const component = this.$page.component.toLowerCase();
            if (component === 'dashboard' && !this.href) return true;
            return this.href.replace('/', '') === component;
        }
    },
    components: {
        Link
    }
}
</script>
