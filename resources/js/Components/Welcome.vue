<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <button v-if="$page.props.user.permissions.includes('create roles')">
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
        </button>
    </div>
</template>

<style>
button{
    background-color: green;
    color: white;
    padding: 20px;
    margin: 5px;
    border-radius: 5px;
}

</style>
