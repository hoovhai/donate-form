<template>
    <div id="success">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Great!</strong> You are donate successfully!
        </div>
    </div>
    <div id="errors">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p> <strong> Sorry ! Something went wrong </strong> </p>
            <div id="message-error" > 
                <p v-for="(message, index) in errors" :key="index">
                    {{ message }}
                </p>
            </div>
        </div>
    </div>
    <div id="popup-background">

    </div>
    <form method="POST" class="register-form" id="register-form">
        <div class="form-row">
            <div class="form-group">
                <InputComponent v-model="firstName" label='First Name' placeholder='First Name' />
                <InputComponent v-model="lastName" label='last Name' placeholder='Last Name' />
                <InputComponent v-model="company" label='Company' placeholder='Compay' />
                <InputComponent v-model="email" label='Email' placeholder='Email' />
                <InputComponent v-model="phoneNumber" maxlength="12" label='Phone number' placeholder='09-0909-0909' />
            </div>
            <div class="form-group">
                <div class="form-select">
                    <div class="label-flex">
                        <label for="meal_preference" class="required">Gender</label>
                    </div>
                    <div class="select-list form-input">
                        <select name="gender" id="selectGender" v-model="gender">
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-radio">
                    <div class="label-flex">
                        <label for="payment" class="required">Payment Mode</label>
                    </div>
                    <div class="form-radio-group">
                        <div class="form-radio-item">
                            <input type="radio" name="payment" id="cash" checked value="1" @click="checked(1)">
                            <label for="cash">Visa</label>
                            <span class="check"></span>
                        </div>
                        <div class="form-radio-item">
                            <input type="radio" name="payment" id="cheque" value="2" @click="checked(2)">
                            <label for="cheque">Mastercard</label>
                            <span class="check"></span>
                        </div>
                        <div class="form-radio-item">
                            <input type="radio" name="payment" id="demand" value="3" @click="checked(3)">
                            <label for="demand">Amex</label>
                            <span class="check"></span>
                        </div>
                    </div>
                </div>
                <div class="form-input">
                    <label for="card_number" class="required">Card Number</label>
                    <input v-model="ccNumber" @input="formatCardNumber" type="text" name="card_number" id="card_number" placeholder="1111-1111-1111-1111"/>
                </div>
                <div id="expiration_date" class="form-input">
                    <label for="expiration_date" class="required">Expiration</label>
                    <month-picker-input @change="showDate"></month-picker-input>
                </div>
                <InputComponent v-model="cvn" type="password" maxlength="3" label='CVN' placeholder='***' />
            </div>
        </div>
        <div class="donate-us">
            <label class="required">Donate us</label>
            <div class="price_slider ui-slider ui-slider-horizontal">
                <div id="slider-margin"></div>
                <span class="donate-value" id="value-lower"></span>
            </div>
        </div>
        <div class="form-submit">
            <input type="button" @click="submit()" value="Submit" class="submit" id="submit" name="submit" />
            <input type="button" @click="clearForm()" value="Reset" class="submit" id="reset" name="reset">
        </div>
    </form>
</template>

<script>
import InputComponent from './InputComponent.vue'
import { MonthPicker } from 'vue-month-picker'
import { MonthPickerInput } from 'vue-month-picker'
import {HTTP} from '../app.js'

export default {
    components: {
        InputComponent,
        MonthPicker,
        MonthPickerInput
    },
    data() {
        return {
            errors: [],
            firstName: '',
            lastName: '',
            email: '',
            company: '',
            phoneNumber: '',
            gender: '',
            ccNumber: '',
            cvn: '',
            ccYear: '',
            ccMonth: '',
            amount: '',
            creditMethod: 1,
        }
    },
    computed: {
        formatCardNumber() {
            if (this.ccNumber !== null && this.ccNumber.length >= 4) {
                this.ccNumber = this.ccNumber
                .replace(/-/g, '')
                .match(/.{1,4}/g)
                .join('-')
                .slice(0, 19)
            }
        }
    },
    methods: {
        submit () {
            const amount = document.getElementsByClassName('noUi-tooltip')
            const data = {
                "first_name"        : this.firstName,
                "last_name"         : this.lastName,
                "email"             : this.email,
                "phonenumber"       : this.phoneNumber,
                "company"           : this.company,
                "gender"            : this.gender,
                "credit_method"     : this.creditMethod,
                "card_number"       : this.ccNumber,
                "expiration_date"   : this.ccMonth,
                "expiration_year"   : this.ccYear,
                "cvn"               : this.cvn,
                "amount"            : amount[0].innerText,
            }
            const success = document.getElementById("success")
            const errors = document.getElementById("errors")

            HTTP.post(`donate`, data)
                    .then(response => {
                        this.clearForm()
                        this.openPopup(success)
                    })
                    .catch(e => {
                        this.getMessageErrors(e.response.data.errors)
                        this.openPopup(errors)
                    })
        },
        checked (creditMethod) {
            this.creditMethod = creditMethod
        },
        showDate(e) {
            this.ccMonth = e.monthIndex
            this.ccYear = e.year
        },
        changeGender (gender) {
            console.log(gender)
            this.gender = gender
        },
        clearForm() {
            this.firstName      = '',
            this.lastName       = '',
            this.email          = '',
            this.phoneNumber    = '',
            this.company        = '',
            this.gender         = '',
            this.creditMethod   = '',
            this.ccNumber       = '',
            this.ccMonth        = '',
            this.ccYear         = '',
            this.cvn            = '',
            this.amount         = ''
        },
        getMessageErrors(data) {
            this.errors = []
            for (const message in data) {
                this.errors.push(data[message][0])
            }
        },
        openPopup(taget) {
            const popup = document.getElementById("popup-background")
            popup.classList.add("popup-add-open");
            taget.classList.add("popup-add-open");
        }
    }
}
</script>

<style>
#expiration_date .month-picker-input {
    padding: 14px;
}
#expiration_date .month-picker__container {
    position: relative !important;
    top: 0em !important;
}
#selectGender {
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    border: 1px solid #ebebeb;
    padding: 16px 20px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    font-size: 14px;
    font-family: 'Poppins';
}
.select-list {
    margin-bottom: 8px !important;
}
#errors p {
    color:black
}
#errors strong {
    font-size: 17px;
}
</style>