<script>
export default {
    name: 'CgBrandsIndex'
}

</script>
<script setup>
import { computed, ref, watch, watchEffect } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import MagnifyingGlass from '@/Components/MagnifyingGlass.vue';
import Swal from 'sweetalert2';

// Se obtiene el objeto `page` que contiene las propiedades y datos de la página.
const page = usePage();

// Se crea una propiedad computada que obtiene el mensaje de éxito desde `page.props.flash.success`.
const succesMessage = computed(() => page.props.flash?.success);

// Se utiliza `watchEffect` para observar cambios reactivos. Esto se ejecutará cada vez que cambie el valor de `succesMessage`.
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

// Recibe los datos desde Laravel
const props = defineProps({
    cgBrands: Object,
    search: String
});

// Variable reactiva para la búsqueda (inicializa con el valor de Laravel)
const searchQuery = ref(props.search || '');

// Detectar cambios en la búsqueda y actualizar los resultados en tiempo real
watch(searchQuery, (newSearch) => {
    router.get(route('cgBrands.index'), { search: newSearch }, { preserveState: true, replace: true });
});

// Función para eliminar una marca
const deleteCgBrand = (cgBrand) => {
    Swal.fire({
            title: "¿Estas seguro?",
            text: "Se eliminara la marca  '" + cgBrand.brand_name + "'",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#14803c",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, estoy seguro",
            cancelButtonText: "Cancelar",
        }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('cgBrands.destroy', cgBrand.id))
            Swal.fire({
                title: "Eliminado",
                text: "La marca ha sido eliminada con éxito",
                icon: "success",
                confirmButtonColor: "#14803c",
            });
        }
    });
};


</script>

<template>
    <AppLayout title="Marcas">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight sm:pl-4">
                Catálogo de Marcas
            </h1>
        </template>

            <div class="bg-cremaUAEH py-10 md:rounded-lg mt-3">
                <div class="mx-auto max-w-7xl">
                    <div class="px-4 sm:px-6 lg:px-8">
                       <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    Marcas
                                </h1>
                                <p class="mt-2 text-sm text-gray-700">
                                    Marcas registradas para las órdenes de los equipos.
                                </p>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                <Link v-if="$page.props.user.permissions.includes('create brands')" class="inline-flex items-center px-4 py-2 bg-rojoMedioUAEH rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rojoOscuroUAEH focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2  focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" :href="route('cgBrands.create')">
                                    Añadir Marca
                                </Link>
                            </div>
                       </div>
                       <div class="flex flex-col justify-between sm:flex-row mt-6">
                            <div class="relative text-sm text-gray-800 col-span-3">
                                <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                                    <MagnifyingGlass/>
                                </div>

                                 <!--Input de búsqueda-->
                                 <input v-model="searchQuery" type="text" autocomplete="off" placeholder="Buscar marca" id="search" class="block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-grisUAEH placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amarilloUAEH sm:text-sm sm:leading-6"/>

                            </div>
                        </div>


                <!-- Tabla -->
                <div class="mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-rojoMedioUAEH">
                            <tr>
                                <th class="py-3 px-4 text-center text-sm font-semibold text-white">
                                    Marca
                                </th>
                                <th class="py-3 px-4 text-center text-sm font-semibold text-white">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white ">
                            <tr v-for="cgBrand in cgBrands.data" :key="cgBrand.id">
                                <td class="py-4 px-4 text-center text-gray-900
                                whitespace-nowrap
                                overflow-hidden text-ellipsis">
                                    {{ cgBrand.brand_name }}
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <Link :href="route('cgBrands.edit', cgBrand.id)" class="text-naranjaUAEH hover:underline mx-2" v-if="$page.props.user.permissions.includes('update brands')">
                                        Editar</Link>
                                    <button @click="deleteCgBrand(cgBrand)" class="text-rojoUAEH hover:underline mx-2" v-if="$page.props.user.permissions.includes('delete brands')">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-4 flex justify-center space-x-2">
                    <template v-for="link in cgBrands.links" :key="link.label">
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
