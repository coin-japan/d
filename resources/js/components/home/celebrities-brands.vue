<template>
    <div class="brands-celebrities-wrapper">
        <div class="bg-wrapper">
            <div class="celebrities">
                <video v-if="!isMobile" class="part-video" id="celebrities" autoplay loop muted>
                    <source src="/videos/celebrities-bg.mov" type="video/mp4">
                </video>
                <div v-if="isMobile" class="part-photo" v-lazy:background-image="'/images/home-bg/celebrities-bg.jpg'"></div>
                <h3 class="part-title">{{ $t("celebrities-title") }}</h3>
            </div>
            <div class="brands">
                <video v-if="!isMobile" class="part-video" id="brands" autoplay loop muted>
                    <source src="/videos/brands-bg.mov" type="video/mp4">
                </video>
                <div v-if="isMobile" class="part-photo" v-lazy:background-image="'/images/home-bg/brands-bg.jpg'"></div>
                <h3 class="part-title">{{ $t("brands-title") }}</h3>
            </div>
        </div>
        <p class="text">{{ $t("brands-text") }}</p>
    </div>
</template>
<script>
export default {
    data() {
        return {
            isMobile: false
        }
    },
    methods: {
        videoPlay(videoId) {
           const video =  document.getElementById(videoId);
           video.play();
        }, 
        videoStop(videoId) {
           const video =  document.getElementById(videoId);
           video.pause();
        },
        resizeHandler() {
            this.isMobile = window.innerWidth <= 575.98;
        }
    },
    created() {
        window.addEventListener('resize', this.resizeHandler)
        this.resizeHandler();
    },
    destroyed() {
        window.removeEventListener('resize', this.resizeHandler)
    }
}
</script>
<style scoped lang="scss">
    @import './../../../sass/app';

    .brands-celebrities-wrapper {
        height: inherit;
        position: relative;
        .bg-wrapper {
            display: flex;
            height: inherit;
        }        
    }

    .text {
        position: absolute;
        bottom: 12%;
        width: 35%;
        left: 32.5%;
        right: 32.5%;
        color: $gray-light;
        z-index: 3;
        @include font-size($section-text-font-size);
        line-height: 160%;
    }

    .celebrities, .brands {
        position: relative;
        height: inherit;
        width: 50%;
        overflow: hidden;
        display: flex;

        .part-photo {
            display: none;
        } 

        .part-video, .part-photo {
            position: absolute;
            top: 50%; 
            left: 50%;
            @include translate(-50%, -50%);
            min-width: 100%; 
            min-height: 100%; 
            width: auto; 
            height: auto;
            z-index: 1; 
            overflow: hidden;
        }

        .part-title {
            display: flex;
            align-items: center;
            justify-content: center;
            height: inherit;
            width: 100%;
            z-index: 3;
            @include font-size($section-header-font-size);
        }
    }

    .celebrities {
        .part-title {
            color: $white;
        }
    }

    .brands {
        .part-title {
            -webkit-text-stroke: 1px $white;    
            color: transparent;
        }
    }

    .brands::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 2;
        background-color: $blue-dark;
        @include opacity(.8);
    }
    
    // Extra small devices (portrait phones, less than 576px)
    @media (max-width: 575.98px) { 
        .brands-celebrities-wrapper {
            
            width: 100%;
            height: auto;

            .bg-wrapper {
                display:block;
            }
        }
        

        .celebrities, .brands {
            height: 300px;
            width: 100%;
            background-color: $blue-dark;

            .part-video {
                display: none;
                height: 300px;
            }

            .part-photo {
                display: block;
                height: 300px;
                width: 100%;
                background-position: center center;
                @include background-size(auto 100%);
                background-repeat: no-repeat;
            }
            
            .part-title {
                @include font-size(28px);
                align-items: flex-end;
                padding-bottom: 40px; 
            }
        }

        .text {
            position: static;
            width: 100%;
            padding: 35px 20px;
            text-align: left;
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