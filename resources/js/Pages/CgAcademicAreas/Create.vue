<script>
    export default {
        name: 'CgAcademicAreasCreate'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgAcademicAreaForm from '@/Components/CgAcademicAreas/Form.vue';

defineProps({
    cgDependencies: {
        type: Object,
        required: true,
    }
});
const form = useForm({
    area_name: '',
    cg_dependency_id: '',
});
</script>

<template>
    <AppLayout title="Create Academic Area">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight" v-if="$page.props.user.permissions.includes('create academic areas')">
                Añadir Área Académica
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <!--cgAcademicAreas.store es la ruta para guardar el recursos -->
                        <CgAcademicAreaForm :form="form" :cgDependencies="cgDependencies" @submit="form.post(route('cgAcademicAreas.store'))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
