<script>
    export default {
        name: 'CgKindObjectForm'
    }
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

// Definición de propiedades que recibe el componente
    defineProps({
        form: {
            type: Object,
            required: true
        },
        updating: {
            type: Boolean,
            required: false,
            default: false
        }
    });

    //La ruta que se sigue después de hacer submit en el form
    // Evento que emite el formulario cuando se envía
    defineEmits(['submit']);

</script>

<template>
    <!-- Sección del formulario que emite el evento "submit" al enviarlo -->
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Editar Tipo de Dispositivo' : 'Añadir Tipo de Dispositivo' }}
        </template>

        <template #description>
            {{ updating ? 'Modifica La Información Del Tipo de Dispositivo' : 'Añade Un Nuevo Tipo De Dispositivo' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="object" value="Nombre Del Tipo de Dispositivo"/> <!-- Etiqueta del campo -->
                <TextInput id="object" v-model="form.object" type="text" autocomplete="object" class="mt-1 block w-full"/> <!-- Input para ingresar el tipo de objeto -->
                <InputError :message="$page.props.errors.object" class="mt-2"/>
                 <!-- Muestra un mensaje de error si hay un problema con la validación -->

            </div>
        </template>

        <!-- Botón de acción -->
        <template #actions>
             <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Añadir' }}
             </PrimaryButton>
        </template>
    </FormSection>
</template>
