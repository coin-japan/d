<template>
    <div class="contact-section-wrapper">
        <div class="insta-photos" v-if="resources.length">
            <div class="photo-section-header">
                <h3 class="photo-section-title">instagram</h3>
                <a class="photo-section-link" target="_blank" href="//www.instagram.com/dnd.promotion/">#dnd.promotion</a>
            </div>
            <div class="photo-list-wrapper">
                <template v-for="(photos, i) in photosSorted">
                    <div v-if="i <= indexEnd && i >= indexStart" v-bind:key="i" class="row-photos">
                        <a href="//www.instagram.com/dnd.promotion/" target="_blank"  class="photo-container" v-for="photo in photos" v-bind:key="photo.id">
                            <span v-lazy:background-image.container="photo.standard_resolution_url"></span>
                        </a>
                    </div>
                </template>
            </div>
            <div class="photo-list-wrapper-mobile">
                <transition-group :duration="{ enter: 1000, leave: 2000 }" name="photo-container" id="swipe-container" class="mobile-photo-wrapper" tag="div">
                    <div v-lazy:background-image.container="photo.standard_resolution_url" v-for="photo in resources" class="photo-container" v-bind:key="photo.id"></div>
                </transition-group>
                <a class="photo-section-link" target="_blank" href="//www.instagram.com/dnd.promotion/">#dnd.promotion</a>
            </div>  
        </div>
    </div>
</template>
<script>
    import CustomSwipe from './../../swipe';

    export default {
        data() {
            return {
                has_error: false,
                //photos: [],
                photosSorted: [],
                resources: [],
                photosMobile: [],
                actvieIndex: 0,
                indexStart: 0,
                indexEnd: 1
            }
        },
        mounted() {
            this.getPhotos();
            this.init();
            setInterval(() => {
                const last = this.photosSorted.length % 6;
                let linesCount = (this.photosSorted.length - last) / 6;
                
                if (last != 0) { linesCount++ }

                if(linesCount - 1 == this.indexEnd) {
                    this.indexStart = 0;
                    this.indexEnd = 1; 
                } else {
                    this.indexStart += 2;
                    this.indexEnd += 2; 
                }
                
            }, 8000);
        },
        methods: {
            init() {
                let swipe = new CustomSwipe('swipe-container', this.prev, this.next);
                let element = document.getElementById('swipe-container');
                if(element == null) {
                    swipe = null;
                    setTimeout(() => {
                        this.init();
                    }, 500);
                } else {
                    swipe.init();
                }
            },
            getPhotos() {
                this.$http({ url: 'photos', method: 'GET'})
                    .then(
                        (res) => {
                            this.resources = res.data.data;

                            const isHasDifference = this.resources.length % 6;
                            const rowsCount = this.resources.length - isHasDifference;
                            
                            let from = 0;
                            let to = 0;
                            for(let i = 0; i < rowsCount; i++) {
                                from = i * 6;
                                to = from + 6;
                                this.photosSorted.push(this.take(this.resources, from, to));
                            }

                            if(isHasDifference) {
                                this.photosSorted.push(this.take(this.resources, to, to + 6)); 
                            }


                            setTimeout(() => {
                                const photoWrapper = document.querySelector('.mobile-photo-wrapper');
                                photoWrapper.style.width = 300 * this.resources.length + 'px';
                                photoWrapper.style.marginLeft = this.resources.length % 2 ? '0px' : '150px'; 
                                const photoContainers = document.querySelectorAll('.mobile-photo-wrapper .photo-container');

                                photoContainers.forEach(it => {
                                    it.style.width = 88 / this.resources.length + '%';
                                });

                            }, 1000);
                            
                        },
                        () => this.has_error = true
                    );
            },
            next(){
                this.resources.push(this.resources.shift());
            },
            prev() {
                this.resources.unshift(this.resources.pop());
            },
            take(arr, from, to) {
                const res = arr.filter((v, i) => i < to && i >= from);

                if(res.length < to - from) {
                    do {
                        res.push({});
                    } while(res.length < to - from);
                }

                if(res.length == 0) {
                    return null;
                }
                
                return res;
            }
        }
    }
</script>
<style lang="scss">
    @import './../../../sass/app';
    
    
    $photos-count-desctop: 6;

    .insta-photos {
        padding-bottom: 100px;
        width: 85%;
        margin: auto;
    }

    .photo-section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-family: $font-noto;
        margin-top: 30px;
        margin-bottom: 15px;
        width: 100%;
    }

    .photo-section-title {
        color: $white;
        text-transform: capitalize;
        font-family: $font-arial;
        @include font-size($section-header-font-size);
    }

    .photo-section-link {
        display:block;
        text-align: right;
        font-weight: 700;
        color: $gold;
        text-decoration: underline;
        @include font-size(21px);
    }

    .photo-list-wrapper {
        overflow: hidden;
    }

    .row-photos {
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-lines: initial;
    }

    .photo-container {
        display: flex;
        position: relative;
        @include calc(width, 88% / $photos-count-desctop);
        height: 100%;
        padding: 0;
        margin: 20px 0;
        overflow: hidden;

        span {
            display: block;
            position: absolute;
            top:0;
            left:0;
            bottom: 0;
            right:0;
            @include background-size(cover);
            background-repeat: no-repeat;
            background-position: center center;
            
            transition: all 0.5s ease-out;
            @include transform(scale(1));
        }

        &:after {
            content: '';
            display: block;
            padding-bottom: 100%;
        }

        &:hover span {
            width: 100%;
            @include transform(scale(1.1));
        }
    }

    .photo-list-wrapper-mobile {
        display: none;
        overflow: hidden;
        width: 100%;
        position: relative;
        left: 50%;
        margin-left: -186px;
        overflow-y: auto;
        padding-bottom: 50px; 

        .photo-section-link {
            display: inline-block;
            width: auto;
            padding-left: 21px;
        }
    }

    .mobile-photo-wrapper {
        display: flex;
        position: relative;
        top: 0;
        left: 50%;
        @include translateX(-50%);
        
        .photo-container {

            &:first-child, &:last-child {
                visibility: hidden !important;
            }
            
            width: 300px;
            height: auto;
            margin-right: 20px;
            margin-left: 20px;

            @include background-size(cover);
            
            &-move {
                @include transition(all 600ms ease-in-out 50ms);
            }

            &-enter-active { 
                @include transition(all 300ms ease-out);
            }

            &-leave-active {
                @include transition(all 200ms ease-in);
                position: absolute;
                z-index: 0;
            }

            &-enter,
            &-leave-to { 
                @include opacity(0);
            }

            &-enter { 
                @include transform(scale(0.9))
            }
        }
    }

    // Extra small devices (portrait phones, less than 576px)
    @media (max-width: 575.98px) { 
        .insta-photos {
            padding-bottom: 0;
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

        .insta-photos {
            width: 100%;
            height: auto;
            overflow: hidden;
        }

        .photo-section-title {
            @include font-size(27px);
            width: 90%;
            margin: 0 auto 10px;
            text-align: left;
        }

        .photo-section-link {
            display: none;
        }

        .photo-list-wrapper {
            display: none;
        }

        .photo-list-wrapper-mobile {
            position:relative;
            display: block;
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