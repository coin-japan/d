<template>
    <div>
        <scrollactive :modify-url="false" :offset="90"  active-class="active-nav-item" :duration="600" bezier-easing-value=".5,0,.35,1" class="nav-panel-dark">
            <div class="nav-menu-mobile" v-bind:class="{ 'open': isMenuShown }">
                <ul class="pages">
                    <li><a v-on:click="onItemChangeClick" class="scrollactive-item" href="#home">Home</a></li>
                    <li><a v-on:click="onItemChangeClick" class="scrollactive-item" href="#digital">Digital</a></li>
                    <li><a v-on:click="onItemChangeClick" class="scrollactive-item" href="#celebrities-brands">Celebrities/Brands</a></li>
                    <li><a v-on:click="onItemChangeClick" class="scrollactive-item" href="#offices">Locations</a></li>
                    <li><a v-on:click="onItemChangeClick" class="scrollactive-item" href="#services">Services</a></li>
                    <li><a v-on:click="onItemChangeClick" class="scrollactive-item" href="#insta">Instagram</a></li>
                    <li><a v-on:click="onItemChangeClick" class="scrollactive-item contact" href="#contact">Contact us</a></li>
                </ul>
                <div class="nav-mobile-footer">
                    <ul class="social-links">
                        <li><a target="_blank" href="//www.instagram.com/dnd.promotion/"><span class="insta-icon" v-lazy:background-image="'/images/icons/insta-icon.svg'"></span></a></li>
                        <li><a target="_blank" href="//www.facebook.com/dnd.promotion/"><span class="fb-icon" v-lazy:background-image="'/images/icons/fb-icon.svg'"></span></a></li>
                    </ul>
                    <div class="mobile-lang-container">
                        <select v-on:change="switchLangMobile($event)">
                            <option value="en">Eng</option>
                            <option value="jp">Jpn</option>
                        </select>
                    </div>
                </div>
            </div>
        </scrollactive><!-- Mobile -->

        <scrollactive :modify-url="false" :offset="90"  active-class="active-nav-item" :duration="600" bezier-easing-value=".5,0,.35,1" class="nav-panel-dark">
            <div class="nav-wrapper">
                <div class="nav-logo-pages">
                    <a class="logo scrollactive-item" v-lazy:background-image="'/images/icons/logo-and-title.png'" href="#home"></a>
                    <ul class="pages">
                        <li><a class="scrollactive-item active-nav-item" href="#home">Home</a></li>
                        <li><a class="scrollactive-item" href="#digital">Digital</a></li>
                        <li><a class="scrollactive-item" href="#celebrities-brands">Celebrities/Brands</a></li>
                        <li><a class="scrollactive-item" href="#offices">Locations</a></li>
                        <li><a class="scrollactive-item" href="#services">Services</a></li>
                        <li><a class="scrollactive-item" href="#insta">Instagram</a></li>
                    </ul>
                </div>
                <div class="nav-social-lang-contact">
                    <ul class="social-links">
                        <li><a target="_blank" href="//www.instagram.com/dnd.promotion/"><span class="insta-icon" v-lazy:background-image="'/images/icons/insta-icon.svg'"></span></a></li>
                        <li><a target="_blank" href="//www.facebook.com/dnd.promotion/"><span class="fb-icon" v-lazy:background-image="'/images/icons/fb-icon.svg'"></span></a></li>
                    </ul>
                    <div class="lang-select-wrapper">
                        <div v-on:click="langOpenClose" class="curr-lang" v-bind:class="{ 'active' : langSelectOpen }">
                            <span>{{ lang }}</span>
                            <ul>
                                <li v-if="lang == 'Eng'" v-on:click="lang = 'Jpn'; switchLang('jp')">Jpn</li>
                                <li v-if="lang == 'Jpn'" v-on:click="lang = 'Eng'; switchLang('en')">Eng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="contact-wrapper">
                        <a v-bind:class="{ 'open': isMenuShown }" class="scrollactive-item" href="#contact">Contact us</a>
                    </div>
                </div>
                <div class="menu-control" v-on:click="onMobileMenuShow"  v-bind:class="{ 'open': isMenuShown }">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </scrollactive><!-- Desktop -->
    </div>
