<script>
    export default {
        name: 'OrdersEdit'
    }
</script>

<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import OrderForm from '@/Components/Orders/Form.vue';
import OrderDevicesEdit from '@/Pages/OrderDevices/Edit.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Swal from 'sweetalert2';
import { computed, watchEffect } from 'vue';


const props = defineProps({
    //necesaria???
    order: {
        type: Object,
        required: true
    },
    newOrderNumber: {
        type: String,
        required: true,
    },
    cgDependencies: {
        type: Object,
        required: true,
    },
    cgAcademicAreas: {
        type: Object,
        required: true,
    },
    cgKindPeople: {
        type: Object,
        required: true,
    },
    users: {
        type: Object,
        required: true,
    },
    //atributos para el formulario de dispositivos
    devices: {
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
});

const form = useForm({
    order_number : props.order.order_number,
    date_generation : props.order.date_generation,
    date_reception : props.order.date_reception,
    delivery_date : props.order.delivery_date,
    status : 'Sin asignar',
    client_delivered : props.order.client_delivered,
    client_received : props.order.client_received,
    phone_number : props.order.phone_number,
    ext : props.order.ext,
    cell_number : props.order.cell_number,
    mail : props.order.mail,
    kperson_delivery : props.order.kperson_delivery,
    cg_dependency_id : props.order.cg_dependency_id,
    cg_academic_area_id : props.order.cg_academic_area_id,
    ceca_received : props.order.ceca_received,
    ceca_delivered : props.order.ceca_delivered,
    devices: props.devices.order_devices,
    deleted_device_ids: []
});


const handleSubmit = () => {
    console.log("Datos enviados:", form);
    form.put(route('orders.update', props.order.id), { // Usa PUT y pasa el ID de la orden
        onSuccess: () => {
            console.log("Se recibió correctamente");
        },
        onError: (errors) => {
            const firstError = Object.values(errors)[0]; // primer mensaje de error disponible
            Swal.fire({
                title: 'Error',
                text: firstError || 'No se logró actualizar la orden.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        },
    });
};

const page = usePage();
const succesMessage = computed(() => page.props.flash?.error);

// Se utiliza `watchEffect` para observar cambios reactivos. Esto se ejecutará cada vez que cambie el valor de `succesMessage`.
watchEffect(() => {
    if (succesMessage.value) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
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
    <AppLayout title="Edit Service Order">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight">
                Gestionar Orden de Servicio
            </h1>
        </template>

        <div class="py-12">
            <div class="max-vw-7xl mx-auto sm:px:6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <OrderForm :updating = "true" :form="form" :cgDependencies="cgDependencies" :cgAcademicAreas="cgAcademicAreas" :cgKindPeople="cgKindPeople" :users="users" :newOrderNumber="newOrderNumber" @submitted="handleSubmit" />

                        <!-- Crear un nuevo dispositivo -->
                        <div v-if="$page.props.user.permissions.includes('read order devices')">
                            <OrderDevicesEdit v-model="form"  :cgKindObjects="cgKindObjects" :cgBrands="cgBrands" :cgKindFailures="cgKindFailures" :users="users"/>
                        </div>

                        <div class="flex justify-end mt-4">
                            <PrimaryButton class="mt-4"  @click="handleSubmit">
                            Guardar Orden y Dispositivos
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
