<script setup>
import { computed, useSlots } from 'vue';

defineEmits(['submitted']);

const hasActions = computed(() => !! useSlots().actions);
</script>

<template>
    <div class="">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto px-2 py-3 sm:px-3">
                <h1 class="text-xl font-semibold text-gray-900">
                    <slot name="title" />
                </h1>
                <p class="mt-2 text-sm text-gray-700">
                    <slot name="description" />
                </p>
            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2 shadow-lg">
            <form @submit.prevent="$emit('submitted')">
                <div
                    class="px-4 py-5 bg- sm:p-6 shadow-xl bg-white"
                    :class="hasActions ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md'"
                >
                    <div class="grid grid-cols-6 gap-6">
                        <slot name="form" />
                    </div>

                </div>

                <div v-if="hasActions" class="flex items-center justify-end px-4 py-3 bg-amarilloUAEH text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <slot name="actions" />
                </div>
            </form>
        </div>
    </div>
</template>
