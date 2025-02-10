<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};

//Array para los elementos que conforman el sidebar
const navItems = [
    { href: "#", label: "Tablero", children: [], icon: null },
    { href: "#", label: "Orden", children: [], icon: null },
    { href: "#", label: "Administracion", children: [], icon: null },
    { href: "#", label: "Usuarios", children: [], icon: null },
    { href: "#", label: "Roles", children: [], icon: null },
    { href: "#", label: "Dependencias Academicas", children: [], icon: null },
    { href: "#", label: "Marcas", children: [], icon: null },
    { href: "#", label: "Fallos", children: [], icon: null },
    { href: "#", label: "Objetos", children: [], icon: null },
    { href: "#", label: "Personas", children: [], icon: null }, //se necesita este?
]
</script>

<template>

    <Head :title="title" />
    <Banner />
    <!-- PANTALLA COMPLETA -->
    <div class="flex">
        <!-- SIDEBAR-->
        <div class="w-60 bg-white flex flex-col min-h-screen shrink-0 border-r border-gray-200 py-4">
            <!-- 01 Contenedor del logo -->
            <div class="px-4 h-8">
                <a href="#" class="inline-block">
                    <ApplicationLogo class="h-8 w-auto" />
                </a>
            </div>
            <!-- 02 Contenedor de los elementos del sidebar -->
            <div class="mb-10 mt-7 ml-4 flex flex-col gap-4 ">
                <!-- Submenu Principal -->
                <h3 class=" mt-2 text-gray-600 text-sm font-medium leading-5">Principal</h3>

                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Tablero
                </NavLink>

                <div class="hidden sm:flex" v-if="$page.props.user.permissions.includes('create orders')">
                    <NavLink :href="route('orders.index')" :active="route().current('orders.*')">
                        Gestionar Orden
                    </NavLink>
                </div>

                <!-- submenu de catalogos -->
                <h3 class=" mt-2 text-gray-600 text-sm font-medium leading-5">Administracion</h3>

                <div class="hidden sm:flex" v-if="$page.props.user.permissions.includes('create users')">
                    <NavLink :href="route('users.index')" :active="route().current('users.*')">
                        Usuarios
                    </NavLink>
                </div>

                <div class="hidden sm:flex" v-if="$page.props.user.permissions.includes('create roles')">
                    <NavLink :href="route('roles.index')" :active="route().current('roles.*')">
                        Roles
                    </NavLink>
                </div>

                <div class="hidden sm:flex" v-if="$page.props.user.permissions.includes('create dependencies')">
                    <NavLink :href="route('cgDependencies.index')" :active="route().current('cgDependencies.*')">
                        Dependencias Academicas
                    </NavLink>
                </div>

                <div class="hidden sm:flex" v-if="$page.props.user.permissions.includes('create academic areas')">
                    <NavLink :href="route('cgAcademicAreas.index')" :active="route().current('cgAcademicAreas.*')">
                        Areas Academicas
                    </NavLink>
                </div>

                <div class="hidden sm:flex" v-if="$page.props.user.permissions.includes('create brands')">
                    <NavLink :href="route('cgBrands.index')" :active="route().current('cgBrands.*')">
                        Marcas
                    </NavLink>
                </div>
                <div class="hidden sm:flex" v-if="$page.props.user.permissions.includes('create failures')">
                    <NavLink :href="route('cgKindFailures.index')" :active="route().current('cgKindFailures.*')">
                        Tipo de fallas
                    </NavLink>
                </div>

                <div class="hidden sm:flex" v-if="$page.props.user.permissions.includes('create objects')">
                    <NavLink :href="route('cgKindObjects.index')" :active="route().current('cgKindObjects.*')">
                        Tipo de dispositivos
                    </NavLink>
                </div>

                <div class="hidden sm:flex" v-if="$page.props.user.permissions.includes('create persons')">
                    <NavLink :href="route('cgKindPeople.index')" :active="route().current('cgKindPeople.*')">
                        Tipo de personas
                    </NavLink>
                </div>
            </div>
        </div>
        <!-- LAYOUT DERECHO -->
        <div class="w-full">
            <!-- HEADER -->
            <div class="bg-white border-b border-gray-100 py-4 px-6 size-16 w-full">

                    <div class="w-1/6 pl-20">
                        <Dropdown align="right" width="48">
                        <template #trigger>
                            <button v-if="$page.props.jetstream.managesProfilePhotos"
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="size-8 rounded-full object-cover"
                                    :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                            </button>

                            <span v-else class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ $page.props.auth.user.name }}

                                    <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Account
                            </div>

                            <DropdownLink :href="route('profile.show')">
                                Profile
                            </DropdownLink>

                            <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                API Tokens
                            </DropdownLink>

                            <div class="border-t border-gray-200" />

                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <DropdownLink as="button">
                                    Log Out
                                </DropdownLink>
                            </form>
                        </template>
                    </Dropdown>
                    </div>


            </div>
            <!-- CONTENIDO -->
            <div>
                <main class="bg-gray-100 w-full min-h-screen p-6">
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
