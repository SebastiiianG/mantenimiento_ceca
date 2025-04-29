<script setup>
import { ref, onMounted } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);


const logout = () => {
    router.post(route('logout'));
};

const open = ref(false);
</script>

<template>

    <Head :title="title" />
    <Banner />
    <!-- PANTALLA COMPLETA -->
    <div class="flex items-start relative"  >
        <!-- SIDEBAR-->
        <div :class="open ? 'w-48 fixed z-50' : 'w-12'"
            class="fixed md:w-1/5 bg-white flex flex-col min-h-screen border-r border-gray-200 py-4 md:sticky top-0 items-start">

            <!-- 01 Contenedor del logo -->
            <div
                class="ml-3 md:px-4 max-w-full md:max-h-20 lg:max-h-36 flex items-center justify-center ">
                <a href="#" class="hidden md:inline-block ">
                    <img src="../Components/icon/cecaLogo.png" alt="" class="object-contain">
                </a>
                <button @click="open = !open" class="md:hidden text-gray-800 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                </button>
            </div>
            <!-- 02 Contenedor de los elementos del sidebar -->
            <div class="mb-10 mt-4 ml-1 mr-2 md:ml-2 flex flex-col gap-4 ">
                <!-- Submenu Principal -->
                <h3 class="hidden md:block md:mt-2 md:text-gray-600 md:text-sm md:font-medium md:leading-5">Principal
                </h3>

                <div>
                    <NavLink class=" md:block md:flex md:flex-row md:gap-2" :href="route('dashboard')"
                        :active="route().current('dashboard')">
                        <span class="justify-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                            </svg>
                        </span>
                        <p  :class="open ? 'block ml-2' : 'hidden'" class="md:block">Tablero</p>
                    </NavLink>
                </div>


                <div v-if="$page.props.user.permissions.includes('read orders')">
                    <NavLink class="md:block md:flex md:flex-row md:gap-2" :href="route('orders.index')"
                        :active="route().current('orders.*')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>

                        </span>

                        <span  :class="open ? 'block ml-2' : 'hidden'" class="md:block">
                            Gestionar Orden
                        </span>
                    </NavLink>
                </div>

                <!-- submenu de catalogos -->
                <h3 class="hidden md:block md:mt-2 md:text-gray-600 md:text-sm md:font-medium md:leading-5">
                    Administración
                </h3>

                <div v-if="$page.props.user.permissions.includes('read users')">

                    <NavLink class="md:block md:flex md:flex-row md:gap-2" :href="route('users.index')"
                        :active="route().current('users.*')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>

                        </span>
                        <span  :class="open ? 'block ml-2' : 'hidden'" class="md:block">
                            Usuarios
                        </span>
                    </NavLink>
                </div>

                <div v-if="$page.props.user.permissions.includes('read dependencies')">
                    <NavLink class=" md:block md:flex md:flex-row md:gap-2" :href="route('cgDependencies.index')"
                        :active="route().current('cgDependencies.*')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                            </svg>
                        </span>
                        <span  :class="open ? 'block ml-2' : 'hidden'" class="md:block">
                            Dependencias Universitarias
                        </span>
                    </NavLink>
                </div>

                <div v-if="$page.props.user.permissions.includes('read academic areas')">
                    <NavLink class=" md:block md:flex md:flex-row md:gap-2" :href="route('cgAcademicAreas.index')"
                        :active="route().current('cgAcademicAreas.*')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>

                        </span>
                        <span  :class="open ? 'block ml-2' : 'hidden'" class="md:block">
                            Áreas Académicas
                        </span>
                    </NavLink>
                </div>

                <div v-if="$page.props.user.permissions.includes('read brands')">
                    <NavLink class=" md:block md:flex md:flex-row md:gap-2" :href="route('cgBrands.index')"
                        :active="route().current('cgBrands.*')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>


                        </span>
                        <span  :class="open ? 'block ml-2' : 'hidden'" class="md:block">Marcas</span>
                    </NavLink>
                </div>
                <div v-if="$page.props.user.permissions.includes('read failures')">
                    <NavLink class=" md:block md:flex md:flex-row md:gap-2" :href="route('cgKindFailures.index')"
                        :active="route().current('cgKindFailures.*')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                            </svg>

                        </span>
                        <span  :class="open ? 'block ml-2' : 'hidden'" class="md:block">
                            Fallas
                        </span>
                    </NavLink>
                </div>
                <div v-if="$page.props.user.permissions.includes('read objects')">
                    <NavLink class=" md:block md:flex md:flex-row md:gap-2" :href="route('cgKindObjects.index')"
                        :active="route().current('cgKindObjects.*')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                            </svg>

                        </span>
                        <span  :class="open ? 'block ml-2' : 'hidden'" class="md:block">
                            Dispositivos
                        </span>
                    </NavLink>
                </div>
                <div v-if="$page.props.user.permissions.includes('read persons')">
                    <NavLink class=" md:block md:flex md:flex-row md:gap-2" :href="route('cgKindPeople.index')"
                        :active="route().current('cgKindPeople.*')">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>

                        </span>
                        <span  :class="open ? 'block ml-2' : 'hidden'" class="md:block">
                            Personas
                        </span>
                    </NavLink>
                </div>
            </div>
        </div>
        <!-- LAYOUT DERECHO -->
        <div class="flex-grow min-w-0 overflow-x-hidden ml-12 md:ml-0 " >
            <!-- HEADER -->
            <div
                class="bg-rojoOscuroUAEH border-b border-rojoOscuroUAEH py-4 px-6 size-16 w-full flex items-center justify-between">
                <!-- TODO: que este alineado a la derecha -->
                <div class="flex justify-end ml-auto relative z-50">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                           <!--  <button v-if="$page.props.jetstream.managesProfilePhotos"
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="size-8 rounded-full object-cover"
                                    :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                            </button> -->

                            <span class="inline-flex rounded-md">
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
                                Administrar Cuenta
                            </div>

                            <DropdownLink :href="route('profile.show')">
                                Perfil
                            </DropdownLink>

                            <!-- <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                API Tokens
                            </DropdownLink> -->

                            <div class="border-t border-gray-200" />

                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <DropdownLink as="button">
                                    Cerrar Sesión
                                </DropdownLink>
                            </form>
                        </template>
                    </Dropdown>
                </div>


            </div>
            <!-- CONTENIDO -->
            <div>
                <!-- Page Heading -->
                <header v-if="$slots.header" class="bg-rojoMedioUAEH shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>
                <main class="bg-cremaUAEH w-full min-h-screen p-6">
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
