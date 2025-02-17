<script>
    export default {
        name: 'CgDependencyForm'
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
            {{ updating ? 'Editar Dependencia' : 'Añadir Dependencia' }}
        </template>

        <template #description>
            {{ updating ? 'Modifica La Información De La Dependencia Universitaria' : 'Añade Una Nueva Dependencia Universitaria' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="dependency_name" value="Nombre De La Dependencia"/>
                <TextInput id="dependency_name" v-model="form.dependency_name" type="text" autocomplete="dependency_name" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.dependency_name" class="mt-2 bg-opacity-0"/>
            </div>
        </template>

        <template #actions>
             <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Añadir' }}
             </PrimaryButton>
        </template>
    </FormSection>
</template>
