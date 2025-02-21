<script>
export default {
    name: "UserEdit"
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import UserForm from '@/Components/Users/Form.vue';

const props = defineProps({
    users: {
        type: Object,
        required: true
    },
    role: {
        type: Object, //rol actual del usuario
        required: true
    },
});

const form = useForm({
    name: props.users.name,
    email: props.users.email,
    password: props.users.password,
    user_number: props.users.user_number,
    status: props.users.status,
    role: props.role[0] , //rol actual del usuario
})

</script>

<template>

<AppLayout title="Editar Usuario">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight">
                Editar Usuario
            </h1>
        </template>

        <div class="py-12">
            <div class="max-vw-7xl mx-auto sm:px:6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="p-6 bg-cremaUAEH border-b border-gray-200">
                        <UserForm :updating = "true" :form="form" :role="role" @submit= "form.put(route('users.update', users.id))"/>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>

</template>
