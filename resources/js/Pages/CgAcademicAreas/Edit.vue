<script>
    export default {
        name: 'CgAcademicAreasEdit'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgAcademicAreaForm from '@/Components/CgAcademicAreas/Form.vue';


const props = defineProps({
    cgAcademicArea: {
        type: Object,
        required: true
    },
    cgDependencies: {
        type: Object,
        required: true,
    }
});

const form = useForm({
    area_name: props.cgAcademicArea.area_name,
    cg_dependency_id: props.cgAcademicArea.cg_dependency_id,
})
</script>

<template>
    <AppLayout title="Edit Academic Area">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight">
                Editar Área Académica
            </h1>
        </template>

        <div class="py-12">
            <div class="max-vw-7xl mx-auto sm:px:6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <CgAcademicAreaForm :updating = "true" :form="form" :cgDependencies="cgDependencies" @submit = "form.put(route('cgAcademicAreas.update', cgAcademicArea.id))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
