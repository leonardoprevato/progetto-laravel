<script setup>
import AuthBase from '@/layouts/auth/AuthSimpleLayout.vue'
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import SvgIcon from "vue3-icon";
import { faEye,faTrash,faPencil } from "@fortawesome/free-solid-svg-icons";
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
        <Head title="Drugs" />
        <tbody>
            <tr>
                <th scope="row">id</th>
                <th scope="row">ATC Code</th>
                <th scope="row">Ingredients</th>
                <th scope="row">Scadenza</th>
                <th scope="row">Prezzo</th>
                <th scope="row">Azienda</th>
                <th scope="row">Principio Attivo</th>
                <th scope="row">azioni</th>
            </tr>

            <tr v-for="drugs in data">
                <td>{{ drugs['id'] }}</td>
                <td>{{ drugs.name }}</td>
                <td>{{ drugs.description }}</td>
                <td>{{ drugs.expiration_date }}</td>
                <td>{{ drugs.price }}</td>
                <td>{{ drugs.company_id }}</td>
                <td>{{ drugs.active_ingredient_id }}</td>
                <td style="display: inline;">
                    <Link v-if="$page.props.auth.user" :href="'/drug/'+drugs.id" as="button"><SvgIcon :fa-icon="faEye"></SvgIcon></Link>
                    <Link v-if="$page.props.auth.user" :href="'/drug/'+drugs.id+'/edit'" as="button"><SvgIcon :fa-icon="faPencil"></SvgIcon></Link>
                    <Link onclick="return confirm('Sei sicuro?')" v-if="$page.props.auth.user" method="DELETE" :href="'/drug/'+drugs.id" as="button">
                        <SvgIcon :fa-icon="faTrash"></SvgIcon>
                    </Link>
                </td>
                <h2>Descrizione</h2>
                <p>{{ drugs.description }}</p>
            </tr>
        </tbody>
        <Link class="block w-full" :href="route('drug.create')" as="button">Crea</Link>
    </AuthBase>
</template>
