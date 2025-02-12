<script>
    export default {
        name: 'CgBrandsEdit'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgBrandForm from '@/Components/CgBrands/Form.vue';


const props = defineProps({
    cgBrand: {
        type: Object,
        required: true
    }
});

const form = useForm({
    brand_name: props.cgBrand.brand_name,

})
</script>

<template>
    <AppLayout title="Edit Brand">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight">
                Editar Marca
            </h1>
        </template>

        <div class="py-12">
            <div class="max-vw-7xl mx-auto sm:px:6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-whiteUAEH border-b border-gray-200">
                        <CgBrandForm :updating = "true" :form="form" @submit = "form.put(route('cgBrands.update', cgBrand.id))" />
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
