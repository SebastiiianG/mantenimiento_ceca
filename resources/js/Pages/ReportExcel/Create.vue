<script>
    export default {
        name: 'CreateExcel'
    }
</script>

<script setup>
import { ref, watchEffect, computed } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Checkbox from '@/Components/Checkbox.vue'
import TextInput from '@/Components/TextInput.vue'
import InputLabel from '@/Components/InputLabel.vue'
import FormSection from '@/Components/FormSection.vue'
import { usePage } from '@inertiajs/vue3'
import Swal from 'sweetalert2'

// Formulario de fechas
const form = ref({
    start_date: '',
    end_date: '',
})

// Estados seleccionados
const estadosSeleccionados = ref({
    sinAsignar: false,
    enProceso: false,
    finalizado: false,
})

// Mapeo de claves internas a texto en BD
const estadoMapa = {
    sinAsignar: 'Sin asignar',
    enProceso: 'En proceso',
    finalizado: 'Finalizado',
}

// Genera la URL con parámetros
const generarURL = () => {
    const estados = Object.entries(estadosSeleccionados.value)
        .filter(([_, activo]) => activo)
        .map(([clave]) => estadoMapa[clave])

    const params = new URLSearchParams()
    estados.forEach(s => params.append('status[]', s))
    params.append('start_date', form.value.start_date)
    params.append('end_date', form.value.end_date)

    return route('orders.reportExcel') + '?' + params.toString()
}

// Mostrar errores del backend
const page = usePage()
const errorMessage = computed(() => page.props.flash?.error)

watchEffect(() => {
    if (errorMessage.value) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: errorMessage.value,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#14803c',
        }).then(() => {
            page.props.flash.error = null
        })
    }
})
</script>



<template>
    <AppLayout title="Generar Reporte Excel">
        <template #header>
            <h1 class="font-semibold text-xl text-white leading-tight"
                v-if="$page.props.user.permissions.includes('create orders')">
                Generar Reporte Excel
            </h1>
        </template>

        <FormSection >
            <template #title>
                <span>Reporte Excel</span>
            </template>

            <template #description>
                Seleccione el estado de la orden y el rango de fecha
            </template>

            <template #form>
                <div class="col-span-8 sm:col-span-8 ">
                    <!-- Fechas -->
                    <InputLabel for="end_date" value="Rango de fecha" />
                    <div class="mt-4 mb-4 ">
                        <div class="col-span-8 sm:col-span-8">
                            <InputLabel for="start_date" value="Fecha de inicio" />
                            <TextInput id="start_date" type="date" v-model="form.start_date"
                                class="mt-1 block w-full shadow-xl" />
                        </div>
                        <div class="col-span-8 sm:col-span-8 mt-4">
                            <InputLabel for="end_date" value="Fecha final" />
                            <TextInput id="end_date" type="date" v-model="form.end_date"
                                class="mt-1 block w-full shadow-xl" />
                        </div>
                    </div>
                    <!-- Checkboxes -->
                    <InputLabel value="Estado de la orden" class="mt-4" />
                    <div class="flex justify-between mt-4">
                        <div
                            v-for="(label, key) in estadoMapa"
                            :key="key"
                            class="flex items-center gap-2"
                        >
                            <Checkbox :id="key" v-model:checked="estadosSeleccionados[key]" />
                            <InputLabel :for="key">{{ label }}</InputLabel>
                        </div>
                    </div>

                </div>
            </template>

            <!-- Botón -->
            <template #actions>
                <a :href="generarURL()" target="_blank"
                    class="inline-flex items-center px-4 py-2 bg-naranjaUAEH shadow-md shadow-rojoMedioUAEH rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#c44500] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                    Exportar Excel
                </a>
            </template>

        </FormSection>
    </AppLayout>
</template>
