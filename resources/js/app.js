require('./bootstrap');
import { createApp } from "vue";
import InputComponent from './components/InputComponent.vue';
import MonthPickerInput from 'vue-month-picker'
import FormCreateComponent from './components/FormCreateComponent.vue'
import axios from 'axios'

export const HTTP = axios.create({
    baseURL: `http://localhost:8120/`,
    headers: {
        // Authorization: 'Bearer {token}'
    }
})

createApp({
    components: {
        InputComponent,
        MonthPickerInput,
        FormCreateComponent
    }
}).mount('#app')