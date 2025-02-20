<script>
    export default {
        name: 'CgKindObjectsEdit'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgKindObjectForm from '@/Components/CgKindObjects/Form.vue';


const props = defineProps({
    cgKindObject: {
        type: Object,
        required: true
    }
});

const form = useForm({
    object: props.cgKindObject.object,

})
</script>

<template>
    <AppLayout title="Edit Object">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight">
                Editar Tipo de Dispositivo
            </h1>
        </template>

        <div class="py-12">
            <div class="max-vw-7xl mx-auto sm:px:6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <CgKindObjectForm :updating = "true" :form="form" @submit = "form.put(route('cgKindObjects.update', cgKindObject.id))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
