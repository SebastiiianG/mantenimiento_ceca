<script setup>
import { computed } from 'vue';

/**
 * Emite 'update:modelValue' al cambiar la selección
 */
const emit = defineEmits(['update:modelValue']);

/**
 * Define props para soportar v-model con 'modelValue'
 */
const props = defineProps({
    modelValue: {
        type: [String, Number, Boolean],
        default: null,
    },
    value: {
        type: [String, Number, Boolean],
        default: null,
    },
    name: {
        type: String,
        default: '',
    },
    id: {
        type: String,
        default: '',
    },
});

/**
 * Computed que hace de proxy entre modelValue y el input
 */
const proxyValue = computed({
    get() {
        return props.modelValue;
    },
    set(val) {
        emit('update:modelValue', val);
    },
});
</script>

<template>
    <!--
    'type="radio"'
    ':value="value"' => valor que representa este radio
    'v-model="proxyValue"' => enlaza con modelValue en el padre
    -->
    <input :id="id" :name="name" type="radio" v-model="proxyValue" :value="value"
        class="border-gray-300 text-naranjaUAEH shadow-sm focus:ring-naranjaUAEH">
</template>
