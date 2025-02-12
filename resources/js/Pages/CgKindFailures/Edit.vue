<script>
    export default {
        name: 'CgKindFailuresEdit'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgKindFailureForm from '@/Components/CgKindFailures/Form.vue';


const props = defineProps({
    cgKindFailure: {
        type: Object,
        required: true
    }
});

const form = useForm({
    failure: props.cgKindFailure.failure,

})
</script>

<template>
    <AppLayout title="Edit Failure">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight">
                Editar Tipo de Falla
            </h1>
        </template>

        <div class="py-12">
            <div class="max-vw-7xl mx-auto sm:px:6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-whiteUAEH border-b border-gray-200">
                        <CgKindFailureForm :updating = "true" :form="form" @submit = "form.put(route('cgKindFailures.update', cgKindFailure.id))" />
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
