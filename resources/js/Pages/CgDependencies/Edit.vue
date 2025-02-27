<script>
    export default {
        name: 'CgDependenciesEdit'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgDependencyForm from '@/Components/CgDependencies/Form.vue';


const props = defineProps({
    cgDependency: {
        type: Object,
        required: true
    }
});

const form = useForm({
    dependency_name: props.cgDependency.dependency_name,

})
</script>

<template>
    <AppLayout title="Edit Dependency">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight">
                Editar Dependencia Universitaria
            </h1>
        </template>

        <div class="py-12">
            <div class="max-vw-7xl mx-auto sm:px:6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <CgDependencyForm :updating = "true" :form="form" @submit = "form.put(route('cgDependencies.update', cgDependency.id))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
