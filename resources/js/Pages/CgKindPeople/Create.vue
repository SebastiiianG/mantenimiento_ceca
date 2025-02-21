<script>
    export default {
        name: 'CgKindPeopleCreate'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgKindPersonForm from '@/Components/CgKindPeople/Form.vue';

const form = useForm({
    kind_person: '',
});
</script>

<template>
    <AppLayout title="Create Person">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight" v-if="$page.props.user.permissions.includes('create persons')">
                Añadir Tipo de Persona
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <!--cgKindPeople.store es la ruta para guardar el recursos -->
                        <CgKindPersonForm :form="form" @submit="form.post(route('cgKindPeople.store'))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
