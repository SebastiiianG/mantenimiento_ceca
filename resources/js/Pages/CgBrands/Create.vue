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
    <AppLayout title="Create Brand">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight" v-if="$page.props.user.permissions.includes('create brands')">
                Añadir Marca
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <!--cgBrands.store es la ruta para guardar el recursos -->
                        <CgBrandForm :form="form" @submit="form.post(route('cgBrands.store'))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
