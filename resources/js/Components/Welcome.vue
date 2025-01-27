<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Container from './Container.vue';
</script>

<template>
    <Container></Container>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <slot></slot>
                </div>
            </div>
        </div>

        <!-- <button v-if="$page.props.user.permissions.includes('create roles')">
            Gestionar Roles
        </button>
        <button v-if="$page.props.user.permissions.includes('create academic areas')">
            Gestionar Áreas Académicas
        </button>
        <button v-if="$page.props.user.permissions.includes('create dependencies')">
            Gestionar Dependencias
        </button>
        <button v-if="$page.props.user.permissions.includes('create brands')">
            Gestionar Marcas
        </button>
        <button v-if="$page.props.user.permissions.includes('create objects')">
            Gestionar Tipo de Dispositivos
        </button>
        <button v-if="$page.props.user.permissions.includes('create orders')">
            Gestionar Órdenes
        </button>
        <button v-if="$page.props.user.permissions.includes('create failures')">
            Gestionar Tipos de Falla
        </button>
        <button v-if="$page.props.user.permissions.includes('create persons')">
            Gestionar Tipos de Personas
        </button>
        <button v-if="$page.props.user.permissions.includes('create users')">
            Gestionar Usuarios
        </button> -->
</template>
