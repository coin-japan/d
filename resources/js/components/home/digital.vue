<template>
    <div class="digital-content-wrapper" v-lazy:background-image="isMibile ? mobileBgUrl : desktopBgUrl">
        <div class="digital-container">
            <h3 class="title">{{ $t("work-with-stars-title") }} </h3>
            <div class="controls">
                <div class="control">
                    <div class="icon-wrapper" v-bind:class="{ 'active': isAnimatedCircles }">
                        <svg class="instagram" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 15.75C9.933 15.75 8.25 14.067 8.25 12C8.25 9.9315 9.933 8.25 12 8.25C14.067 8.25 15.75 9.9315 15.75 12C15.75 14.067 14.067 15.75 12 15.75Z" fill="#D1B87C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 0H7.5C3.3585 0 0 3.3585 0 7.5V16.5C0 20.6415 3.3585 24 7.5 24H16.5C20.6415 24 24 20.6415 24 16.5V7.5C24 3.3585 20.6415 0 16.5 0ZM12 6C8.6865 6 6 8.6865 6 12C6 15.3135 8.6865 18 12 18C15.3135 18 18 15.3135 18 12C18 8.6865 15.3135 6 12 6ZM8.25 12C8.25 14.067 9.933 15.75 12 15.75C14.067 15.75 15.75 14.067 15.75 12C15.75 9.9315 14.067 8.25 12 8.25C9.933 8.25 8.25 9.9315 8.25 12ZM18.45 6.3495C18.8916 6.3495 19.2495 5.99155 19.2495 5.55C19.2495 5.10845 18.8916 4.7505 18.45 4.7505C18.0084 4.7505 17.6505 5.10845 17.6505 5.55C17.6505 5.99155 18.0084 6.3495 18.45 6.3495Z" fill="#D1B87C"/>
                        </svg>
                    </div>
                    <div class="description">
                        <div v-if="isAnimatedCircles" class="numbers">
                            <counter :from="0" :to="600000000" :duration="duration"></counter>+
                        </div>
                        <div class="subject">
                            <span>{{ $t("instagram-followers-label") }}</span>
                        </div>
                    </div>
                </div>
                <div class="control">
                    <div class="icon-wrapper" v-bind:class="{ 'active': isAnimatedCircles }">
                        <img class="golden-disc" v-lazy="'/images/icons/gdi.png'">
                    </div>
                    <div class="description">
                        <div v-if="isAnimatedCircles" class="numbers">
                            <counter :from="0" :to="800" :duration="duration"></counter>+
                        </div>
                        <div class="subject">
                            <span>{{ $t("golden-discs-label") }}</span>
                        </div>
                    </div>
                </div>
                <div class="control">
                    <div class="icon-wrapper" v-bind:class="{ 'active': isAnimatedCircles }">
                        <svg class="youtube" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M30.7527 20.1115C29.5976 21.4528 27.465 22 23.3921 22H8.60759C4.4415 22 2.27272 21.4175 1.12196 19.9894C0 18.597 0 16.5454 0 13.706V8.29394C0 2.79299 1.3312 0 8.60759 0H23.3922C26.9242 0 28.8813 0.482826 30.1475 1.66659C31.446 2.88051 32 4.86254 32 8.29394V13.706C32 16.7004 31.9132 18.7641 30.7527 20.1115ZM20.5441 10.2528L13.8305 6.8251C13.6804 6.74846 13.5163 6.71044 13.3524 6.71044C13.1668 6.71044 12.9816 6.75925 12.8175 6.85626C12.5087 7.03908 12.3201 7.36611 12.3201 7.71885V14.5522C12.3201 14.9043 12.5082 15.2311 12.8164 15.414C13.1247 15.5969 13.5082 15.6094 13.8281 15.4471L20.5417 12.0415C20.8833 11.8682 21.0978 11.5238 21.0983 11.1479C21.0987 10.7718 20.8852 10.4268 20.5441 10.2528Z" fill="#D1B87C"/>
                        </svg>
                    </div>
                    <div class="description">
                        <div v-if="isAnimatedCircles" class="numbers">
                            <counter :from="0" :to="10000000000" :duration="duration"></counter>+
                        </div>
                        <div class="subject">
                            <span>{{ $t("you-tube-views-label") }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="section-additional-title">{{ $t("diamonds-and-digital-title") }}</h4>
            <p class="section-description">{{ $t("digital-text") }}</p>
        </div>
    </div>
</template> 
<script>
import counter from './../parts/animated-number';
export default {
    data() {
        return {
            isAnimatedCircles: false,
            duration: 2,
            isMibile: false,
            desktopBgUrl: '/images/home-bg/bg-digital.jpg',
            mobileBgUrl: '/images/home-bg/bg-digital-mobile-3.jpg'
        }
    },
    methods: {
        drowCircleBorder() {
            this.isAnimatedCircles = true;

           
            var tal = document.getElementById("cx1");
        }
    },
    mounted() {
        const section = document.getElementById('digital');
    
        document.addEventListener("scroll", _ =>  {
            if(!this.isAnimatedCircles) {
                const actinPoint = window.pageYOffset + (window.innerHeight / 4);
                if(actinPoint >= section.offsetTop) {
                    this.drowCircleBorder();
                }
            }
        });

        this.isMibile = window.innerWidth <= 575.98;

        document.addEventListener("resize", _ =>  {
            this.isMibile = window.innerWidth <= 575.98;
        });
    },
    components: {
        counter
    }
}
</script>
<style scoped lang="scss">
     @import './../../../sass/app';
     
    .digital-content-wrapper {
        background-repeat: no-repeat;
        height: inherit;
        color: $gray-light;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        @include background-size(cover);
    }

    .digital-container {
        width: 90%;
        height: inherit;
        padding-right: 20%; 
        margin: auto;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
    }

    .section-additional-title {
        width: 100%;
        margin: 0 auto 25px;
        @include font-size(37px);
        color: $white;
    }

    .section-description {
        width: 100%;
        padding-right: 35%; 
        margin: 0 auto;
        @include font-size($section-text-font-size);
        line-height: 160%;
    }

    .title {
        font-size: $section-header-font-size;
        color: $white;
    }

    .controls {
        display: flex;
        margin-top: 20px;
        margin-bottom: 35px;
    }

    .control {
        display: flex;
        align-items:center;
        margin-right: 25px; 
    }


    .icon-wrapper {
        box-sizing: border-box;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px;
        height: 70px;
        //border: 1px solid transparent;
        border-radius: 100%;
        margin-right: 10px;
        z-index: 0;
        overflow: hidden;

        .youtube {
            height: auto;
            width: 34px;
        }

        .golden-disc {
            height: auto;
            width: 35px;
        }

        .instagram {
            height: auto;
            width: 30px;
        }

        &::before,
        &::after {
            content: '';
            top: 0;
            left: 0;
            right: 0;
            bottom:0;
            box-sizing: inherit;
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 100%;
            z-index: 2;
        }

        &::before {
            border: 2px solid transparent;
        }

        &.active::before {
            border-top-color: $gold;
            border-right-color: $gold;
            border-bottom-color: $gold;

            @include transition(
                border-top-color .5s linear,
                border-right-color .02s linear .65s,
                border-bottom-color .02s linear 1.28s
            );
        }

         &::after {
            border: 0px solid transparent; 
        }

        &.active::after{
            border-top: 2px solid $gold;
            border-left-width: 2px;
            border-right-width: 2px;
            @include rotate(270deg);
            @include transition(
                transform 2s linear 0s,
                border-left-width .5s linear 1s
            );
        }
    }



    .numbers {
        @include font-size(19px);
        color: $white;
    }

    .subject {
        @include font-size(15px);
    }

    // Extra small devices (portrait phones, less than 576px)
    @media (max-width: 575.98px) {

        .digital-content-wrapper {
            background-repeat: no-repeat;
            background-size: 100% auto;
            height: inherit;
            width: 100%;
            overflow:hidden;
        }

        .digital-container {
            display: block;
            width: 100%;
            padding: 370px 20px 0;

            background: rgba(30,36,55,0.01);
            background: -moz-linear-gradient(top, rgba(30,36,55,0.01) 0%, rgba(30,36,55,0) 0%, rgba(30,36,55,0) 5%, rgba(30,36,55,0) 19%, rgba(30,36,55,0.48) 25%, rgba(30,36,55,0.73) 31%, rgba(30,36,55,0.88) 37%, rgba(30,36,55,1) 44%, rgba(30,36,55,1) 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(30,36,55,0.01)), color-stop(0%, rgba(30,36,55,0)), color-stop(5%, rgba(30,36,55,0)), color-stop(19%, rgba(30,36,55,0)), color-stop(25%, rgba(30,36,55,0.48)), color-stop(31%, rgba(30,36,55,0.73)), color-stop(37%, rgba(30,36,55,0.88)), color-stop(44%, rgba(30,36,55,1)), color-stop(100%, rgba(30,36,55,1)));
            background: -webkit-linear-gradient(top, rgba(30,36,55,0.01) 0%, rgba(30,36,55,0) 0%, rgba(30,36,55,0) 5%, rgba(30,36,55,0) 19%, rgba(30,36,55,0.48) 25%, rgba(30,36,55,0.73) 31%, rgba(30,36,55,0.88) 37%, rgba(30,36,55,1) 44%, rgba(30,36,55,1) 100%);
            background: -o-linear-gradient(top, rgba(30,36,55,0.01) 0%, rgba(30,36,55,0) 0%, rgba(30,36,55,0) 5%, rgba(30,36,55,0) 19%, rgba(30,36,55,0.48) 25%, rgba(30,36,55,0.73) 31%, rgba(30,36,55,0.88) 37%, rgba(30,36,55,1) 44%, rgba(30,36,55,1) 100%);
            background: -ms-linear-gradient(top, rgba(30,36,55,0.01) 0%, rgba(30,36,55,0) 0%, rgba(30,36,55,0) 5%, rgba(30,36,55,0) 19%, rgba(30,36,55,0.48) 25%, rgba(30,36,55,0.73) 31%, rgba(30,36,55,0.88) 37%, rgba(30,36,55,1) 44%, rgba(30,36,55,1) 100%);
            background: linear-gradient(to bottom, rgba(30,36,55,0.01) 0%, rgba(30,36,55,0) 0%, rgba(30,36,55,0) 5%, rgba(30,36,55,0) 19%, rgba(30,36,55,0.48) 25%, rgba(30,36,55,0.73) 31%, rgba(30,36,55,0.88) 37%, rgba(30,36,55,1) 44%, rgba(30,36,55,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e2437', endColorstr='#1e2437', GradientType=0 );
        }

        .title {
            width: 100%;
            @include font-size(27px);
            margin-bottom: 30px;
        }

        .section-additional-title {
            display: block;
            width: 100%;
            height: auto;
            @include font-size(28px);
            margin-bottom: 15px;
        }

        .controls {
            display: block;
            width: 100%;
            height: auto;
        }

        .control {
            display: flex;
            align-items:center;
            margin-right: 25px;
            margin-bottom: 20px; 
        }

        .icon-wrapper {
            width: 70px;
            height: 70px;

            .youtube {
                height: auto;
                width: 32px;
            }

            .golden-disc {
                height: auto;
                width: 42px;
            }

            .instagram {
                height: auto;
                width: 26px;
            }
        }

        .section-description {
            width: 100%;
            height: auto;
            padding: 0;
            padding-bottom: 50px;
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