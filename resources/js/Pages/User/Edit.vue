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
    user: {
        type: Object,
        required: true
    }
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: props.user.password,
    user_number: props.user.user_number,
    state: props.user.state
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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-whiteUAEH border-b border-gray-200">
                        <UserForm :updating = "true" :form="form" @submit = "form.put(route('users.update', props.user.id))" />
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>

</template>
