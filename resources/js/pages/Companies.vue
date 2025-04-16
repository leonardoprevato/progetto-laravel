<script setup>
import AuthBase from '@/layouts/auth/AuthSimpleLayout.vue'
import { Head } from "@inertiajs/vue3";


defineProps({ data: Object })
</script>

<template>
    <AuthBase>

        <Head title="Companies" />
        <h1>Ciao</h1>

        <tbody>
            <tr>
                <th scope="row">id</th>
                <th scope="row">nome</th>
            </tr>

            <tr v-for="company in data">
                <td>{{ company['id'] }}</td>
                <td>{{ company.name }}</td>
            </tr>
        </tbody>
    </AuthBase>
</template>
