<script setup>
import OrderDevicesForm from '@/Components/OrderDevices/Form.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref, computed } from 'vue';

const props = defineProps({
    modelValue: {
        type: Array,
        default: () => [],
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
    },
});

const emit = defineEmits(['update:modelValue']);

const devices = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value),
});

const openedDevices = ref([]);
const counter = ref(devices.value.length || 0);

const addDevice = () => {
    const newDevice = {
        model: '',
        client_observations: '',
        diagnostic: '',
        ceca_observations: '',
        status: '',
        computer: '',
        assigned: '0',
        serial_number: '',
        cg_brand_id: '',
        cg_kind_failure_id: '',
        cg_kind_object_id: '',
        ceca_repairs: '',
        password: '',
    };
    //const password = props.password;

    devices.value = [...devices.value, newDevice];
    openedDevices.value.push(false); // Inicializa como cerrado
};

const removeDevice = (index) => {
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
    <div> <!-- Elemento raíz único -->
        <div class="sm:flex-auto px-2 py-3 sm:px-3 mt-10">
            <h1 class="text-xl font-semibold text-gray-900">
                Órdenes de dispositivos
            </h1>
            <div class="flex mt-6 justify-between">
                <p>Total de dispositivos: {{ devices.length }}</p>
                <PrimaryButton @click="addDevice">+</PrimaryButton>
            </div>
        </div>

        <div class="mt-4">
            <div v-for="(device, index) in devices" :key="device.id">
                <div class="bg-amarilloUAEH w-full h-12 mt-4 flex items-center px-4 text-white rounded-lg shadow-lg justify-between cursor-pointer">
                    <button @click="openedDevices[index] = !openedDevices[index]">
                        {{ openedDevices[index] ? 'Cerrar' : 'Abrir' }}
                    </button>

                    <p>Dispositivo {{ index + 1 }}</p>
                    <p class="cursor-pointer text-white/80" @click="removeDevice(index)">Eliminar</p>
                </div>

                <div v-if="openedDevices[index]">
                    <OrderDevicesForm
                        :modelValue="device"
                        :index="index"
                        @update:modelValue="(newData) => updateDevice(index, newData)"
                        :cg-kind-objects="cgKindObjects"
                        :cg-brands="cgBrands"
                        :cg-kind-failures="cgKindFailures"
                        :users="users"
                    />

                </div>
            </div>
        </div>
    </div>
</template>
