<script setup>
import { computed } from 'vue';
import { useForm } from '@inertiajs/vue3';
import OrderDevicesForm from '@/Components/OrderDevices/Form.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    order_device: {
        type: Object,
        required: true
    },
    users: {
        type: Array,
        required: true
    },
    cgKindObjects: {
        type: Array,
        required: true
    },
    cgBrands: {
        type: Array,
        required: true
    },
    cgKindFailures: {
        type: Array,
        required: true
    },
    assign_password: {
        type: String,
        required: true
    }
});

//Creamos el form de Inertia
const form = useForm({
    status: props.order_device.status,
    cg_kind_object_id: props.order_device.cg_kind_object_id,
    model: props.order_device.model,
    cg_brand_id: props.order_device.cg_brand_id,
    serial_number: props.order_device.serial_number,
    computer: props.order_device.computer,
    password: props.order_device.password,
    cg_kind_failure_id: props.order_device.cg_kind_failure_id,
    client_observations: props.order_device.client_observations,
    diagnostic: props.order_device.diagnostic,
    ceca_observations: props.order_device.ceca_observations,
    ceca_repairs: props.order_device.ceca_repairs,
    asign_password: '',
});

//Computed proxy para v-model
const formProxy = computed({
    get() {
        // Le pasamos todo el objeto form; Form.vue clona shallow internamente
        return form;
    },
    set(newData) {
        // Copiamos sólo las propiedades que vienen del formulario
        Object.assign(form, newData);
    },
});

//Submit
function handleSubmit() {
    console.log("Datos enviados:", form);
    form.put(route('orderDevices.update', props.order_device.id), {
        onSuccess: () => console.log('Orden actualizada'),
        onError: () => console.error('Errores:', form.errors),
    });
}
</script>

<template>
    <AppLayout title="Editar Orden de Dispositivo">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight">
                Gestionar Orden de Dispositivo
            </h1>
        </template>

        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-cremaUAEH p-6 overflow-hidden">
                <!-- PASAMOS el proxy y escuchamos 'submit' -->
                <OrderDevicesForm v-model="formProxy" :index="0" :cgKindObjects="cgKindObjects" :cgBrands="cgBrands"
                    :cgKindFailures="cgKindFailures" :users="users" :updating="true" @submit="handleSubmit" :assign_password="assign_password" />

                <div class="flex justify-end mt-4">
                    <PrimaryButton @click="handleSubmit">
                        Actualizar
                    </PrimaryButton>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
