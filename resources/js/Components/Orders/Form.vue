<script>
    export default {
        name: 'OrderForm'
    }
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const todayDate = ref(new Date().toISOString().split('T')[0]);


    defineProps({
        form: {
            type: Object,
            required: true
        },
        updating: {
            type: Boolean,
            required: false,
            default: false
        },
        cgDependencies: {
            type: Object,
            required: true
        },
        cgAcademicAreas: {
            type: Object,
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

    //La ruta que se sigue después de hacer submit en el form
    defineEmits(['submit']);

</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Gestionar Orden De Mantenimiento' : 'Crear Orden De Mantenimiento' }}
        </template>

        <template #description>
            {{ updating ? 'Gestionar La Orden De Matenimiento' : 'Crea Una Nueva Orden De Mantenimiento' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="order_number" value="Nombre Del Área Académica"/>
                <TextInput id="order_number" v-model="form.order_number" type="text" autocomplete="order_number" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.order_number" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="status" value="Estado"/>
                <select id="status" v-model="form.status" class="mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md">
                    <option value="Sin asignar" :style="{ color: 'red' }">Sin asignar</option>
                    <option value="En proceso" :style="{ color: 'orange' }">En proceso</option>
                    <option value="Finalizado" :style="{ color: 'green' }">Finalizado</option>
                </select>
                <InputError :message="$page.props.errors.status" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="date_reception" value="Fecha De Recepción"/>
                <TextInput id="date_reception" v-model="form.date_reception" type="date" :min="todayDate"  autocomplete="date_reception" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.date_reception" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="client_deliveries" value="Cliente Que Entrega"/>
                <TextInput id="client_deliveries" v-model="form.client_deliveries" type="text" autocomplete="client_deliveries" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.client_deliveries" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="phone_number" value="Número De Teléfono"/>
                <TextInput id="phone_number" v-model="form.phone_number" type="text" autocomplete="phone_number" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.phone_number" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="ext" value="Extensión"/>
                <TextInput id="ext" v-model="form.ext" type="text" autocomplete="ext" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.ext" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="cell_number" value="Número De Celular"/>
                <TextInput id="cell_number" v-model="form.cell_number" type="text" autocomplete="cell_number" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.cell_number" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="email" value="Correo Electrónico"/>
                <TextInput id="email" v-model="form.email" type="text" autocomplete="email" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.email" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="kperson_delivery" id="kperson_delivery" value="Tipo De Persona"/>
                <select name="kperson_delivery" id="kperson_delivery" v-model="form.kperson_delivery" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH" >
                    <option v-for="cgKindPerson in cgKindPeople" :value="cgKindPerson.id" class="whitespace-normal break-words">{{ cgKindPerson.kind_person }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.kperson_delivery" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="ceca_receives" id="ceca_receives" value="Recibió"/>
                <select name="ceca_receives" id="ceca_receives" v-model="form.ceca_receives" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH" >
                    <option v-for="user in users" :value="user.id" class="whitespace-normal break-words">{{ user.name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.ceca_receives" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="client_receives" value="Cliente Que Recibe"/>
                <TextInput id="client_receives" v-model="form.client_deliveries" type="text" autocomplete="client_receives" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.client_receives" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="delivery_date" value="Fecha De Entrega"/>
                <TextInput id="delivery_date" v-model="form.delivery_date" type="date" :min="todayDate"  autocomplete="delivery_date" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.delivery_date" class="mt-2 bg-opacity-0"/>
            </div>

            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="cg_dependency_id" id="cg_dependency_id" value="Dependencia"/>
                <select name="cg_dependency_id" id="cg_dependency_id" v-model="form.cg_dependency_id" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH" >
                    <option v-for="cgDependency in cgDependencies" :value="cgDependency.id" class="whitespace-normal break-words">{{ cgDependency.dependency_name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.cg_dependency_id" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="cg_academic_area_id" id="cg_academic_area_id" value="Área Académica"/>
                <select name="cg_academic_area_id" id="cg_academic_area_id" v-model="form.cg_academic_area_id" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH" >
                    <option v-for="cgAcademicArea in cgAcademicAreas" :value="cgAcademicArea.id" class="whitespace-normal break-words">{{ cgDependency.area_name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.cg_academic_area_id" class="mt-2 bg-opacity-0"/>

            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="ceca_deliveries" id="ceca_deliveries" value="Entregó"/>
                <select name="ceca_deliveries" id="ceca_deliveries" v-model="form.ceca_deliveries" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH" >
                    <option v-for="user in users" :value="user.id" class="whitespace-normal break-words">{{ user.name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.ceca_deliveries" class="mt-2 bg-opacity-0"/>

            </div>
        </template>



        <template #actions>
             <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Añadir' }}
             </PrimaryButton>
        </template>
    </FormSection>
</template>
