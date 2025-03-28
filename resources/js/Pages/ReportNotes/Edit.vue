<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

// Recibir las notas del controlador
const props = defineProps({
    notes: String
});

// Crear formulario reactivo con los datos recibidos
const form = useForm({
    notes: props.notes || ''
});

// Función para enviar el formulario
const submit = () => {
    form.post(route('orders.reportNotes.update'), {
        preserveScroll: true,   // Mantener la posición del scroll
    });
};
</script>

<template>
    <AppLayout title="Editar Notas del Reporte">
        <div class="max-w-4xl mx-auto  p-6 mt-6 ">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Notas del Reporte</h1>

            <form @submit.prevent="submit">
                <div class="mt-4">
                    <label for="notes" class="block text-gray-700 font-medium mb-2">Describa las notas que irán al final del reporte, mismas que darán indicaciones específicas al usuario</label>

                    <div class="bg-gray-50 p-4 border border-gray-300 sm:p-6 shadow-xl sm:rounded-tl-md sm:rounded-tr-md">
                        <textarea id="notes" v-model="form.notes"
                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-amarilloUAEH"
                            rows="6"></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-amarilloUAEH text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <PrimaryButton type="submit">Guardar Notas</PrimaryButton>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
