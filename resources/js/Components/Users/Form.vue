<script>
    export default {
        name: 'UserForm'
    }
</script>

<script setup>
import FormSection from '../FormSection.vue';
import InputError from '../InputError.vue';
import InputLabel from '../InputLabel.vue';
import PrimaryButton from '../PrimaryButton.vue';
import TextInput from '../TextInput.vue';
import Checkbox from '../Checkbox.vue';
import { reactive } from 'vue';

defineProps ({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false
    }

})
/* Comunicacion vertical ascendente */
defineEmits(['submit'])

/* Estado inicial para la seleccion de estado */
const state = reactive({
    checked: 'inactive'
    })

</script>

<template>
    <!-- Cuando se envia este formulario emite un 'submit' que se espera en Create.vue, el submitted viene desde el formSection que se usa para comunicarse con este -->
    <FormSection @submitted="$emit('submit')">
        <template #title>
            <!-- ternaria para colocar un titulo en caso que se ocupe le formulario para actualizar o crear  -->
            {{ updating ? 'Actualizar usuario' : 'Crear nuevo usuario' }}
        </template>

        <template #description>
            {{ updating ? 'Actualizando el usuario seleccionado' : 'Rellene los datos para crear un usuario' }}
        </template>

        <template #form>
            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="name" value="Nombre completo" />
                <TextInput id="name" type="text" v-model="form.name" class="mt-1 w-full" required autofocus />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>

            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="email" value="Correo electrónico" />
                <TextInput id="email" type="email" v-model="form.email" class="mt-1 w-full" required autofocus />
                <InputError :message="$page.props.errors.email" class="mt-2" />
            </div>

            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="password" value="Contraseña" />
                <TextInput id="name" type="password" v-model="form.password" class="mt-1 w-full" required autofocus />
                <InputError :message="$page.props.errors.password" class="mt-2" />
            </div>

            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="user_number" value="Numero de empleado" />
                <TextInput id="user_number" type="text" v-model="form.userNumber" class="mt-1 w-full" required autofocus />
                <InputError :message="$page.props.errors.userNumber" class="mt-2" />
            </div>

            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="status" value="Estado" />
                    <div class="flex items-center space-x-4 mt-2">
                        <!-- Opcion activo -->
                        <Checkbox id="active" v-model="state.checked" name="status" value="active" />
                        <InputLabel for="active" class="inline-flex items-center text-sm text-gray-800">Activo</InputLabel>
                        <!-- Opcion inactivo -->
                        <Checkbox id="inactive" v-model="state.checked" name="status" value="inactive" />
                        <InputLabel for="inactive" class="inline-flex items-center text-sm text-gray-800">Inactivo</InputLabel>
                    </div>
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Actualizar ' : 'Crear' }}
            </PrimaryButton>

        </template>

    </FormSection>

</template>
