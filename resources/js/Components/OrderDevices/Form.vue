<script>
export default {
    name: 'OrderDevicesForm'
}
</script>

<script setup>
import FormSection from '../FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import RadioButton from '../RadioButton.vue';

defineProps({
        form: {
            type: Object,
            required: true
        },
    });

</script>

<template>

    <FormSection @submitted="$emit('submit')">
        <template #form>
            <div class="col-span-6 sm:col-span-12">
                <InputLabel for="status" value="Estado del dispositivo" />
                <select name="status" id="status"  class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg focus:border-naranjaUAEH focus:ring-naranjaUAEH" >
                    <option class="hover:bg-naranjaUAEH" value="admin">En proceso</option>
                    <option value="editor">Completado</option>
                </select>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="cg_kind_object" value="Tipo de dispositivo "/> <!-- Etiqueta del campo -->
                <TextInput id="cg_kind_object"  type="text" autocomplete="cg_kind_object" class="mt-1 block w-full"/> <!-- Input para ingresar el tipo de persona -->
                <InputError  class="mt-2"/>
                <!-- Muestra un mensaje de error si hay un problema con la validación -->
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="model" value="Modelo del dispositivo"/>
                <TextInput id="model" type="text" autocomplete="model" class="mt-1 block w-full"/>
                <InputError  class="mt-2"/>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="cg_brand_id" value="Marca del dispositivo"/>
                <TextInput id="cg_brand_id" type="text" autocomplete="cg_brand_id" class="mt-1 block w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="serial_number" value="Número de serie del dispositivo"/>
                <TextInput id="serial_number" type="text" autocomplete="serial_number" class="mt-1 block w-full"/>
                <InputError  class="mt-2"/>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="cg_status_id" value="¿El dispositivo tiene contraseña?"/>
                <div class="flex items-center space-x-4 mt-2">
                <RadioButton id="true" name="computer" :value=1>
                </RadioButton>
                <InputLabel for="true" value="Si"/>

                <RadioButton id="false" name="computer" :value=0>
                </RadioButton>
                <InputLabel for="false" value="No"/>
                </div>

                <div class="col-span-6 sm:col-span-6 mt-4">
                    <InputLabel for="password" value="Ingrese contraseña" />
                    <TextInput id="password" type="password" autocomplete="password" class="mt-1 block w-full"/>
                </div>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="cg_kind_failure_id" value="Tipo de falla"/>
                <TextInput id="cg_kind_failure_id" type="text" autocomplete="cg_kind_failure_id" class="mt-1 block w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="client_observations" value="Observaciones del cliente"/>
                <TextInput id="client_observations" type="text" autocomplete="client_observations" class="mt-1 block w-full" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="diagnostic" value="Diagnóstico"/>
                <TextInput id="diagnostic" type="text" autocomplete="diagnostic" class="mt-1 block w-full" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="ceca_observations" value="Observaciones del centro"/>
                <TextInput id="ceca_observations" type="text" autocomplete="ceca_observations" class="mt-1 block w-full" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="ceca_repairs" value="Tecnico que realiza la reparación"/>
                <TextInput id="ceca_repairs" type="text" autocomplete="ceca_repairs" class="mt-1 block w-full" />
            </div>
        </template>
    </FormSection>


</template>
