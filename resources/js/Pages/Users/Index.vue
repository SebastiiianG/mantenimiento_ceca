<script>
export default {
    name: 'UserIndex'
}
</script>

<script setup>
import { router, usePage } from '@inertiajs/vue3';
import { computed, ref, watch, watchEffect } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import MagnifyingGlass from '@/Components/MagnifyingGlass.vue';
import Swal from 'sweetalert2';

const page = usePage();

const succesMessage = computed(() => page.props.flash?.success);

watchEffect(() => {
    if (succesMessage.value) {
        Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: succesMessage.value,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#14803c',
        }).then(() => {
            page.props.flash.success = null;
        });
    }
});
/* Se definen las propiedades que nos envia el controllador 'userController'  */
const props = defineProps({
    users: Object,
    search: String
});

const searchQuery = ref(props.search || '');

watch(searchQuery, (newSearch) => {
    router.get(route('users.index'), { search: newSearch }, { preserveState: true, replace: true });
});


const deleteUser = (user) => {
    /* if (confirm(`¿Estás seguro de que deseas eliminar el usuario "${user.name}"?`)) {
        router.delete(route('users.destroy', user.id))
    } */

    Swal.fire({
        title: "¿Estas seguro?",
        text: "Se eliminara el usuario  '" + user.name + "'",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#14803c",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, estoy seguro",
        cancelButtonText: "Cancelar",
        }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('users.destroy', user.id))
            Swal.fire({
                title: "Eliminado",
                text: "El usuario ha sido eliminado con éxito",
                icon: "success",
                confirmButtonColor: "#14803c",
            });
        } else {
            Swal.fire({
                title: "Error",
                text: "No se pudo eliminar el usuario",
                icon: "error",
            })
        }
    });
};

</script>

<template>
    <AppLayout title="Usuarios">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight sm:pl-4">
                Catálogo de Usuarios
            </h1>
        </template>

        <div class="py-10 bg-cremaUAEH md:rounded-lg mt-3">
            <!-- contenedor que ocupa toda la pantalla -->
            <div class="max-w-7xl mx-auto">
                <!-- contenedor que ocupa una parte de todo la pantalla -->
                <div class="px-4 sm:px-4 lg:px-8 ">
                    <!-- contenedor que agrega padding sobre los elementos que van dentro de el -->
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Usuarios</h1>
                            <p class="mt-2 text-sm text-gray-700 ">
                                Personal registrado en el sistema
                            </p>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            <Link v-if="$page.props.user.permissions.includes('create users')"
                                class="inline-flex items-center px-4 py-2 bg-rojoMedioUAEH rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rojoOscuroUAEH focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2  focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                                :href="route('users.create')">
                            Añadir Usuario
                            </Link>
                        </div>
                    </div>

                    <div class="flex flex-col justify-between sm:flex-row mt-6">
                        <div class="relative text-sm text-gray-800 col-span-3">
                            <div
                                class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                                <MagnifyingGlass/>
                            </div>

                            <!-- Input de busqueda -->
                            <input v-model="searchQuery" type="text" autocomplete="off" placeholder="Buscar usuario"
                                id="search"
                                class="block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-grisUAEH placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amarilloUAEH sm:text-sm sm:leading-6" />
                        </div>
                    </div>
                    <!-- tabla -->
                    <div class="mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray- ">
                            <thead class="bg-rojoMedioUAEH">
                                <tr>
                                    <th class="py-4 px-2 text-center text-sm font-semibold text-white">
                                        Nombre
                                    </th>
                                    <th class="py-3 px-2 text-center text-sm font-semibold text-white">
                                        Num. Empleado
                                    </th>
                                    <th class="py-3 px-2 text-center text-sm font-semibold text-white">
                                        Estado
                                    </th>
                                    <th class="py-3 px-2 text-center text-sm font-semibold text-white">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="user in users.data " :key="user.id">
                                    <td class="
                                    tex-wrap
                                    break-words
                                    py-4 px-4 text-center
                                    text-gray-900 ">
                                        {{ user.name }}
                                    </td>
                                    <td class="py-4 px-4 text-center text-gray-900">
                                        {{ user.user_number }}
                                    </td>
                                    <td class="py-4px-2
                                    sm:px-4
                                    text-center text-gray-900">
                                        <p v-if="user.status===1">Activo</p>
                                        <p v-if="user.status==0">Inactivo</p>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <Link :href="route('users.edit', user.id)"
                                            class="text-naranjaUAEH hover:underline mx-2"
                                            v-if="$page.props.user.permissions.includes('update users')">
                                        Editar</Link>

                                        <button @click.prevent="$event=>deleteUser(user)" class="text-rojoUAEH hover:underline mx-2"
                                            v-if="$page.props.user.permissions.includes('delete users')">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-4 flex justify-center space-x-2">
                        <template v-for="link in users.links" :key="link.label">
                            <Link v-if="link.url" :href="link.url" class="px-3 py-2 border rounded border-amarilloUAEH"
                                :class="{ 'font-bold': link.active }" v-html="link.label">
                            </Link>
                            <span v-else class="px-3 py-2 border rounded text-gray-400 border-amarilloUAEH"
                                v-html="link.label"></span>
                        </template>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
