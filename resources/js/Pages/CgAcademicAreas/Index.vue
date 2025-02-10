<script>
export default {
    name: 'CgAcademicAreasIndex'
}
</script>
<script setup>
//Importa la plantilla desde app layout
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    cgAcademicAreas:{
        type: Object,
        required: true
    }
})

</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Catálogo de Áreas Académicas
            </h1>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between">
                            <Link class="text-white bg-[#511013] py-2 px-4 rounded" :href="route('cgAcademicAreas.create')">
                                Añadir Área Académica
                            </Link>
                        </div>
                    </div>

                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">
                            <li class="flex justify-between gap-x-6 py-5" v-for="cgAcademicArea in cgAcademicAreas.data">

                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm/6 font-semibold text-gray-900">{{ cgAcademicArea.area_name }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <Link class="text-sm/6 text-gray-900" :href="route('cgAcademicAreas.create', cgAcademicArea.id)">Editar</Link>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <Link @click="deleteUser(cgAcademicArea.id)" class="text-sm/6 text-gray-900"
                                    >Eliminar</Link>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </template>
    </AppLayout>
</template>
