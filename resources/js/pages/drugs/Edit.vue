<script setup lang="ts">
import InputError from '@/components/InputError.vue';
//import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
//import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';


const props= defineProps<{
    data:   {
        id: string;
        company_id:number,
        active_ingredient_id:number,
        codice_minsan:string;
        name: string;
        description:string;
        expiration_date:number;
        price:number;},
    companies:Array<object>,
    ingredients:Array<object>
}>();

const form = useForm({
    codice_minsan: props.data['codice_minsan'] || '',
    company_id: props.data['company_id'] || '',
    active_ingredient_id: props.data['active_ingredient_id'] || '',
    name: props.data['name'] || '',
    description: props.data['description'] || '',
    expiration_date: props.data['expiration_date'] || '',
    price: props.data['price'] || '',
});

const submit = () => {
    form.put(route('drug.update',props.data.id), {
        onFinish: () => form.reset("codice_minsan",'name','description','expiration_date','price'),
    });
};
</script>

<template>
    <AuthBase title="Modifica Farmaco" >
        <Head title="Modifica Farmaco" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="company_id">Company ID</Label>
                    </div>
                    <select name="company_id" id="company_id" v-model="form.company_id">
                        <option v-for="item in props.companies" :value="item['id']">{{ item['name'] }}</option>
                    </select>
                    <div class="flex items-center justify-between">
                        <Label for="ingredients">Active Ingredients</Label>
                    </div>
                    <select name="ingredients" id="ingredients" v-model="form.active_ingredient_id">
                        <option v-for="item in props.ingredients" :value="item['id']">{{ item['main_ingredients'] }}</option>
                    </select>
                </div>

                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="codice_minsan">Codice Minsan</Label>
                    </div>
                    <Input
                        id="codice_minsan"
                        type="text"
                        required
                        :tabindex="1"
                        v-model="form.codice_minsan"
                        placeholder="Codice Minsan"
                    />
                    <InputError :message="form.errors.codice_minsan" />
                    <div class="flex items-center justify-between">
                        <Label for="name">Name</Label>
                    </div>
                    <Input
                        id="name"
                        type="text"
                        required
                        :tabindex="1"
                        v-model="form.name"
                        placeholder="Nome"
                    />
                    <InputError :message="form.errors.name" />
                    <div class="flex items-center justify-between">
                        <Label for="main_ingredients">Descrizione</Label>
                    </div>
                    <Input
                        id="description"
                        type="description"
                        required
                        :tabindex="1"
                        v-model="form.description"
                        placeholder="Descrizione"
                    />
                    <InputError :message="form.errors.description" />
                    <div class="flex items-center justify-between">
                        <Label for="expiration_date">Scadenza</Label>
                    </div>
                    <Input
                        id="expiration_date"
                        type="date"
                        required
                        :tabindex="1"
                        v-model="form.expiration_date"
                        placeholder="Scadenza"
                    />
                    <InputError :message="form.errors.expiration_date" />
                    <div class="flex items-center justify-between">
                        <Label for="price">Prezzo</Label>
                    </div>
                    <Input
                        id="price"
                        type="number"
                        step=".01"
                        required
                        :tabindex="1"
                        v-model="form.price"
                        placeholder="Prezzo"
                    />
                    <InputError :message="form.errors.price" />
                </div>
                <Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create
                </Button>
            </div>

        </form>
    </AuthBase>
</template>