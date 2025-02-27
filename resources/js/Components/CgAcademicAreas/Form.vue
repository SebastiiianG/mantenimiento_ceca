<script>
    export default {
        name: 'CgAcademicAreaForm'
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
        },
        cgDependencies: {
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
            {{ updating ? 'Editar Área Académica' : 'Añadir Área Académica' }}
        </template>

        <template #description>
            {{ updating ? 'Modifica La Información Del Área Académica' : 'Añade Una Nueva Área Académica' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="area_name" value="Nombre Del Área Académica"/>
                <TextInput id="area_name" v-model="form.area_name" type="text" autocomplete="area_name" class="mt-1 block w-full shadow-xl"/>
                <InputError :message="$page.props.errors.area_name" class="mt-2 bg-opacity-0"/>
            </div>
            <div class="col-span-6 sm:col-span-6 bg-transparent bg-opacity-0">
                <InputLabel for="cg_dependency_id" id="cg_dependency_id" value="Dependencia"/>
                <select name="cg_dependency_id" id="cg_dependency_id" v-model="form.cg_dependency_id" class="bg-blancoDropdown mt-1 block w-full p-2 border-gray-300 rounded-lg shadow-md text-sm focus:border-naranjaUAEH focus:ring-naranjaUAEH" >
                    <option v-for="cgDependency in cgDependencies" :value="cgDependency.id" class="whitespace-normal break-words">{{ cgDependency.dependency_name }}
                    </option>
                </select>
                <InputError :message="$page.props.errors.cg_dependency_id" class="mt-2 bg-opacity-0"/>

            </div>
        </template>



        <template #actions>
             <PrimaryButton>
                {{ updating ? 'Actualizar' : 'Añadir' }}
             </PrimaryButton>
        </template>
    </FormSection>
</template>
