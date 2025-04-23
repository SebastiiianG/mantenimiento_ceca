<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <Head title="Welcome" />
    <div class="bg-gradient-to-b from-[#841816] to-[#202020]">
        <div
            class="relative min-h-screen flex flex-col items-center justify-between selection:bg-[#FF2D20] selection:text-white">
            <div class="relative min-h-screen w-full max-w-2xl px-6 lg:max-w-7xl flex flex-col justify-between" >
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2 ">
                        <img src="../Components/icon/cecaLogo.png" alt="Logo CECA">
                    </div>
                    <nav v-if="canLogin" class="fixed top-0 right-0 z-50 m-4">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                        </Link>
                        <template v-else>
                            <Link :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Iniciar Sesión
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-4 flex-1">
                    <div
                        class="flex flex-col text-center justify-center items-center gap-6 overflow-hidden rounded-lg text-white p-6 lg:p-10 lg:pb-10">
                        <h2 class="text-bold text-lg ">Bienvenidos al área de mantenimiento del Centro de Cómputo
                            Académico</h2>

                        <div class="mt-2 justify-center items-center text-center text-sm text-gray-300">
                            <p class="">Inicie sesion para realizar una orden.</p>
                            <p class="">Recuerde que debe entregar su dispositivo en las instalaciones.</p>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Universidad Autónoma del Estado de Hidalgo
                </footer>
            </div>
        </div>
    </div>
</template>
