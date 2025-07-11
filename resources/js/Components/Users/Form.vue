<script>
import DropdownLink from '../DropdownLink.vue';
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
import RadioButton from '../RadioButton.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    form: {
        type: Object,
        required: true,
        default: () => ({
            name: '',
            email: '',
            password: '',
            user_number: '',
            status: 1,
            role: '',
        })
    },
    updating: {
        type: Boolean,
        default: false,
        required: false
    }
});

const page = usePage();
const currentUser = page.props.user;

const canAssignAdmin = computed(() => currentUser.permissions.includes('update admin'));
const canAssignEditor = computed(() => currentUser.permissions.includes('update users'));
const isMainAdmin = computed(() => String(props.form.user_number) === '1111');
const isEditingSuperuser = computed(() => props.form.role === 'superuser');

const isEditingAdmin = computed(() => props.form.role === 'admin');
const isSuperuser = computed(() => currentUser.permissions.includes('update admin'));

/* Comunicacion vertical ascendente */
defineEmits(['submit'])


</script>

<template>
    <!-- Cuando se envia este formulario emite un 'submit' que se espera en Create.vue, el submitted viene desde el formSection que se usa para comunicarse con este -->

    <FormSection @submitted="$emit('submit', form)">
        <template #title>
            <!-- ternaria para colocar un titulo en caso que se ocupe le formulario para actualizar o crear  -->

            {{ updating ? 'Editar Usuario' : 'Crear Nuevo Usuario' }}
        </template>

        <template #description>
            {{ updating ? 'Modifica la información del usuario seleccionado' : 'Rellene los datos para crear un usuario' }}
        </template>

        <template #form>
            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="roles" value="Rol" />

                <select
                    id="roles"
                    v-model="form.role"
                    :disabled="isMainAdmin || isEditingSuperuser || isEditingAdmin"
                    class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH"
                >
                    <option value="editor" v-if="canAssignEditor || canAssignAdmin || isEditingSuperuser">Editor</option>
                    <option value="admin" v-if="isEditingAdmin || isSuperuser || isEditingSuperuser">Administrador</option>
                    <option value="superuser" v-if="isEditingSuperuser" disabled>Superusuario</option>
                </select>

                <input v-if="isMainAdmin || isEditingSuperuser || isEditingAdmin" type="hidden" name="role" :value="form.role" />
                <!-- Mantener valor oculto si el campo está deshabilitado -->
                <input v-if="isMainAdmin || isEditingSuperuser" type="hidden" name="role" :value="form.role" />
                <!-- Hidden input para asegurarnos que se envía -->
                <input v-if="isMainAdmin" type="hidden" name="role" :value="form.role" />
            </div>

            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="name" value="Nombre Completo" />
                <TextInput id="name" type="text" v-model="form.name" autocomplete="name" class="mt-1 w-full" required autofocus />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>

            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="email" value="Correo Electrónico" />
                <TextInput id="email" type="email" v-model="form.email" autocomplete="email" class="mt-1 w-full" required />
                <InputError :message="$page.props.errors.email" class="mt-2" />
            </div>

            <div v-if="!updating" class="col-span-8 sm:col-span-8">
                <InputLabel for="password" value="Contraseña" />
                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    autocomplete="password"
                    class="mt-1 w-full"
                    required
                />
                <InputError :message="$page.props.errors.password" class="mt-2" />
            </div>

            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="user_number" value="Número De Empleado" />
                <TextInput
                    id="user_number"
                    type="number"
                    v-model="form.user_number"
                    autocomplete="user_number"
                    class="mt-1 w-full"
                    required
                    :readonly="isMainAdmin"
                />
                <InputError :message="$page.props.errors.user_number" class="mt-2" />
            </div>

            <div class="col-span-8 sm:col-span-8">
                <InputLabel for="status" value="Estado" />
                    <div class="flex items-center space-x-4 mt-2">
                        <!-- Opcion activo -->
                        <RadioButton  id="active" v-model="form.status" name="status" :value=1 />
                        <InputLabel for="active" class="inline-flex items-center text-sm text-gray-800" value="Activo" />
                        <!-- Opcion inactivo -->
                        <RadioButton id="inactive" v-model="form.status" name="status" :value=0 />
                        <InputLabel for="inactive" class="inline-flex items-center text-sm text-gray-800" value="Inactivo"/>
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
