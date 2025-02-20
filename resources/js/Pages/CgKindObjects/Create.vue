<script>
    export default {
        name: 'CgKindObjectsCreate'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgKindObjectForm from '@/Components/CgKindObjects/Form.vue';

const form = useForm({
    object: '',
});
</script>

<template>
    <AppLayout title="Create Object">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight" v-if="$page.props.user.permissions.includes('create objects')">
                Añadir Tipo de Dispositivo
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <!--cgKindObjects.store es la ruta para guardar el recursos -->
                        <CgKindObjectForm :form="form" @submit="form.post(route('cgKindObjects.store'))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
