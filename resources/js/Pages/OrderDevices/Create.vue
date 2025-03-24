<script setup>
import { useForm } from '@inertiajs/vue3';
import OrderDevicesForm from '@/Components/OrderDevices/Form.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref } from 'vue';

/* const props = defineProps({
    cgKindObjects: Object,
    cgBrands: Object,
    cgKindFailures: Object,
    users: Object,
    newOrderNumber: String,
}); */


const props = defineProps({
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


const counter = ref(0);
const devices = ref([]);
const openedDevices = ref({}); // Estado de apertura por dispositivo

//order_id:props.newOrderNumber,

const addDevice = () => {
    counter.value++;
    devices.value.push({
        id: counter.value,
        form: useForm({  // Crear un form independiente para cada dispositivo
            model: '',
            client_observations: '',
            diagnostic: '',
            ceca_observations: '',
            status: '',
            computer: '',
            assigned: '0',
            serial_number: '',
            cg_brand_id: '',
            order_id: '',
            cg_kind_failure_id: '',
            cg_kind_object_id: '',
            ceca_repairs: ''
        })
    });
};

const removeDevice = (id) => {
    devices.value = devices.value.filter(device => device.id !== id);
    delete openedDevices.value[id]; // Asegurar que se cierre al eliminarlo
};

const openDevice = (id) => {
    openedDevices.value[id] = !openedDevices.value[id]; // Alternar estado del dispositivo
};

const saveAllDevices = () => {
    if (devices.value.length === 0) {
        alert("No hay dispositivos para guardar.");
        return;
    }

    const allDevicesData = devices.value.map(device => device.form.data());

    //console.log("Enviando datos a Laravel:", allDevicesData);

    const form = useForm({
        devices: allDevicesData
    });

    form.post(route('orderDevices.store'), {
        preserveScroll: true,
        onSuccess: () => console.log("Datos enviados exitosamente."),
        onError: (errors) => console.log("Errores recibidos:", errors),
    });
};




</script>

<template>
    <div class="sm:flex-auto px-2 py-3 sm:px-3 mt-10 ">
        <h1 class="text-xl font-semibold text-gray-900">
            Nueva orden de dispositivos {{ $page.props.newOrderNumber }}
        </h1>
        <p class="mt-2 text-sm text-gray-700">
            Da de alta los dispositivos pertenecientes a esta orden
        </p>
        <div class="flex mt-6 justify-between">
            <p>Total de dispositivos: {{ devices.length }}</p>
            <PrimaryButton @click="addDevice">+</PrimaryButton>
        </div>
    </div>

    <div class="mt-4">
        <div v-for="device in devices" :key="device.id">
            <div class="bg-naranjaUAEH w-full h-12 mt-4 flex items-center px-4 text-white rounded-lg shadow-lg justify-between cursor-pointer">
                <button @click="openDevice(device.id)">Abrir</button>
                <p>Dispositivo {{ device.id }}</p>
                <p class="cursor-pointer text-white/80" @click="removeDevice(device.id)">Eliminar</p>
            </div>

            <div v-if="openedDevices[device.id]">
                <OrderDevicesForm
                    :form="device.form"
                    :cgKindObjects="cgKindObjects"
                    :cgBrands="cgBrands"
                    :cgKindFailures="cgKindFailures"
                    :users="users"
                    :newOrderNumber="newOrderNumber"
                    @submit="device.form.post(route('orderDevices.store'))"
                />
            </div>
        </div>
        <PrimaryButton @click="saveAllDevices" class="mt-4">Guardar todos</PrimaryButton>

    </div>
</template>
