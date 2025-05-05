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
        atc_code:string;
        main_ingredients: string;
        description:string;
    };
}>();

const form = useForm({
    main_ingredients: props.data['main_ingredients'] || '',
    atc_code: props.data['atc_code'] || '',
    description: props.data['description'] || '',
});

const submit = () => {
    form.put(route('active_ingredients.update',props.data.id), {
        onFinish: () => form.reset("main_ingredients",'atc_code','description'),
    });
};
</script>

<template>
    <AuthBase title="Modifica Ingrediente" >
        <Head title="Modifica Ingerdiente" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                </div>

                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="main_ingredients">Ingrediente</Label>
                    </div>
                    <Input
                        id="main_ingredients"
                        type="main_ingredients"
                        required
                        :tabindex="1"
                        v-model="form.main_ingredients"
                        placeholder="Principio Attivo"
                    />
                    <InputError :message="form.errors.main_ingredients" />
                    <div class="flex items-center justify-between">
                        <Label for="main_ingredients">Codice ATC</Label>
                    </div>
                    <Input
                        id="atc_code"
                        type="atc_code"
                        required
                        :tabindex="1"
                        v-model="form.atc_code"
                        placeholder="Codice ATC"
                    />
                    <InputError :message="form.errors.atc_code" />
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
                </div>
                <Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create
                </Button>
            </div>

        </form>
    </AuthBase>
</template>