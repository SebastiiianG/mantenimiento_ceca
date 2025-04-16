<script>
export default {
    name: 'OrderDeviceShow'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage, Link } from '@inertiajs/vue3';

const page = usePage();

const props = defineProps({
    order_device:{
        type: Object,
        required: true,
        default : () => ({})
    },
});

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-white">
                Orden de Dispositivo
            </h2>
        </template>

        <div class="py-10 bg-cremaUAEH md:rounded-lg mt-3">
            <div class="max-w-7xl mx-auto">
                <div class="px-4 sm:px-4 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Informacion sobre el dispositivo</h1>
                            <p class="mt-2 text-sm text-gray-700 ">
                                Se muestran todos los detalles sobre el dispositivo
                            </p>
                        </div>
                    </div>

                <!--TABLA-->
                <div class="mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray">
                        <tbody>
                            <tr>
                                <th scope="row" class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH w-48">
                                    Orden general
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white border-bottom-1">
                                    <p>AM-{{ order_device.order_id }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH w-40">
                                    Id del dispositivo
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.id }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Dispositivo
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.cg_kind_objects.object }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Falla
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.cg_kind_failures.failure }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Modelo
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.model }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Marca
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.cg_brands.brand_name }}
                                </td>
                            </tr>
                            <tr>
                                <th class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Número de serie
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.serial_number }}
                                </td>
                            </tr>
                            <tr>
                                <th class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Estado
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.status }}
                                </td>
                            </tr>
                            <tr>
                                <th class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Técnico a cargo
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                    <span v-if="order_device.ceca_repairs != null">
                                        {{ order_device.ceca_repairs.name }}
                                    </span>
                                    <span v-else> Sin asignar </span>

                                </td>
                            </tr>
                            <tr>
                                <th class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Observaciones del cliente
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.client_observations}}
                                </td>
                            </tr>
                            <tr>
                                <th class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Observaciones del centro
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.ceca_observations }}
                                </td>
                            </tr>
                            <tr>
                                <th class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Diágnostico
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                        {{ order_device.diagnostic}}
                                </td>
                            </tr>
                            <tr>
                                <th class="py-4 px-2 text-center text-sm font-semibold text-white bg-rojoMedioUAEH">
                                    Contraseña
                                </th>
                                <td class="py-4 px-4 text-center text-gray-900  bg-white">
                                    <p v-if="order_device.computer == '0'">
                                        Sin contraseña
                                    </p>
                                    <p v-else >
                                        {{ order_device.password }}
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>




    </AppLayout>
</template>
