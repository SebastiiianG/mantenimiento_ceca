<script>
export default {
    name: 'DashboardIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import MagnifyingGlass from '@/Components/MagnifyingGlass.vue';
import { usePage, router, Link } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { computed, ref, watch, watchEffect } from 'vue';


const page = usePage();

const props = defineProps({
    order_devices: {
        type: Object,
        required: true,
        default: () => ({})
    },
    search: {
        type: String,
    }
});

const searchQuery = ref(props.search || '');

watch(searchQuery, (newSearch) => {
    router.get(route('orderDevices.index'), { search: newSearch }, { preserveState: true, replace: true });
});

// Se crea una propiedad computada que obtiene el mensaje de éxito desde `page.props.flash.success`.
const succesMessage = computed(() => page.props.flash.success);

// Se utiliza `watchEffect` para observar cambios reactivos.
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

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl leading-tight text-white">
                Tablero
            </h2>
        </template>

        <div class="py-10 bg-cremaUAEH md:rounded-lg mt-3">
            <div class="max-w-7xl mx-auto">
                <div class="px-4 sm:px-4 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Tus últimas órdenes de servicio</h1>
                            <p class="mt-2 text-sm text-gray-700 ">
                                Listado de las órdenes de dispositivos más recientes que tienes asignadas.
                            </p>
                        </div>
                    </div>


                    <div class="flex flex-col justify-between sm:flex-row mt-6">
                        <div class="relative text-sm text-gray-800 col-span-3">
                            <div
                                class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                                <MagnifyingGlass />
                            </div>
                            <!-- Input de busqueda -->
                            <input v-model="searchQuery" type="text" autocomplete="off" placeholder="Buscar orden"
                                id="search"
                                class="block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-grisUAEH placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amarilloUAEH sm:text-sm sm:leading-6" />
                        </div>
                    </div>
                    <!--TABLA-->
                    <div class="mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray">
                            <thead class="bg-rojoMedioUAEH">
                                <tr>
                                    <th class="py-4 px-2 text-center text-sm font-semibold text-white">
                                        Orden
                                    </th>
                                    <th class="py-4 px-2 text-center text-sm font-semibold text-white">
                                        Dispositivo
                                    </th>
                                    <th class="py-4 px-2 text-center text-sm font-semibold text-white">
                                        Falla
                                    </th>
                                    <th class="py-4 px-2 text-center text-sm font-semibold text-white">
                                        Modelo
                                    </th>
                                    <th class="py-4 px-2 text-center text-sm font-semibold text-white">
                                        Marca
                                    </th>
                                    <th class="py-4 px-2 text-center text-sm font-semibold text-white">
                                        Estado
                                    </th>
                                    <th class="py-4 px-2 text-center text-sm font-semibold text-white">
                                        Técnico
                                    </th>
                                    <th class="py-4 px-2 text-center text-sm font-semibold text-white">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="order in order_devices.data" :key="order.id">
                                    <td class="py-4 px-4 text-center text-gray-900">
                                        AM-{{ order.order_id }}
                                    </td>
                                    <td class="py-4 px-4 text-center text-gray-900">
                                        {{ order.cg_kind_objects.object }}
                                    </td>
                                    <td class="py-4 px-4 text-center text-gray-900">
                                        {{ order.cg_kind_failures.failure }}
                                    </td>
                                    <td class="py-4 px-4 text-center text-gray-900">
                                        {{ order.model }}
                                    </td>
                                    <td class="py-4 px-4 text-center text-gray-900">
                                        {{ order.cg_brands.brand_name }}
                                    </td>
                                    <td class="py-4 px-4 text-center text-gray-900">
                                        {{ order.status }}
                                    </td>
                                    <td class="py-4 px-4 text-center text-gray-900">
                                        <span v-if="order.ceca_repairs != null">
                                            {{ order.ceca_repairs.name }}
                                        </span>
                                        <span v-else> Sin asignar </span>

                                    </td>
                                    <td class="py-4 px-8 text-center text-gray-900 ">
                                        <Link :href="route('orderDevices.show', order.id)"
                                            class="text-naranjaUAEH hover:underline ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </Link>
                                        <Link :href="route('orderDevices.edit', order.id)"
                                            class="text-rojoUAEH hover:underline ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Paginación -->
                <div class="mt-4 flex justify-center space-x-2">
                    <template v-for="link in order_devices.links" :key="link.label">
                        <Link v-if="link.url" :href="link.url" class="px-3 py-2 border rounded border-amarilloUAEH"
                            :class="{ 'font-bold': link.active }" v-html="link.label">
                        </Link>
                        <span v-else class="px-3 py-2 border rounded text-gray-400 border-amarilloUAEH"
                            v-html="link.label"></span>
                    </template>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