</template>
<script>
    export default {
        data() {
            return {
                lang: 'Eng',
                langSelectorOn: false,
                isMenuShown: false,
                langSelectOpen: false,
                windowWidth: 0
            }
        },
        methods: {
            visualSwitch() {
                this.langSelectorOn = !this.langSelectorOn;
            },
            langOpenClose(event) {
                event.stopPropagation();
                this.langSelectOpen = !this.langSelectOpen;
            },
            onItemChangeClick() {
                document.body.style.overflow = 'auto';
                document.body.style.position = 'static';
                this.isMenuShown = false;
            },
            switchLang(local) {
                if(local == 'jp') {
                    this.lang = 'Jpn';
                } else {
                    this.lang = 'Eng';
                }

                this.$cookies.set('locale', local);
                this.$i18n.locale = local;
            },
            switchLangMobile(event) {
                this.switchLang(event.target.value);
                this.isMenuShown = false;
                document.body.style.overflow = 'auto';
                document.body.style.position = 'static';
            },
            setLocale() {
                const locale = this.$cookies.get('locale');
                const clientLocale = this.getClientLocale();
                
                if (locale) {
                    this.$i18n.locale = locale;
                    this.lang = locale === 'en' ? 'Eng' : 'Jpn' 
                } else if(clientLocale === 'en' || clientLocale === 'ja') {
                    this.$i18n.locale = clientLocale;
                    this.lang = clientLocale === 'en' ? 'Eng' : 'Jpn' 
                } else {
                    this.$i18n.locale = 'en';
                    this.lang = 'Eng';
                }
            },
            getClientLocale() {
                const userLang = navigator.language || navigator.userLanguage; 
                const locale = userLang.split('-');
                return locale[0];
            },
            onMobileMenuShow() {
                this.isMenuShown = !this.isMenuShown;
                document.body.style.position = this.isMenuShown ?  'fixed' : 'static';
                document.body.style.overflow = this.isMenuShown ?  'hidden' : 'auto';
            }
        },
        mounted() {
            this.windowWidth = window.innerWidth;
            
            document.addEventListener('click', () => this.langSelectOpen = false);

            window.addEventListener('resize', () => {
                if(this.windowWidth < window.innerWidth) {
                    this.windowWidth = window.innerWidth;
                    this.isMenuShown = false;
                }
            });
            this.setLocale();
        }
    }
