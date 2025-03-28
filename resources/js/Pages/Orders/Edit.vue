<script>
    export default {
        name: 'OrdersEdit'
    }
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import OrderForm from '@/Components/Orders/Form.vue';
import OrderDevicesEdit from '@/Pages/OrderDevices/Edit.vue';


const props = defineProps({
    order: {
        type: Object,
        required: true
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
    devices: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    order_number : props.order.order_number,
    date_generation : props.order.date_generation,
    date_reception : props.order.date_reception,
    delivery_date : props.order.delivery_date,
    status : props.order.status,
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
});

const handleFormSubmit = (formData) => {
    formData.put(route('orders.update', order.id));
};
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
                        <OrderForm :updating = "true" :form="form" :cgDependencies="cgDependencies" :cgAcademicAreas="cgAcademicAreas" :cgKindPeople="cgKindPeople" :users="users" @submitted="handleFormSubmit" />

                        <!-- Crear un nuevo dispositivo -->
                        <div v-if="$page.props.user.permissions.includes('read order devices')">
                            <OrderDevicesEdit  :cgKindObjects="cgKindObjects" :cgBrands="cgBrands" :cgKindFailures="cgKindFailures" :users="users" :newOrderNumber="newOrderNumber"
                            :devices="devices"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
