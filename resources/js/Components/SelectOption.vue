<script setup>
import { ref, computed } from 'vue';
import TextInput from './TextInput.vue';
import InputLabel from './InputLabel.vue';

// Definir props
const { options } = defineProps({
    options: {
        type: Array,
        required: true
    }

});

// Valor de búsqueda
const searchQuery = ref("");
const showDropdown = ref(false);

// Filtra opciones basándose en el input del usuario
const filteredOptions = computed(() => {
    return options.filter(option => {
        const label = Object.values(option)[1]; // Toma el segundo valor como label
        return String(label).toLowerCase().includes(searchQuery.value.toLowerCase());
    });
});

// Maneja la selección de una opción
const selectOption = (option) => {
    searchQuery.value = Object.values(option)[1]; // Usar el segundo valor como label
    showDropdown.value = false;
};

// Maneja el foco y el blur del input
const handleFocus = () => {
    showDropdown.value = true;
};

const handleBlur = () => {
    setTimeout(() => {
        showDropdown.value = false;
    }, 200); // Pequeño retraso para permitir la selección
};

const handleChange = () => {
    showDropdown.value = true;
}
</script>

<template>
    <InputLabel for="select">
        <slot name="label"></slot>
    </InputLabel>

    <!-- Buscador -->
    <div class="relative">
        <TextInput
            id="select"
            v-model="searchQuery"
            class="w-full text-sm"
            type="text"
            placeholder="Buscar..."
            @focus="handleFocus"
            @blur="handleBlur"
            @input="handleChange"
        />

        <!-- Resultados -->
        <div
            v-if="showDropdown && filteredOptions.length"
            class="absolute w-full bg-white rounded-lg p-2 shadow mt-1"
        >
            <ul>
                <li
                    v-for="option in filteredOptions"
                    :key="Object.values(option)[0]"
                    class="cursor-pointer text-sm p-2 hover:bg-naranjaUAEH hover:text-white"
                    @mousedown.prevent="selectOption(option)"
                >
                    {{ Object.values(option)[1] }} <!-- Mostrar el segundo valor -->
                </li>
            </ul>
        </div>
    </div>
</template>
