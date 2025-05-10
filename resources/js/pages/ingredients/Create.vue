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
    atc_code: '',
    main_ingredients: '',
    description: '',
});

const submit = () => {
    form.post(route('active_ingredients.store'), {
        onFinish: () => form.reset("atc_code",'main_ingredients','description'),
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
                        <Label for="atc_code">Codice atc</Label>
                    </div>
                    <Input
                        id="atc_code"
                        type="atc_code"
                        required
                        :tabindex="1"
                        v-model="form.atc_code"
                    />
                    <InputError :message="form.errors.atc_code" />
                    <div class="flex items-center justify-between">
                        <Label for="main_ingredients">Ingrediente</Label>
                    </div>
                    <Input
                        id="main_ingredients"
                        type="main_ingredients"
                        required
                        :tabindex="1"
                        v-model="form.main_ingredients"
                    />
                    <InputError :message="form.errors.main_ingredients" />
                    <div class="flex items-center justify-between">
                        <Label for="description">Descrizione</Label>
                    </div>
                    <Input
                        id="description"
                        type="description"
                        required
                        :tabindex="1"
                        v-model="form.description"
                    />
                    <InputError :message="form.errors.description" />
                </div>
                <Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create
                </Button>
            </div>

        </form>
    </AuthBase>
</template>
