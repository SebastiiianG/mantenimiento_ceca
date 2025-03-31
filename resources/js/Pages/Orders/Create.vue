<script>
    export default {
        name: 'OrdersCreate'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import OrderForm from '@/Components/Orders/Form.vue';
import OrderDevicesCreate from '@/Pages/OrderDevices/Create.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';


defineProps({
    newOrderNumber: {
            type: String,
            required: true,
    },
    cgDependencies: {
        type: Array,
        required: true,
    },
    cgAcademicAreas: {
        type: Array,
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
    cgKindObjects: {
        type: Object,
        required: true,
    },
    cgBrands: {
        type: Object,
        required: true,
    },
    cgKindFailures : {
        type: Object,
        required: true,
    }
});

const form = useForm({
    date_reception: '',
    status: '',
    client_delivered: '',
    phone_number: '',
    ext: '',
    cell_number: '',
    mail: '',
    kperson_delivery: '',
    cg_academic_area_id: 'none',
    cg_dependency_id: '',
    ceca_received: '',
    //array para los dispositivos
    devices: [],
});

const handleSubmit = () => {
    console.log("Datos enviados:", form);
    form.post(route('orders.store'),{
        onSuccess: () => {
            console.log("Se envio correctamente");
        },
        onError: (errors) => {
            console.log("Error al enviar", errors);
        },
    });
};

</script>

<template>
    <AppLayout title="Create Order">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight" v-if="$page.props.user.permissions.includes('create orders')">
                Añadir Orden De Servicio
            </h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-cremaUAEH overflow-hidden">
                    <div class="p-6">
                        <!-- Mostrar el último order_number en el título dentro del formulario -->
                        <!--orders.store es la ruta para guardar el recursos -->
                        <OrderForm :form="form" v-model="form" :newOrderNumber="newOrderNumber" :cgDependencies="cgDependencies" :cgAcademicAreas="cgAcademicAreas" :cgKindPeople="cgKindPeople" :users="users"
                        @submitted="handleSubmit"/>

                        <!-- Crear un nuevo dispositivo -->
                        <div v-if="$page.props.user.permissions.includes('create order devices')">
                            <OrderDevicesCreate v-model="form.devices" :cgKindObjects="cgKindObjects" :cgBrands="cgBrands" :cgKindFailures="cgKindFailures" :users="users" />
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
