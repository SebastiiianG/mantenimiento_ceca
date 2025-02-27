<script>
export default {
    name: 'CgAcademicAreasIndex'
}

</script>
<script setup>
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import MagnifyingGlass from '@/Components/MagnifyingGlass.vue';
// Recibe los datos desde Laravel
const props = defineProps({
    cgAcademicAreas: Object,
    search: String
});

// Variable reactiva para la búsqueda (inicializa con el valor de Laravel)
const searchQuery = ref(props.search || '');

// Detectar cambios en la búsqueda y actualizar los resultados en tiempo real
watch(searchQuery, (newSearch) => {
    router.get(route('cgAcademicAreas.index'), { search: newSearch }, { preserveState: true, replace: true });
});

// Función para eliminar una marca
const deleteCgAcademicArea = (cgAcademicArea) => {
    if (confirm(`¿Estás seguro de que deseas eliminar el área académica "${cgAcademicArea.area_name}"?`)) {
        router.delete(route('cgAcademicAreas.destroy', cgAcademicArea.id));
    }
};


</script>

<template>
    <AppLayout title="Áreas Académicas">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight sm:pl-4">
                Áreas Académicas
            </h1>
        </template>

            <div class="bg-cremaUAEH py-10 md:rounded-lg mt-3">
                <div class="mx-auto max-w-7xl">
                    <div class="px-4 sm:px-6 lg:px-8">
                       <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    Áreas Académicas
                                </h1>
                                <p class="mt-2 text-sm text-gray-700">
                                    Áreas académicas de los diferentes institutos y programas educativos de la UAEH.
                                </p>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                <Link v-if="$page.props.user.permissions.includes('create academic areas')" class="inline-flex items-center px-4 py-2 bg-rojoMedioUAEH rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rojoOscuroUAEH focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2  focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" :href="route('cgAcademicAreas.create')">
                                    Añadir Área Académica
                                </Link>
                            </div>
                       </div>
                       <div class="flex flex-col justify-between sm:flex-row mt-6">
                            <div class="relative text-sm text-gray-800 col-span-3">
                                <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                                    <MagnifyingGlass/>
                                </div>

                                 <!--Input de búsqueda-->
                                 <input v-model="searchQuery" type="text" autocomplete="off" placeholder="Buscar área académica" id="search" class="block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-grisUAEH placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amarilloUAEH sm:text-sm sm:leading-6"/>

                            </div>
                        </div>


                <!-- Tabla -->
                <div class="mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-rojoMedioUAEH">
                            <tr>
                                <th class="py-3 px-6 text-center text-sm font-semibold text-white">
                                    Área Académica
                                </th>
                                <th class="py-3 px-6 text-center text-sm font-semibold text-white">
                                    Dependencia
                                </th>
                                <th class="py-3 px-6 text-center text-sm font-semibold text-white" colspan="2">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="cgAcademicArea in cgAcademicAreas.data" :key="cgAcademicArea.id">
                                <td class="py-4 px-6 text-center text-gray-900">
                                    {{ cgAcademicArea.area_name }}
                                </td>
                                <td class="py-4 px-6 text-center text-gray-900">
                                    {{ cgAcademicArea.cg_dependency?.dependency_name ?? 'Sin dependencia' }}
                                </td>
                                <td class="py-4 px-6 text-center w-5">
                                    <Link :href="route('cgAcademicAreas.edit', cgAcademicArea.id)" class="text-naranjaUAEH hover:underline mx-2" v-if="$page.props.user.permissions.includes('update academic areas')">
                                        Editar</Link>
                                </td>
                                <td class="py-4 px-6 text-center w-5">
                                    <button @click="deleteCgAcademicArea(cgAcademicArea)" class="text-rojoUAEH hover:underline mx-2" v-if="$page.props.user.permissions.includes('delete academic areas')">
                                        Eliminar
                                    </button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-4 flex justify-center space-x-2">
                    <template v-for="link in cgAcademicAreas.links" :key="link.label">
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
