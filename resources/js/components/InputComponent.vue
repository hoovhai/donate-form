<template>
    <div class="form-input">
        <label class="required">{{label}}</label>
        <input 
            :type="type" 
            :maxlength="maxlength"
            :value="modelValue"
            @input="updateInput"
            :placeholder="placeholder"
        />
    </div>
</template>

<script>
export default {
    props: {
        modelValue: String,
        label: String,
        placeholder: String,
        type: {
            type: String,
            default: 'text'
        },
        maxlength: {
            type: String,
            default: null
        },
    },
    methods: {
        updateInput(event) {
            this.$emit("update:modelValue", event.target.value);
        }
    }
}
</script>

<style scoped>

</style>