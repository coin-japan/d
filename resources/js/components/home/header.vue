<template>
    <div class="home-header-wrapper">
        <div class="header-padding"></div>
        <div id="header-carousel" class="slide-show">
            <headerCarousel v-on:eventSlideChanged="updateSlideIndex()"></headerCarousel>
        </div> 
        <article class="header-descr-wrapper">
            <h1 class="header-title">{{ $t("header-title") }}</h1>
            <p class="header-descr"><span>{{ $t("header-text") }}</span></p>
            <div class="controls-wrapper">
                <div class="prev" v-on:click="prev()"></div>
                <div class="next" v-on:click="next()"></div>
            </div>
            <div class="slide-show-counter-wrapper">
                <span>{{ slideIndex }}</span>
            </div>
        </article>
    </div>
</template>
<script>
    import headerCarousel from './../parts/carousel';
    import CustomSwipe from './../../swipe';

    export default {
        data() {
            return {
                slideIndex: '01'
            }
        },
        components: {
            headerCarousel
        },
        methods: {
            next() {
                this.$children[0].next()
            },
            prev() {
                this.$children[0].prev()
            },
            updateSlideIndex() {
                const currIndex = this.$children[0].active;
                this.slideIndex = currIndex;
                if(currIndex <= 9) {
                    this.slideIndex = '0' + currIndex;
                }
            }
        },
        mounted() {
            let swipe = new CustomSwipe('header-carousel', this.next, this.prev);

            setTimeout(() => {
                swipe.init();
            }, 1000);
        },
    }
</script>
<style scped lang="scss">
    @import './../../../sass/app';
    .home-header-wrapper {
        position:relative;
        background-color: $blue-dark;
        height:inherit;
        overflow: hidden;

        .header-padding {
            padding-top: $navbar-height;
        }
    }
    .slide-show {
        position:relative;
        width: 100%;
        height: 60vh;
        top: 0;
        left: 0;
        background-color: $white;
        z-index: 1;
        overflow: hidden;

        &:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: $blue-dark;
            @include opacity(.35);
        }

        .slide {
            @include background-size(cover);
            background-repeat: no-repeat;
            position:relative;
            height: 100%;
            display:none;
            &.active {
                display: block;
            }
        }
    }

    .header-descr-wrapper {        
        position: relative;
        margin:auto;
        min-height:277px;
        height: 30vh;
        color: $white;
        width: 90%;
        z-index: 3;
        display:flex;
        align-items:center;
        justify-content: space-between;

        .header-title {
            position:absolute;
            top: -87px;
            @include font-size(86px);
            margin-bottom: 13px;
            font-weight: 600;
            font-family: $font-noto;
            font-style: normal;
            line-height: 139px;
        }

        .header-descr {
            position:absolute;
            top: 55px;
            width:680px;
        
            span {
                //font-family: $font-noto;
                @include font-size(18px);
                font-style: normal;
                font-weight: normal;
                color: $gray-light;
            }
        }
    }

    .controls-wrapper {
        position: absolute;
        display: flex;
        top: 0;
        right: 3%;
        bottom: 0;
        height: 100%;
        align-items: center;
        justify-content: center;
        z-index: 4;

        .next, .prev {
            width:45px;
            height: 45px;
            margin: 5px;
            border: 1px solid $gray-light;
            border-radius: 50px;

            &:hover {
                background-color: $gold;
                cursor: pointer;
                border: 1px solid $gold;
            }

            &::after, &::before {
                content: '';
                display:block;
                position: relative;
                height: 10px;
                width: 2px;
                background-color: $gray-light;
                left: 20px;
            }

            &::after {
                top:10px;
            }

            &::before {
                top:14px;
            }
        }

        .next {
            &::after {
                @include transform(rotate(-135deg));
            }

            &::before {
                @include transform(rotate(135deg));
            }
        }

        .prev {
            &::after {
                @include transform(rotate(-45deg));
            }

            &::before {
                @include transform(rotate(45deg));
            }
        }

    }

    .slide-show-counter-wrapper {
        position: absolute;
        right: -6.5%;
        color: $white;
        display: flex;
        align-items: center;
        @include font-size(52px);
        font-size: $font-noto;
        span {
            @include transform(rotate(-90deg));
        }
    }

    // Extra small devices (portrait phones, less than 576px)
    @media (max-width: 575.98px) { 
    
       .controls-wrapper {
           display:none;
       }

       .slide-show-counter-wrapper {
           display: none;
       }

       .slide-show {
           min-height: 300px;
           height: 300px;
           overflow: hidden;
       }
        
        .header-descr-wrapper {        
            top: -25px;
            min-height: auto;
            width: 100%;
            overflow: hidden;
            height: 37vh;
            
            .header-title {
                @include font-size(33px);
                width: 100%;
                top:-46px;
                margin-bottom: 5px;
                text-align: center;
                white-space:nowrap;
            }

            .header-descr {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                @include font-size(16px);
                font-style: normal;
                font-weight: normal;
                span {
                    display: inline-block;
                    width: 90%;
                }
            }
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
