<script>
    export default {
        name: 'OrderForm'
    }
</script>

<script setup>
import FullPageForm from '@/Components/FullPageForm.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { defineProps, defineEmits, watch, reactive, toRefs } from 'vue';

 const props = defineProps({
        form: {
            type: Object,
            required: true
        },
        updating: {
            type: Boolean,
            required: false,
            default: false
        },
        newOrderNumber: {
            type: String,
            required: true,
        },
        order: {
            type: Object,
            required: true
        },
        cgDependencies: {
            type: Array,
            required: true
        },
        cgAcademicAreas: {
            type: Array,
            required: true
        },
        cgKindPeople: {
            type: Object,
            required: true
        },
        users: {
            type: Object,
            required: true
        }
    });

    // Hacer `form` reactivo
    const state = reactive({
        form: { ...props.form }
    });

    // Watch para manejar el cambio de área académica
    watch(() => state.form.cg_academic_area_id, (newAcademicAreaId) => {
        if (newAcademicAreaId && newAcademicAreaId !== 'none') {
            const selectedArea = props.cgAcademicAreas.find(cgAcademicArea => cgAcademicArea.id === newAcademicAreaId);
            if (selectedArea) {
                state.form.cg_dependency_id = selectedArea.cg_dependency_id;
            }
        } else {
            state.form.cg_dependency_id = ''; // Permite al usuario elegir manualmente una dependencia
        }
    });

    // Exponer `form` para el template
    const { form } = toRefs(state);

    // Emit para eventos
    const emit = defineEmits(['submit'])
</script>

<template>
    <FullPageForm @submitted="$emit('submit')">
        <template #title>
            <span v-html="
                updating
                    ? `Gestionar Orden De Mantenimiento: <span style='color: #6600A1; font-weight: bold;'>${form.order_number}</span>`
                    : `Nueva Orden De Mantenimiento: <span style='color: #6600A1; font-weight: bold;'>${newOrderNumber}</span>`">
            </span>

        </template>

        <template #description>
            {{ updating ? 'Gestionar La Orden De Mantenimiento' : 'Da De Alta Una Nueva Orden De Mantenimiento' }}
        </template>

        <template #form>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="status" value="Estado"/>
                <select id="statusOrder" v-model="form.status" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH">
                    <option value="Sin asignar" :style="{ color: 'red' }">Sin asignar</option>
                    <option value="En proceso"  :style="{ color: 'orange' }">En proceso</option>
                    <option value="Finalizado"  :style="{ color: 'green' }">Finalizado</option>
                </select>
                <InputError :message="$page.props.errors.status" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="client_delivered" value="Cliente Que Entrega"/>
                <TextInput id="client_delivered" v-model="form.client_delivered" type="text" autocomplete="client_delivered" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.client_delivered" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="kperson_delivery" id="kperson_delivery" value="Tipo De Persona"/>
                <select name="kperson_delivery" id="kperson_delivery" v-model="form.kperson_delivery" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH" >
                    <option v-for="cgKindPerson in cgKindPeople" :value="cgKindPerson.id" class="whitespace-normal break-words">{{ cgKindPerson.kind_person }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.kperson_delivery" class="mt-2 bg-opacity-0"/>
            </div>

            <div v-if="updating" class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="date_generation" value="Fecha De Generación"/>
                <TextInput id="date_generation" v-model="form.date_generation" type="date" autocomplete="date_reception" readonly class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.date_generation" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="date_reception" value="Fecha De Recepción"/>
                <TextInput id="date_reception" v-model="form.date_reception" type="date" autocomplete="date_reception" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.date_reception" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-3 sm:col-span-3 bg-transparent bg-opacity-0">
                <InputLabel for="phone_number" value="Número De Teléfono"/>
                <TextInput id="phone_number" v-model="form.phone_number" type="text" autocomplete="phone_number" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.phone_number" class="mt-2"/>
            </div>
            <div class="col-span-3 sm:col-span-3 bg-transparent bg-opacity-0">
                <InputLabel for="ext" value="Extensión"/>
                <TextInput id="ext" v-model="form.ext" type="text" autocomplete="ext" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.ext" class="mt-2"/>
            </div>


            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="cell_number" value="Número De Celular"/>
                <TextInput id="cell_number" v-model="form.cell_number" type="text" autocomplete="cell_number" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.cell_number" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="mail" value="Correo Electrónico"/>
                <TextInput id="mail" v-model="form.mail" type="email" autocomplete="mail" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.mail" class="mt-2 bg-opacity-0"/>
            </div>


            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="ceca_received" id="ceca_received" value="Recibió"/>
                <select name="ceca_received" id="ceca_received" v-model="form.ceca_received" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH" >
                    <option v-for="user in users" :value="user.id" class="whitespace-normal break-words">{{ user.name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.ceca_received" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="cg_academic_area_id" id="cg_academic_area_id" value="Área Académica"/>
                <select name="cg_academic_area_id" id="cg_academic_area_id" v-model="form.cg_academic_area_id" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH">
                    <option value="none">Sin área académica</option>
                    <option v-for="cgAcademicArea in cgAcademicAreas" :value="cgAcademicArea.id" class="whitespace-normal break-words">
                        {{ cgAcademicArea.area_name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.cg_academic_area_id" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="cg_dependency_id" id="cg_dependency_id" value="Dependencia"/>
                <select name="cg_dependency_id" id="cg_dependency_id" v-model="form.cg_dependency_id"
                        :disabled="form.cg_academic_area_id !== 'none'"
                        class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH">
                    <option v-for="cgDependency in cgDependencies" :value="cgDependency.id" class="whitespace-normal break-words">
                        {{ cgDependency.dependency_name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.cg_dependency_id" class="mt-2 bg-opacity-0"/>
            </div>


            <div v-if="updating" class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="client_received" value="Cliente Que Recibe"/>
                <TextInput id="client_received" v-model="form.client_received" type="text" autocomplete="client_received" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.client_received" class="mt-2 bg-opacity-0"/>
            </div>

            <div v-if="updating" class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="delivery_date" value="Fecha De Entrega"/>
                <TextInput id="delivery_date" v-model="form.delivery_date" type="date" autocomplete="delivery_date" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.delivery_date" class="mt-2 bg-opacity-0"/>
            </div>

            <div v-if="updating" class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="ceca_delivered" id="ceca_delivered" value="Entregó"/>
                <select name="ceca_delivered" id="ceca_delivered" v-model="form.ceca_deliveries" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH">
                    <option v-for="user in users" :key="user.id" :value="user.id" class="whitespace-normal break-words">
                        {{ user.name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.ceca_delivered" class="mt-2 bg-opacity-0"/>
            </div>


        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Añadir' }}
            </PrimaryButton>
        </template>

    </FullPageForm>
</template>



