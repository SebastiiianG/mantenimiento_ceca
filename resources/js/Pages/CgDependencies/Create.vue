<script>
    export default {
        name: 'CgDependenciesCreate'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgDependencyForm from '@/Components/CgDependencies/Form.vue';

const form = useForm({
    dependency_name: '',
});
</script>

<template>
    <AppLayout title="Create Dependency">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight" v-if="$page.props.user.permissions.includes('create dependencies')">
                Añadir Dependencia
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <!--cgDependencies.store es la ruta para guardar el recursos -->
                        <CgDependencyForm :form="form" @submit="form.post(route('cgDependencies.store'))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
