<script>
export default {
    name: 'UserIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

/* Se definen las propiedades que nos envia el controllador 'userController'  */

defineProps({
    users: {
        type: Object,
        required: true
    }
})

const deleteUser = id => {
    if (confirm ('Estas seguro?')) {
        Inertia.delete(route('users.destroy', id))
    }
}

</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuarios
            </h1>
        </template>

    <div class="pt-12 pb-6 bg-gray-100 ">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Bienvenido al tablero del administrador
                </div>
            </div>
        </div>
    </div>

    <div class="py-2 bg-gray-100 ">
        <!-- contenedor que ocupa toda la pantalla -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <!-- contenedor que ocupa una parte de todo la pantalla -->
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- contenedor que agrega padding sobre los elementos que van dentro de el -->
                <div class="flex justify-between ">
                    <!-- contenedor con los elementos -->
                    <h1>Usuarios</h1>
                    <Link class="text-white bg-[#511013] py-2 px-4 rounded" :href="route('users.create')">
                        Añadir Usuario

                    <!-- Para imprimir los datos que tiene las propiedades definidas
                    {{ categories.data }} -->
                    </Link>
                </div>
                <p class="mt-4">Lista de los usuarios existentes</p>

                <div class="mt-4">
                    <ul role="list" class="divide-y divide-gray-100">
                        <li class="flex justify-between gap-x-6 py-5" v-for="user in users.data">

                            <div class="flex min-w-0 gap-x-4">

                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm/6 font-semibold text-gray-900">{{ user.name }}</p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <Link class="text-sm/6 text-gray-900" :href="route('users.edit', user.id)">Edit</Link>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <Link @click="deleteUser(user.id)" class="text-sm/6 text-gray-900"
                                >Delete</Link>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm/6 text-gray-900">
                                    <Link :href="route('users.update', user.id)"> Update
                                    </Link>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </AppLayout>

</template>
