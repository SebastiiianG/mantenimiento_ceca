<script>
    export default {
        name: 'CgBrandForm'
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
            {{ updating ? 'Editar Marca' : 'Añadir Marca' }}
        </template>

        <template #description>
            {{ updating ? 'Modifica La Información De La Marca' : 'Añade Una Nueva Marca' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="brand_name" value="Nombre De La Marca"/>
                <TextInput id="brand_name" v-model="form.brand_name" type="text" autocomplete="brand_name" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.brand_name" class="mt-2 bg-opacity-0"/>
            </div>
        </template>

        <template #actions>
             <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Añadir' }}
             </PrimaryButton>
        </template>
    </FormSection>
</template>