</script>
<style lang="scss">
    @import './../../sass/app';

    .menu-control {
        display: none;
    }

    .nav-panel-dark {
        @include position(fixed, 0, 0, false, 0);
        font-family: $font-noto;
        z-index:5;
        background-color: $blue-dark;
        display: block;
        height: $navbar-height;
    }

    .nav-wrapper {  
        height: inherit;
        display: flex;
        margin: auto;
        width: $nav-bar-width-lg;
    }    

    .nav-menu-mobile {

        display:none;
        background: $blue-dark;
        z-index: 9999;
    
        

        &.open {
            display:flex;
            flex-direction: column;
            position: fixed;
            top: $navbar-height;
            left:0;
            right:0;
            bottom:0;
            padding:0;
          
            .pages {
                display:flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 80%;
                margin: auto;
                li {
                    text-align:center;
                    margin: 20px 0 0;
                    a {
                        @include font-size(20px);
                    }
                }

                .contact {
                    @extend .gold-button;
                    margin-top: 10px;
                    display: inline-block;
                    @include font-size(18px);
                }
            }

            .nav-mobile-footer {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                height: 20%;
                padding:0 20px;
                z-index: 0;

                .social-links {
                    display: flex;
                    margin: 0;
                    justify-content: flex-start;

                    li {
                        margin: 0 5px;
                        border: 1px solid $gray-light;
                        @include b-radius(25px);
                    }
                                
                    a {
                        display:block;
                        height:45px;
                        width:45px;
                        padding: 10px;
                    }

                    span {
                        display:block;
                        width: 25px;
                        height: 25px;
                    }
                }

                .mobile-lang-container {
                    margin-right: 30px;
                    select {
                        -webkit-appearance:none;
                        display:block;
                        background-color: $blue-dark;
                        border:none;
                        color: $white;
                        font-size: 20px;
                        outline: none;
                        z-index:1;
                    }

                    &::after {
                        content: "";
                        display: block;
                        position: relative;
                        height: 9px;
                        width: 9px;
                        top: -20px;
                        right:-51px;
                        border-right: 2.5px solid $gray-light;
                        border-bottom: 2.5px solid $gray-light;
                        z-index: 2;

                        @include transform(rotate(45deg));
                    }
                }
            }
        }
    }

    .menu-control {
        width: 25px;
        height: 25px;
        position: relative;
        margin: 35px auto 0;
        @include transform(rotate(0deg));
        @include transition(.5s ease-in-out);
        cursor: pointer;

        span {
            display: block;
            position: absolute;
            height: 4px;
            width: 100%;
            background: $gold;
            border-radius: 2px;
            opacity: 1;
            left: 0;
            @include transform(rotate(0deg));
            @include transition(.25s ease-in-out);
        }

        span:nth-child(1) {
            top: 0px;
        }

        span:nth-child(2), span:nth-child(3) {
            top: 8px;
        }

        span:nth-child(4) {
            top: 16px;
        }

        &.open span:nth-child(1) {
            top: 8px;
            width: 0%;
            left: 50%;
        }

        &.open span:nth-child(2) {
            @include transform(rotate(45deg));
        }

        &.open span:nth-child(3) {
           @include transform(rotate(-45deg));
        }

        &.open span:nth-child(4) {
            top: 18px;
            width: 0%;
            left: 50%;
        }
    }

    .nav-logo-pages {
        display: flex;
        align-items:center;
        width:58%;
        margin: auto;
        height: inherit;
    }

    .logo {
        display: block;
        width: 102px;
        height: 43px;
        margin-top: -0.5%;
        background-position: left top;
        background-repeat: no-repeat;
        @include background-size(cover);
    }

    .pages {
        height: inherit;
        display: flex;
        align-items: center;
        margin: 0 0 0 40px;

        li {
            margin-right: 20px;
        }

        a {
            color: $gray-light;
            font-size: 16px;
        }

        a:hover {
            color: $white;
            text-decoration: none;
        }

        .active-nav-item {
            color: $white;
        }
    }
            

    .nav-social-lang-contact {
        width: 42%;
        height: inherit;
        display: flex;
    }

    .insta-icon {
        background-repeat: no-repeat;
        background-position: left top;
        @include background-size(cover);
    }

    .fb-icon {
        background-repeat: no-repeat;
        background-position: left top;
        @include background-size(cover);
    }

    .social-links {
        @include calc(width, 100% / 3);
        height: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 0 0 40px;

        li {
            margin: 0 5px;
            border: .7px solid #C4C4C4;
            @include b-radius(25px);

            &:hover {
                background-color: $gold;
                border-color: $gold;

               .fb-icon {
                   height: 20px;
                //    background: url("/images/icons/fb-icon-white.svg") no-repeat left top;
                   background-position: left top;
                   background-repeat: no-repeat;
                   @include background-size(cover);
               }

                .insta-icon {
                    height: 20px;
                    // background: url("/images/icons/insta-icon-white.svg") no-repeat left top;
                    background-position: left top;
                    background-repeat: no-repeat;
                    @include background-size(cover);
                }
            }
        }
        
        a {
            display:block;
            height:45px;
            width:45px;
            padding: 12px;
        }

        span {
            display:block;
            width: 20px;
            height: 20px;
        }
    }

    .lang-select-wrapper {
        position: relative;
        @include calc(width, 100% / 3);
        display:flex;
        align-items: center;
        justify-content: center;
    }
                    
    .curr-lang {
        color: $gray-light;
        cursor: pointer;
        position: relative;
        top: 0;
        z-index: 1;
        width: 90px;
        padding: 10px 15px;
        border-radius: 7px;
        margin-left: -30px;
        @include font-size(19px);
        background-color: $blue-dark;

        &::after {
            content: '';
            display: block;
            position: absolute;
            height: 6px;
            width: 6px;
            top: 20.5px;
            right: 15px;
            border-right: 2.3px solid $gray-light;
            border-bottom: 2.3px solid $gray-light;
            z-index: 2;

            @include transform(rotate(45deg));
        }

        border: 1px solid transparent;


        &.active {
            border-color: #7e7c7c;
            top: 17px;

            ul {
                display: block;
                margin: 0;
            }

             &::after {
                top: 22.5px;
                @include transition(.3s ease-in-out);
                @include transform(rotate(225deg));
            }
        }
    }
                    
    .curr-lang ul {
        position: relative;
        display:none;
        background-color: $blue-dark;
        width: auto;

        li {
            width: auto;
            color: $gray-light;
            padding-top: 6px;
            &:hover {
                color: $gold;
                cursor:pointer;
            }
        }
    }
        
    .contact-wrapper {
        @include calc(width, 100% / 3);
        display:flex;
        align-items: center;
        justify-content: center;

        a {
            @extend .gold-button;

            &.open {
                position: absolute;
                
            }
        }
    }
            

    @media (max-width: 575.98px) { 
        .nav-wrapper {
            width: $nav-bar-width-sm;
            padding: 0 10px;
        }

        .nav-logo-pages {
            width: 90%;
        }

        .nav-social-lang-contact {
            width: 0%;
        }

        .menu-control {
            display: block;
        }

        .logo {
            background-repeat: no-repeat;
            background-position: left top;
            @include background-size(cover);
        }

        .pages {
            display: none;
        }

        .social-links {
            display:none;
        }

        .lang-select-wrapper {
            display:none;
        }

        .contact-wrapper {
            display: none;
        }
    }

    @media (min-width: 1200px) { 
        .nav-panel-dark {
            height:$navbar-heigth-lg;
        }

        .nav-wrapper {
            width: 100%;
            padding: 0 30px;
        }

        .nav-logo-pages {
            width: 70%;
        }

        .pages {
            margin-left: 5%;

            li {
                margin-right: 30px;
            }
        }

        .nav-social-lang-contact {
            width: 30%;
        }

        .logo {
            // background: url("/images/icons/logo-and-title.png") no-repeat left top;
            background-position: left top;
            background-repeat: no-repeat;
            @include background-size(cover);
        }
    }
</style>
