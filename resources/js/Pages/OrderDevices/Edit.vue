<script>
export default {
    name: 'OrderDevicesEdit'
}
</script>

<script setup>
import { computed, ref } from 'vue';
import OrderDevicesForm from '@/Components/OrderDevices/Form.vue';

const props = defineProps({
    modelValue: {
        type: Object,
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

const emit = defineEmits(['update:modelValue']);

const devices = computed({
    get: () => props.modelValue.devices,
    set: (value) => {
        emit('update:modelValue', {
            ...props.modelValue,
            devices: value,
        });
    }
});

const form = devices;

const openedDevices = ref([]);

const toggleDevice = (id) => {
    if (openedDevices.value.includes(id)) {
        openedDevices.value = openedDevices.value.filter(deviceId => deviceId !== id);
    } else {
        openedDevices.value.push(id);
    }
};

const removeDevice = (index) => {
    const removedDevice = devices.value[index];

    if (removedDevice?.id) {
        if (!props.modelValue.deleted_device_ids) {
            props.modelValue.deleted_device_ids = [];
        }
        props.modelValue.deleted_device_ids.push(removedDevice.id);
    }

    devices.value.splice(index, 1);
    openedDevices.value.splice(index, 1);
};

const updateDevice = (index, newData) => {
    devices.value = devices.value.map((device, i) =>
        i === index ? { ...device, ...newData } : device
    );
};
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
            <p>Total de dispositivos:
                <span v-if="devices.length > 0">{{ devices.length }}
                </span>
                <span v-else>No hay dispositivos asociados a esta orden</span>
            </p>

        </div>

        <div class="mt-4">
            <div v-for="(device, index) in devices" :key="device.id">
                <div
                    class="bg-amarilloUAEH w-full h-12 mt-4 flex items-center px-4 text-white rounded-lg shadow-lg justify-between cursor-pointer"
                    @click="toggleDevice(device.id)">
                    <button>{{ openedDevices.includes(device.id) ? 'Cerrar' : 'Abrir' }}</button>
                    <p>Dispositivo {{ index + 1 }} </p>
                    <p class="cursor-pointer text-white/80" @click.stop="removeDevice(index)">Eliminar</p>
                </div>

                <div v-if="openedDevices.includes(device.id)">
                    <OrderDevicesForm :modelValue="device"  :index="index" :cgKindObjects="cgKindObjects" :cgBrands="cgBrands"
                    :cgKindFailures="cgKindFailures" :users="users" :updating = "true"
                    @update:modelValue="(newData) => updateDevice(index, newData)"/>
                </div>
            </div>
        </div>
    </div>
</template>
