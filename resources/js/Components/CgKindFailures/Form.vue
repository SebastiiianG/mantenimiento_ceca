<script>
    export default {
        name: 'CgKindFailureForm'
    }
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

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
    defineEmits(['submit']);

</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Editar Tipo de Falla' : 'Añadir Tipo de Falla' }}
        </template>

        <template #description>
            {{ updating ? 'Modifica La Información Del Tipo de Falla' : 'Añade Un Nuevo Tipo De Falla' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="failure" value="Nombre De La Falla"/>
                <TextInput id="failure" v-model="form.failure" type="text" autocomplete="failure" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.failure" class="mt-2"/>
            </div>
        </template>

        <template #actions>
             <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Añadir' }}
             </PrimaryButton>
        </template>
    </FormSection>
</template>
