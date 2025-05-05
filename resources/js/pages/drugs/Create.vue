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

const form = useForm({
    codice_minsan: '',
    name:  '',
    description:  '',
    expiration_date:  '',
    price: '',
});

const submit = () => {
    form.post(route('active_ingredients.store'), {
        onFinish: () => form.reset("codice_minsan",'name','description','expiration_date','price'),
    });
};
</script>

<template>
    <AuthBase title="Crea una nuovo Ingrediente" >
        <Head title="Crea una nuovo Ingrediente" />

      

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                </div>

                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="main_ingredients">Ingrediente</Label>
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
                        <Label for="main_ingredients">Codice ATC</Label>
                    </div>
                    <Input
                        id="name"
                        type="name"
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
                        <Label for="main_ingredients">Descrizione</Label>
                    </div>
                    <Input
                        id="expiration_date"
                        type="number"
                        required
                        :tabindex="1"
                        v-model="form.expiration_date"
                        placeholder="Descrizione"
                    />
                    <InputError :message="form.errors.expiration_date" />
                    <div class="flex items-center justify-between">
                        <Label for="main_ingredients">Descrizione</Label>
                    </div>
                    <Input
                        id="price"
                        type="number"
                        required
                        :tabindex="1"
                        v-model="form.price"
                        placeholder="Descrizione"
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
