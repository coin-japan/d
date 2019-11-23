<template>
    <div class="contact-section-wrapper">
        <div class="contact-form-wrapper">
            <div class="contact-form-background" v-lazy:background-image="'/images/home-bg/bg-contact-form.jpg'"></div>
            <div class="form-container">
                <h3 class="contact-form-title">{{ $t('contact-us-form-title') }}</h3>
                <form @submit.prevent="onSubmit()">
                    <div v-on:click="showCloseSelect" class="contact-form-control select-desctop" v-bind:class="{ open : isSelectShown}">
                        <span v-if="inquaryType == 0">{{ $t('select-label') }}</span>
                        <span v-if="inquaryType == 1">{{ $t('select-artist-option') }}</span>
                        <span v-if="inquaryType == 2">{{ $t('select-promouter-option') }}</span>
                        <span v-if="inquaryType == 3">{{ $t('select-manager-option') }}</span>
                        <span v-if="inquaryType == 4">{{ $t('select-other-option') }}</span>
                        <ul>
                            <li v-on:click="inquaryType = 1">{{ $t('select-artist-option') }}</li>
                            <li v-on:click="inquaryType = 2">{{ $t('select-promouter-option') }}</li>
                            <li v-on:click="inquaryType = 3">{{ $t('select-manager-option') }}</li>
                            <li v-on:click="inquaryType = 4">{{ $t('select-other-option') }}</li>
                        </ul>
                    </div>
                    <span class="select-mobile">
                        <select class="contact-form-control" :disabled="isFormDisabled">
                            <option value="" disabled selected>{{ $t('select-label') }}</option>
                            <option value="1">{{ $t('select-artist-option') }}</option>
                            <option value="2">{{ $t('select-promouter-option') }}</option>
                            <option value="3">{{ $t('select-manager-option') }}</option>
                            <option value="4">{{ $t('select-other-option') }}</option>
                        </select>
                    </span>
                    
                    <input 
                        :disabled="isFormDisabled"
                        v-model="email"
                        class="contact-form-control" 
                        :class="{ error: isEmailTouched && (!isEmailExists || !isEmailValid) }"
                        type="text" 
                        @blur="isEmailTouched = true"
                        :placeholder="$t('input-email')" 
                        autocomplete="new-password">
                    <div class="error-message">
                        <span v-if="isEmailTouched && !isEmailExists">{{ $t('input-email-required-error') }}</span>
                        <span v-if="isEmailTouched && isEmailExists && !isEmailValid">{{ $t('input-email-invalid-error') }}</span>
                    </div>    
                    <input
                        :disabled="isFormDisabled"
                        v-model="phone"
                        class="contact-form-control" 
                        type="text" 
                        :placeholder="$t('input-phone')" 
                        autocomplete="new-password"> 
                    <input 
                        :disabled="isFormDisabled"
                        v-model="name" 
                        class="contact-form-control" 
                        :class="{ error: isNameTouched && !isNameExists }"
                        type="text" 
                        @blur="isNameTouched = true"
                        :placeholder="$t('input-name')" 
                        autocomplete="new-password">
                    <div class="error-message">
                        <span v-if="isNameTouched && !isNameExists">{{ $t('input-name-required-error') }}</span>
                    </div>  
                    <textarea 
                        :disabled="isFormDisabled"
                        v-model="message"
                        @blur="isMessageTouched = true"
                        :placeholder="$t('textarea-text')" 
                        class="contact-form-control" 
                        :class="{ error: isMessageTouched && !isMessageExists }"
                        autocomplete="new-password"></textarea>
                    <div class="error-message">
                        <span v-if="isMessageTouched && !isMessageExists">{{ $t('textarea-text-requires-error')}}</span>
                        <span v-if="isMessageSent" class="success-note">
                            {{ $i18n.locale == 'en' ? 'Your message sent successfuly. Thank you.' : 'お問い合わせを受け付けました。後程担当者よりご連絡させていただきます。' }}
                        </span>
                    </div>    
                    <button :disabled="isFormDisabled" class="contact-form-control">
                        {{ isFormDisabled ? 'Message sent' : 'Send message' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import CustomSwipe from './../../swipe';
const emailCheckRegex = /\S+@\S+\.\S+/;
export default {
    data() {
        return {
            isMessageSent: false,
            isSentError: false,

            actvieIndex: 0,
            isSelectShown: false,
            inquaryType: 0,

            email: null,
            name: null,
            message: null,
            phone: null,
            isEmailTouched: false,
            isNameTouched: false,
            isMessageTouched: false,

            isFormDisabled: false
        }
    },    
    methods: {
        hasValue(val) {
            return val !== null && val !== undefined && val !== '';
        },
        showCloseSelect(event) {
            
            if (this.isFormDisabled) { return; }
            
            event.stopPropagation();
            
            this.isSelectShown = !this.isSelectShown;
        },
        onSubmit() {
            this.isEmailTouched = true;
            this.isNameTouched = true;
            this.isMessageTouched = true;

            if(! this.isFormValid()) {
                return;
            }

            const successHand = () => {
                this.isMessageSent = true;
                
                this.isEmailTouched = false;
                this.isNameTouched = false;
                this.isMessageTouched = false;

                this.inquaryType = 0;
                this.email = null;
                this.name = null;
                this.message = null;
                this.phone =  null;
                this.isFormDisabled = true;
            }

            this.$http({ url: 'contact', method: "POST", data: {
                name: this.name,
                email: this.email,
                phone: this.phone,
                text: this.message,
                type: this.inquaryType
            }})
            .then(successHand)
            .catch(error => this.isSentError = true);
        },
        isFormValid() {
            return this.isEmailExists &&
                   this.isEmailValid &&
                   this.isNameExists &&
                   this.isMessageExists; 
        }
    },
    computed: {
        isEmailExists() {
            return this.hasValue(this.email);
        },
        isNameExists() {
            return this.hasValue(this.name);
        },
        isMessageExists() {
            return this.hasValue(this.message);
        },
        isEmailValid() {
            return emailCheckRegex.test(this.email);
        }
    },
    mounted() {
        document.addEventListener('click', () => { this.isSelectShown = false });
    }
}
</script>
<style lang="scss">
    @import './../../../sass/app';

    .contact-section-wrapper {
        height: inherit;
    }

    .contact-form-wrapper {
        position: relative;
        width: 100%;
        height: inherit;
    }

    .contact-form-background {
        position: absolute;
        top:0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
        background-position: center center;
        background-repeat: no-repeat;
        @include background-size(cover);
        
        &::after {
            content:'';
            position: absolute;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-color: $blue-dark;
            @include opacity(.7);
            z-index: 2;
        }

        &::before {
            content:'';
            position: absolute;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-image: url('/images/effects/color_cover.svg');
            @include background-size(cover);
            @include opacity(.2);
            z-index: 3;
        }
    }

    .form-container {
        position: absolute;
        top:0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    }

    .contact-form-title {
        color: $white;
        @include font-size($section-header-font-size);
        margin-bottom: 30px;
    }

    .error-message {
        text-align: left;
        width: 350px;
        padding-left: 20px;

        span {
            color: red;
            @include font-size(12px);
        }

        .success-note {
            color: green;
        }
    }

    .contact-form-control {
        background-color: transparent;
        color: $gray-light;
        outline: none;
        border: none;
        width: 350px;
        border: 1px solid rgb(126, 124, 124);
        padding: 7px 19px 9px;
        border-radius: 90px;
        margin: 7px 0;

        &.error {
            border-color: red;
            margin-bottom: 0;
        }
    }

    .contact-form-control {
        display: block;
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;

        option {
            display: block;
            background-color: transparent;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
        }
    }

    textarea.contact-form-control {
        border-radius: 30px;
        resize: none;
        height: 150px;
    }

    button.contact-form-control {
        @extend .gold-button;
        width:auto;
        margin-top: 20px;

        &:disabled {
            text-decoration:none;
            background-color: #AAA69E;
        }
    }

    div.contact-form-control {
        position: relative;

        span {
            color: rgb(126, 124, 124);
        }

        ul {
            display: none;
        }

        &.open {
            background-color: rgba(30, 36, 55, .9);

            ul {
                background-color: rgba(30, 36, 55, .9);
                @extend .contact-form-control;
                position: absolute;
                display:block;
                width: inherit;
                border-radius: 15px;
                top: 38px;
                left: -1px;
                padding: 0;

                li {
                     color: rgb(126, 124, 124);
                     padding: 10px 20px;
                    
                     
                     &:hover {
                         background-color: rgba(255, 255, 255, .4);
                         color: #fff;
                     }

                    &:first-child {
                        border-top-left-radius: 14px;
                        border-top-right-radius: 14px;
                     }

                     &:last-child {
                        border-bottom-left-radius: 14px;
                        border-bottom-right-radius: 14px;
                     }
                }
            }

            &::after {
                top: 20px;
                @include transform(rotate(225deg));
            }
        }

        &::after {
            content: "";
            display: block;
            position: absolute;
            height: 6px;
            width: 6px;
            top: 15px;
            right:21px;
            border-right: 2.3px solid $gray-light;
            border-bottom: 2.3px solid $gray-light;
            z-index: 2;
            
            @include transform(rotate(45deg));
            @include transition(.3s ease-in-out);
        }
    }

    .contact-form-control:focus {
        border-color: $gold;
    }

    .photo-list-wrapper-mobile {
        display: none;
        overflow: hidden;
        width: 100%;
        position: relative;
        left: 50%;
        margin-left: -145px;
        overflow-y: auto;
        padding-bottom: 50px; 

        .photo-section-link {
            display: inline-block;
            width: auto;
        }
    }

    .select-mobile {
        display: none;
        position: relative;

        select {
            color: rgb(126, 124, 124);
        }
        
         &::after {
            content: "";
            display: block;
            position: absolute;
            height: 6px;
            width: 6px;
            top: 33px;
            right:28px;
            border-right: 2.3px solid $gray-light;
            border-bottom: 2.3px solid $gray-light;
            z-index: 2;
        
            @include transform(rotate(45deg));
            @include transition(.3s ease-in-out);
        }
    }


    // Extra small devices (portrait phones, less than 576px)
    @media (max-width: 575.98px) { 

        .contact-form-background {
            &::before {
                display: none;
            }
        }

        .select-desctop{
            display:none;
        }

        .select-mobile {
            display: block;
        }

        .contact-section-wrapper {
            display: block;
        }

        .contact-form-title {
            @include font-size(34px);
        }

        .contact-form-control {
            background-color: transparent;
            color: $gray-light;
            outline: none;
            border: none;
            width: 350px;
            border: 1px solid rgb(126, 124, 124);
            padding: 17px 19px 19px;
            border-radius: 90px;
            margin: 7px 0;
        }

        textarea.contact-form-control {
            border-radius: 30px;
            resize: none;
            height: 100px;
        }

        button.contact-form-control {
            @extend .gold-button;
            width:auto;
            margin-top: 20px;
            padding: 16px 76px 18px;
            @include font-size(16px);
        }
    }

    // Small devices (landscape phones, 576px and up)
    @media (min-width: 576px) and (max-width: 767.98px) {

    }

    // Medium devices (tablets, 768px and up)
    @media (min-width: 768px) and (max-width: 991.98px) {

    }

    // Large devices (desktops, 992px and up)
    @media (min-width: 992px) and (max-width: 1199.98px) {

    }

    // Extra large devices (large desktops, 1200px and up)
    @media (min-width: 1200px) { 

    }

</style>
