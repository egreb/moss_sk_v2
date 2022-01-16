<template>
    <section class="flex flex-col min-h-screen">
        <header class="bg-gray-800 p-4">
            <h1 class="text-2xl text-white font-medium font-semibold">Moss Schakklub - Dashboard</h1>
        </header>
        <section class="grid grid-cols-5 flex-grow">
            <Sidebar />
            <main class="col-span-4">
                <section class="p-4">
                    <slot/>
                </section>
            </main>
        </section>
    </section>
</template>

<script>
import NavLink from "./NavLink";
import Sidebar from '../components/Sidebar.vue';

export default {
    name: "Layout",
    components: {Sidebar, NavLink}
}
</script>

<style scoped>

</style>
