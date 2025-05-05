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
        <Head title="Companies" />
        <tbody>
            <tr>
                <th scope="row">id</th>
                <th scope="row">nome</th>
                <th scope="row">azioni</th>
            </tr>

            <tr v-for="company in data">
                <td>{{ company['id'] }}</td>
                <td>{{ company.name }}</td>
                <td style="display: inline;">
                    <Link v-if="$page.props.auth.user" :href="'/company/'+company.id" as="button"><SvgIcon :fa-icon="faEye"></SvgIcon></Link>
                    <Link v-if="$page.props.auth.user" :href="'/company/'+company.id+'/edit'" as="button"><SvgIcon :fa-icon="faPencil"></SvgIcon></Link>
                    <Link onclick="return confirm('Sei sicuro?')" v-if="$page.props.auth.user" method="DELETE" :href="'/company/'+company.id" as="button">
                        <SvgIcon :fa-icon="faTrash"></SvgIcon>
                    </Link>
                </td>
            </tr>
        </tbody>
        <Link class="block w-full" :href="route('company.create')" as="button">Crea</Link>
        <!-- <Link class="block w-full" :href="route('company.create')" as="button">Crea un nuovo</Link> -->
    </AuthBase>
</template>
