<script>
export default {
    name: 'OrderDevicesEdit'
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import OrderDevicesForm from '@/Components/OrderDevices/Form.vue';

const props = defineProps({
    devices : {
        type: Object,
        required: true,
    },
    newOrderNumber: {
        type: String,
        required: true,
    },
    cgKindObjects: {
        type: Object,
        required: true,
    },
    cgBrands: {
        type: Object,
        required: true,
    },
    cgKindFailures: {
        type: Object,
        required: true,
    },
    users: {
        type: Object,
        required: true,
    }
});

</script>

<template>
    <div class="sm:flex-auto px-2 py-3 sm:px-3 mt-10 ">
        <h1 class="text-xl font-semibold text-gray-900">
            Ordenes de dispositivos
        </h1>
        <p class="mt-2 text-sm text-gray-700">
            Se listan los dispositivos pertenecientes a esta orden
        </p>
        <div class="flex mt-6 justify-between text-sm text-gray-700">
            <p>Total de dispositivos: </p>
            <p>{{ props.devices }}</p>
        </div>

        <div class="mt-4">
            <div v-for="device in props.devices" :key="device.id">
                <div
                    class="bg-naranjaUAEH w-full h-12 mt-4 flex items-center px-4 text-white rounded-lg shadow-lg justify-between cursor-pointer">
                    <button @click="openDevice(device.id)">Abrir</button>
                    <p>Dispositivo </p>
                    <p class="cursor-pointer text-white/80" @click="removeDevice(device.id)">Eliminar</p>
                </div>

                <div v-if="openedDevices[device.id]">
                    <OrderDevicesForm :form="device.form" :cgKindObjects="cgKindObjects" :cgBrands="cgBrands"
                        :cgKindFailures="cgKindFailures" :users="users" :newOrderNumber="newOrderNumber"
                        @submit="device.form.post(route('orderDevices.update'))" />
                </div>
            </div>
            <PrimaryButton @click="saveAllDevices" class="mt-4">Guardar todos</PrimaryButton>

        </div>

    </div>
</template>
