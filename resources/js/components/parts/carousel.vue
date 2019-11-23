<template>
    <div class="carousel-wrapper">      
        <transition-group name="slide-fade">
            <template v-for="slide in slides">
                <div :key="slide.index" v-if="slide.index == active" :class='slide.class' v-bind:style="{ 'background-image': slide.image }"></div>
            </template>
        </transition-group>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                slides: [
                    {   
                        index: 1, 
                        image: 'url(/images/home-slider/slide-1.jpg)',
                        class: 'slide slide-1'
                    },
                    { 
                        index: 2, 
                        image: 'url(/images/home-slider/slide-2.jpg)',
                        class: 'slide slide-2'
                    },
                    { 
                        index: 3, 
                        image: 'url(images/home-slider/slide-3.jpg)',
                        class: 'slide slide-3'
                    }
                ],
                active: 1,
                maxIndex: 3,
                minIndex: 1,
                interval: null
            }
        },
        methods: {
            runCarousel: function() {
                clearInterval(this.interval);
                
                this.interval = setInterval(() => {
                    this.next();
                }, 6000);
            },
            next: function() {
                let index = this.active + 1;
                
                if(this.active == this.maxIndex) {
                   index = this.minIndex;
                }
                
                this.active = index;

                this.runCarousel();

                this.$emit('eventSlideChanged');
            },
            prev: function() {
                let index = this.active - 1;

                if(this.active == this.minIndex) {
                   index = this.maxIndex;
                }

                this.active = index;

                this.runCarousel();

                this.$emit('eventSlideChanged');
            }
        },
        mounted() {
            this.runCarousel();
        }
    }
</script>

<style lang="scss" scoped>
    @import './../../../sass/app';

    .carousel-wrapper {
        position: relative;
        height:100%;
        overflow: hidden;
        @include calc(width, 100% * 3);
        background-color: $blue-dark;
        background-repeat: no-repeat; 
    }
    
    .carousel {
        position: relative;
        height:100%;
    }

    .slide {
        position: relative;
        float: left;
        display: block !important;
        @include calc(width, 100% / 3);
        height: 100%;
        background-size: cover !important;
        @include background-size(cover);
        z-index: 1;

        &-1 {
            background-position: top center;
        }

        &-2 {
            background-position: center 20%;
        }

        &-3 {
            background-position: center;
        }

        &::after {
            content: '';
            position: absolute;
            top:0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #1E2437;
            z-index: 2;
            @include opacity(.35);
        }
    }

    .slide-fade {
        &-enter {
            opacity: .6;
            //@include filter(blur, 4px);
        }

        &-enter-active {
            transition-delay: .6;
            transition: all 2s ease;
        }

        &-leave {
            opacity: .6;
            @include filter(blur, 4px);
        }

        &-leave-active {
            transition: all 2s ease;
        }
    }

</style>