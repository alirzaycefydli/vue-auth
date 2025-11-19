<script setup>
import {computed, ref} from 'vue'
import { Head } from '@inertiajs/vue3'


const breadcrumbs = ref([
    {
        title: 'Home',
        href: '/dashboard',
    },
])

const pageTitle = computed(() => {
    return breadcrumbs.value.length
        ? breadcrumbs.value[breadcrumbs.value.length - 1].title
        : 'Laravel Auth'   // Default title
})

</script>

<template>
    <Head :title="pageTitle"/>
    <h1>Home Page</h1>
</template>

<style scoped>

</style>
