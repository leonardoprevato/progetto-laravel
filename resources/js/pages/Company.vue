<script setup>
import AuthBase from '@/layouts/auth/AuthSimpleLayout.vue'
import { Head } from "@inertiajs/vue3";
defineProps({ data: Object })
</script>

<template>
    <AuthBase>
        <Head title="Company"/>
            <p>{{ data }}</p>      
    </AuthBase>
</template>
