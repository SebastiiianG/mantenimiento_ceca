<script>
    export default {
        name: 'CgKindFailuresCreate'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgKindFailureForm from '@/Components/CgKindFailures/Form.vue';

const form = useForm({
    failure: '',
});
</script>

<template>
    <AppLayout title="Create ">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight" v-if="$page.props.user.permissions.includes('create failures')">
                Añadir tipo de Falla
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!--cgKindFailures.store es la ruta para guardar el recursos -->
                            <CgKindFailureForm :form="form" @submit="form.post(route('cgKindFailures.store'))" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
