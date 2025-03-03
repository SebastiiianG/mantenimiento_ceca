<template>
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-cremaUAEH">
        <div class="bg-white/80 px-6 py-20 rounded-sm shadow-md">
            <div class="flex gap-x-2 pt-4 justify-center sm:pt-0 h-42 px-2 max-w-sm sm:max-w-md mb-10 ">
                <div class="flex justify-center w-20 h-auto ">
                    <slot name="logo"></slot>
                </div>
                <div class="flex-1 ">
                    <p class="text-bold text-rojoUAEH text-md sm:text-xl ">Universidad Autónoma del Estado de Hidalgo </p>
                    <p class="text-bold text-naranjaUAEH text-md sm:text-xl">Centro de Cómputo Académico</p>
                </div>
            </div>

            <div class=" sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md shadow-grisUAEH overflow-hidden rounded-lg">
                <slot />
            </div>
        </div>
    </div>
</template>
