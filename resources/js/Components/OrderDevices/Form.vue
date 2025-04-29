<script>
export default {
    name: 'OrderDevicesForm'
}
</script>

<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import RadioButton from '../RadioButton.vue';
import { ref, watch, computed } from 'vue';
import FullPageForm from '@/Components/FullPageForm.vue';
import Checkbox from '../Checkbox.vue';

const props = defineProps({
    updating: {
        type: Boolean,
        required: false
    },
    cgKindObjects: {
        type: Object,
        required: true
    },
    cgBrands: {
        type: Object,
        required: true
    },
    cgKindFailures: {
        type: Object,
        required: true
    },
    users: {
        type: Object,
        required: true
    },
    modelValue: {
        type: Object,
        required: true
    },
    index: {
        type: Number,
    },
});
const checkedPassword = 'Contraseña1';

const emit = defineEmits(['update:modelValue']);

// Hacer `form` reactivo y sincronizarlo con `modelValue`
//const form = ref({ ...props.modelValue });
/*
watch(form, (newVal) => {
    emit('update:modelValue', newVal);
}, { deep: true }); */


// Usar directamente modelValue con computed
const form = computed({
    get() {
        return props.modelValue
    },
    set(value) {
        emit('update:modelValue', value)
    }
})

</script>

<template>

    <FullPageForm @submitted="$emit('submit')">

        <template #form>
                <div class="col-span-6 sm:col-span-6" v-if="updating == true">
                    <div class="flex items-center space-x-4 mt-2">
                        <Checkbox
                            :id="'status-' + index"
                            :name="'status-' + index"
                            :checked="form.status === 'Finalizado'"
                            @change="(e) => form.status = e.target.checked ? 'Finalizado' : 'En proceso'"
                        />

                        <span v-if="form.status === 'Finalizado'">
                            <InputLabel :for="'status-' + index" value="Finalizado" />
                        </span>
                        <span v-else>
                            <InputLabel :for="'status-' + index" value="Marcar como finalizado" />
                        </span>
                    </div>
                </div>
            <div class="col-span-6 sm:col-span-6">

                <InputLabel for="cg_kind_object_id" value="Tipo de dispositivo " />
                <select name="cg_kind_object_id" id="cg_kind_object_id" v-model="form.cg_kind_object_id"
                    class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH">
                    <option v-for="cgKindObject in cgKindObjects" :value="cgKindObject.id"
                        class="whitespace-normal break-words">
                        {{ cgKindObject.object }}
                    </option>
                </select>
                <InputError :message="$page.props.errors[`devices.${index}.cg_kind_object_id`]"
                    class="mt-2 bg-opacity-0" />

            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="model" value="Modelo del dispositivo" />
                <TextInput id="model" v-model="form.model" type="text" autocomplete="model" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors[`devices.${index}.model`]" class="mt-2 bg-opacity-0" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="cg_brand_id" value="Marca del dispositivo" />
                <select name="cg_brand_id" id="cg_brands_id" v-model="form.cg_brand_id"
                    class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH">
                    <option v-for="cgBrand in cgBrands" :value="cgBrand.id" class="whitespace-normal break-words">
                        {{ cgBrand.brand_name }}
                    </option>
                </select>

                <InputError :message="$page.props.errors[`devices.${index}.cg_brand_id`]" class="mt-2 bg-opacity-0" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="serial_number" value="Número de serie del dispositivo (opc)*" />
                <TextInput id="serial_number" v-model="form.serial_number" type="text" autocomplete="serial_number"
                    class="mt-1 block w-full" />
                <InputError :message="$page.props.errors[`devices.${index}.serial_number`]" class="mt-2 bg-opacity-0" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="computer" value="¿El dispositivo tiene contraseña?" />
                <div class="flex items-center space-x-4 mt-2">
                    <RadioButton id="true" name="computer" :value=1 v-model="form.computer">
                    </RadioButton>
                    <InputLabel for="true" value="Si" />

                    <RadioButton id="false" name="computer" :value=0 v-model="form.computer">
                    </RadioButton>
                    <InputLabel for="false" value="No" />
                </div>
                <InputError :message="$page.props.errors[`devices.${index}.computer`]" class="mt-2 bg-opacity-0" />
                <div v-if="form.computer === 1" class="col-span-6 sm:col-span-6 mt-4">
                    <InputLabel for="password" value="Ingrese contraseña" />
                    <TextInput id="password" v-model="form.password" type="password" autocomplete="password"
                        class="mt-1 block w-full" />
                    <!-- Si el campo password esta vacio , se muestra el error -->
                    <!-- <span v-if="!form.password" class="text-red-500 text-sm">El campo contraseña es obligatorio</span> -->
                </div>

            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="cg_kind_failure_id" value="Tipo de falla" />
                <select name="cg_kind_failure_id" id="cg_kind_failure_id" v-model="form.cg_kind_failure_id"
                    class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH">
                    <option v-for="cgKindFailure in cgKindFailures" :value="cgKindFailure.id"
                        class="whitespace-normal break-words">
                        {{ cgKindFailure.failure }}
                    </option>
                </select>
                <InputError :message="$page.props.errors[`devices.${index}.cg_kind_failure_id`]"
                    class="mt-2 bg-opacity-0" />

            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="client_observations" value="Observaciones del cliente" />
                <TextInput id="client_observations" v-model="form.client_observations" type="text"
                    autocomplete="client_observations" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors[`devices.${index}.client_observations`]"
                    class="mt-2 bg-opacity-0" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="diagnostic" value="Diagnóstico (opc)*" />
                <TextInput id="diagnostic" v-model="form.diagnostic" type="text" autocomplete="diagnostic"
                    class="mt-1 block w-full" />

                <InputError :message="$page.props.errors.diagnostic" class="mt-2 bg-opacity-0" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="ceca_observations" value="Observaciones del centro (opc)*" />
                <TextInput id="ceca_observations" v-model="form.ceca_observations" type="text"
                    autocomplete="ceca_observations" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.ceca_observations" class="mt-2 bg-opacity-0" />
            </div>
            <!--CONTRASEÑA PARA TECNICO-->
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="asign_password" value="Ingrese contraseña si desea asignar a un tecnico" />
                <TextInput id="asign_password" type="text" autocomplete="asign_password" class="mt-1 block w-full" v-model="form.asign_password" />
            </div>

            <div v-if="form.asign_password === checkedPassword" class="col-span-6 sm:col-span-6">
                <InputLabel for="ceca_repairs" value="Tecnico que realiza la reparación" />
                <select name="ceca_repairs" id="ceca_repairs" v-model="form.ceca_repairs"
                    class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH">
                    <option v-for="user in users" :key="user.id" :value="user.id" class="whitespace-normal break-words">
                        {{ user.name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.ceca_repairs" class="mt-2 bg-opacity-0" />
            </div>
        </template>
    </FullPageForm>


</template>
