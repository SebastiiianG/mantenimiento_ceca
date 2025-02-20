<script>
    export default {
        name: 'CgKindPeopleEdit'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CgKindPersonForm from '@/Components/CgKindPeople/Form.vue';


const props = defineProps({
    cgKindPerson: {
        type: Object,
        required: true
    }
});

const form = useForm({
    kind_person: props.cgKindPerson.kind_person,

})
</script>

<template>
    <AppLayout title="Edit Person">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight">
                Editar Tipo de Persona
            </h1>
        </template>

        <div class="py-12">
            <div class="max-vw-7xl mx-auto sm:px:6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <CgKindPersonForm :updating = "true" :form="form" @submit = "form.put(route('cgKindPeople.update', cgKindPerson.id))" />
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
