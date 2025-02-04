<script>
    export default {
        name: 'CgBrandsCreate'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgBrandForm from '@/Components/CgBrands/Form.vue';

const form = useForm({
    brand_name: '',
});
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Añadir Marca
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!--cgBrands.store es la ruta para guardar el recursos -->
                            <CgBrandForm :form="form" @submit="form.post(route('cgBrands.store'))" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
