<script>
export default {
    name: 'Order'
}

</script>
<script setup>
import { computed, ref, watch, watchEffect } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import MagnifyingGlass from '@/Components/MagnifyingGlass.vue';
import PDF from '@/Components/PDF.vue';
import Trash from '@/Components/Trash.vue';
import Edition from '@/Components/Edition.vue';

import Swal from 'sweetalert2';

// Se obtiene el objeto `page` que contiene las propiedades y datos de la página.
const page = usePage();

// Se crea una propiedad computada que obtiene el mensaje de éxito desde `page.props.flash.success`.
const succesMessage = computed(() => page.props.flash.success);

// Se utiliza `watchEffect` para observar cambios reactivos. Esto se ejecutará cada vez que cambie el valor de `succesMessage`.
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

// Recibe los datos desde Laravel
const props = defineProps({
    orders: Object,
    search: String
});

// Variable reactiva para la búsqueda (inicializa con el valor de Laravel)
const searchQuery = ref(props.search || '');

// Detectar cambios en la búsqueda y actualizar los resultados en tiempo real
watch(searchQuery, (newSearch) => {
    router.get(route('orders.index'), { search: newSearch }, { preserveState: true, replace: true });
});

// Función para eliminar una marca
const deleteOrder = (order) => {

    Swal.fire({
            title: "¿Estás seguro?",
            text: "Se eliminará la orden  '" + order.order_number + "'",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#14803c",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, estoy seguro",
            cancelButtonText: "Cancelar",
        }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('orders.destroy', order.id))
        }
    });
};

const formatDate = (dateString) => {
    if (!dateString || dateString == null) return "Sin fecha";
    const date = new Date(dateString);
    return `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()}`;
};

const downloadPDF = (orderId) =>{
        window.open(`/orders/${orderId}/report`, '_blank');
}

</script>

<template>
    <AppLayout title="Órdenes">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight sm:pl-4">
                Gestionar Orden
            </h1>
        </template>

            <div class="bg-cremaUAEH py-10 md:rounded-lg mt-3">
                <div class="mx-auto max-w-7xl">
                    <div class="px-4 sm:px-6 lg:px-8">
                       <div class="sm:flex sm:items-center ">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    Órdenes
                                </h1>
                                <p class="mt-2 text-sm text-gray-700">
                                    Órdenes de mantenimiento.
                                </p>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-12">
                                <Link v-if="$page.props.user.permissions.includes('update orders')" class="inline-flex items-center px-4 py-2 bg-amarilloUAEH rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-naranjaUAEH focus:bg-gray-700 active:bg-grisOscuroUAEH focus:outline-none focus:ring-2  focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" :href="route('orders.reportNotes.edit')" >
                                    Editar Notas Del Reporte
                                </Link>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-12 ">
                                <Link v-if="$page.props.user.permissions.includes('create excel')" class="inline-flex items-center px-4 py-2 bg-naranjaUAEH rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rojoUAEH focus:bg-gray-700 active:bg-grisOscuroUAEH focus:outline-none focus:ring-2  focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" :href="route('orders.createExcel')">
                                    Generar Reporte Excel
                                </Link>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-12 ">
                                <Link v-if="$page.props.user.permissions.includes('create orders')" class="inline-flex items-center px-4 py-2 bg-rojoMedioUAEH rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rojoOscuroUAEH focus:bg-gray-700 active:bg-grisOscuroUAEH focus:outline-none focus:ring-2  focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" :href="route('orders.create')">
                                    Añadir Orden De Servicio
                                </Link>
                            </div>
                       </div>
                       <div class="flex flex-col justify-between sm:flex-row mt-6">
                            <div class="relative text-sm text-gray-800 col-span-3">
                                <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                                    <MagnifyingGlass/>
                                </div>

                                 <!--Input de búsqueda-->
                                 <input v-model="searchQuery" type="text" autocomplete="off" placeholder="Buscar orden" id="search" class="block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-grisUAEH placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amarilloUAEH sm:text-sm sm:leading-6"/>

                            </div>
                        </div>



                <!-- Tabla -->
                <div class="mt-8 overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-rojoMedioUAEH">
                            <tr>
                                <th class="py-3 px-4 text-center text-sm font-semibold text-white">
                                    Número de Orden
                                </th>
                                <th class="py-3 px-6 text-center text-sm font-semibold text-white">
                                    Estatus
                                </th>
                                <th class="py-3 px-6 text-center text-sm font-semibold text-white">
                                    Fecha de Recepción
                                </th>
                                <th class="py-3 px-6 text-center text-sm font-semibold text-white">
                                    Cliente
                                </th>
                                <th class="py-3 px-4 text-center text-sm font-semibold text-white">
                                    Dependencia
                                </th>
                                <th class="py-3 px-12 text-center text-sm font-semibold text-white">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="order in orders.data" :key="order.id">
                                <td class="py-4 px-4 text-center text-gray-900">
                                    {{ order.order_number }}
                                </td>
                                <td class="py-4 px-6 text-center text-gray-900">
                                    {{ order.status }}
                                </td>
                                <td class="py-4 px-6 text-center text-gray-900">
                                    {{ formatDate(order.date_reception)}}
                                </td>
                                <td class="py-4 px-6 text-center text-gray-900">
                                    {{ order.client_delivered }}
                                </td>
                                <td class="py-4 px-4 text-center text-gray-900">
                                    {{ order.cg_dependency?.dependency_name ?? 'Sin dependencia' }}
                                </td>
                                <td class="py-4 px-12 text-center">
                                    <div class="flex justify-center items-center gap-4">
                                        <Link :href="route('orders.edit', order.id)"
                                            class="p-2 rounded-lg transition transform hover:scale-125"
                                            v-if="$page.props.user.permissions.includes('update orders')">
                                            <Edition />
                                        </Link>
                                        <button @click="deleteOrder(order)"
                                            class="p-2 rounded-l transition transform hover:scale-125"
                                            v-if="$page.props.user.permissions.includes('delete orders')">
                                            <Trash />
                                        </button>
                                        <button @click="downloadPDF(order.id)" class="p-2 rounded-lg transition transform hover:scale-125">
                                            <PDF />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-4 flex justify-center space-x-2">
                    <template v-for="link in orders.links" :key="link.label">
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
