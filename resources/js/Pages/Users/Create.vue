<script>
        export default {
            name: 'UsersCreate'
        }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import UserForm from '@/Components/Users/Form.vue';

const form = useForm ({
    name: '' ,
    email: '',
    password: '',
    user_number: '',
    status: '',
    role: ''
});

</script>

<template>
    <AppLayout title="Crear Usuario">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight" v-if="$page.props.user.permissions.includes('create users')">
                Crear Usuario
            </h1>
        </template>

        <!-- Formulario para crear usuario -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-hidden shadow-xl sm_rounded-lg">
                        <div class="p-6 bg-cremaUAEH border-b border-gray-200">
                            <UserForm :form="form" @submit="form.post(route('users.store'))" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AppLayout>
</template>
