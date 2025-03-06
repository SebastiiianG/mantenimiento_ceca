<script>
export default {
    name: 'CgKindObjectsIndex'
}

</script>
<script setup>
import { computed, ref, watch, watchEffect } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import MagnifyingGlass from '@/Components/MagnifyingGlass.vue';
import Swal from 'sweetalert2';
// Recibe los datos desde Laravel
const props = defineProps({
    cgKindObjects: Object,
    search: String
});

// Variable reactiva para la búsqueda (inicializa con el valor de Laravel)
const searchQuery = ref(props.search || '');

// Detectar cambios en la búsqueda y actualizar los resultados en tiempo real
watch(searchQuery, (newSearch) => {
    router.get(route('cgKindObjects.index'), { search: newSearch }, { preserveState: true, replace: true });
});

const page = usePage();

const succesMessage = computed(() => page.props.flash?.success);

watchEffect(() => {
    if (succesMessage.value) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: succesMessage.value,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#14803c',
        }).then(() => {
            page.props.flash.success = null;
        });
    }
});

// Función para eliminar un dispositivo
const deleteCgKindObject = (cgKindObject) => {
    Swal.fire({
            title: "¿Estas seguro?",
            text: "Se eliminara el dispositivo  '" + cgKindObject.object + "'",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#14803c",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, estoy seguro",
            cancelButtonText: "Cancelar",
        }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('cgKindObjects.destroy', cgKindObject.id))
            Swal.fire({
                title: "Eliminado",
                text: "El dispositivo ha sido eliminado con éxito",
                icon: "success",
                confirmButtonColor: "#14803c",
            });
        }
    });
};


</script>

<template>
    <AppLayout title="Dispositivos">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight sm:pl-4">
                Catálogo de Dispositivos
            </h1>
        </template>

            <div class="bg-cremaUAEH py-10 md:rounded-lg mt-3">
                <div class="mx-auto max-w-7xl">
                    <div class="px-4 sm:px-6 lg:px-8">
                       <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    Dispositivos
                                </h1>
                                <p class="mt-2 text-sm text-gray-700">
                                    Tipos de dispositivos que el centro de mantenimiento puede recibir.
                                </p>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                <Link v-if="$page.props.user.permissions.includes('create objects')" class="inline-flex items-center px-4 py-2 bg-rojoMedioUAEH rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rojoOscuroUAEH focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2  focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" :href="route('cgKindObjects.create')">
                                    Añadir Dispositivo
                                </Link>
                            </div>
                       </div>
                       <div class="flex flex-col justify-between sm:flex-row mt-6">
                            <div class="relative text-sm text-gray-800 col-span-3">
                                <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                                    <MagnifyingGlass/>
                                </div>

                                 <!--Input de búsqueda-->
                                 <input v-model="searchQuery" type="text" autocomplete="off" placeholder="Buscar dispositivo" id="search" class="block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-grisUAEH placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amarilloUAEH sm:text-sm sm:leading-6"/>

                            </div>
                        </div>


                <!-- Tabla -->
                <div class="mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-rojoMedioUAEH">
                            <tr>
                                <th class="py-3 px-6 text-center text-sm font-semibold text-white">
                                    Dispositivo
                                </th>
                                <th class="py-3 px-6 text-center text-sm font-semibold text-white">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="cgKindObject in cgKindObjects.data" :key="cgKindObject.id">
                                <td class="py-4 px-6 text-center text-gray-900">
                                    {{ cgKindObject.object }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <Link :href="route('cgKindObjects.edit', cgKindObject.id)" class="text-naranjaUAEH hover:underline mx-2" v-if="$page.props.user.permissions.includes('update objects')">
                                        Editar</Link>
                                    <button @click="deleteCgKindObject(cgKindObject)" class="text-rojoUAEH hover:underline mx-2" v-if="$page.props.user.permissions.includes('delete objects')">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-4 flex flex-wrap gap-2 justify-center space-x-2">
                    <template v-for="link in cgKindObjects.links" :key="link.label">
                        <Link
                            v-if="link.url"
                            :href="link.url"
                            class="px-3 py-2 border rounded border-amarilloUAEH"
                            :class="{'font-bold': link.active}"
                            v-html="link.label">
                        </Link>
                        <span v-else class="px-3 py-2 border rounded text-gray-400 border-amarilloUAEH" v-html="link.label"></span>
                    </template>
                </div>
            </div>
                </div>
            </div>

    </AppLayout>
</template>
