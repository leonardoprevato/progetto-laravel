<script setup>
import AuthBase from '@/layouts/auth/AuthSimpleLayout.vue'
import { Head } from "@inertiajs/vue3";
defineProps({ data: Object })
</script>
<style>
table{
    font-family: arial,sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td,th{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){
    background-color:#dddddd ;
}
</style>
<template>
    <AuthBase>
        <Head title="Drug"/>
        <tbody>
            <tr>
                <th scope="row">id</th>
                <th scope="row">ATC Code</th>
                <th scope="row">Ingredients</th>
                <th scope="row">Scadenza</th>
                <th scope="row">Prezzo</th>
                <th scope="row">Azienda</th>
                <th scope="row">Principio Attivo</th>
                <th scope="row">Descrizione</th>
            </tr>

            <tr>
                <td>{{ data['id'] }}</td>
                <td>{{ data.name }}</td>
                <td>{{ data.description }}</td>
                <td>{{ data.expiration_date }}</td>
                <td>{{ data.price }}</td>
                <td>{{ data.company.name }}</td>
                <td>{{ data.active_ingredient.main_ingredients }}</td>
                <p>{{ data.description }}</p>
            </tr>
        </tbody>
    </AuthBase>
</template>
