<template>
    <div class="services-wrapper" v-lazy:background-image="'/images/home-bg/bg-services.jpg'">
        <h2 class="service-section-title">Services</h2>
            <div class="mobile-tabs">
                <v-touch class="touch-wrapper">
                    <div id="tabs-controls" class="tabs-controls">
                        <div class="tab-control" v-on:click="moveTabMobile(0)" v-bind:class="{'active': 0 == activeTabMobile}">
                            <span>{{ $t("awards-n-charts-title") }}</span>
                        </div>
                        <div class="tab-control" v-on:click="moveTabMobile(1)" v-bind:class="{'active': 1 == activeTabMobile}">
                            <span>{{ $t('creative-branding-title') }}</span>
                        </div>
                        <div class="tab-control" v-on:click="moveTabMobile(2)" v-bind:class="{'active': 2 == activeTabMobile}"> 
                            <span>{{ $t('digital-promotion-title') }}</span>
                        </div>
                        <div class="tab-control" v-on:click="moveTabMobile(3)" v-bind:class="{'active': 3 == activeTabMobile}">
                            <span>{{ $t('collaboration-with-celebrities-title') }}</span>
                        </div>
                    </div>
                </v-touch>    
                <div class="tab-content-body-mobile">
                    <div class="service-list-mobile" v-if="activeTabMobile == 0">
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[0] = !activeTabItemMobile[0]" class="service-item-mobile-title">{{ $t('grammys-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[0], 'closed': !activeTabItemMobile[0]}"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[0]" class="service-item-mobile-text">{{ $t('grammys-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[1] = !activeTabItemMobile[1]" class="service-item-mobile-title">{{ $t('american-music-awards-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[1], 'closed': !activeTabItemMobile[1] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[1]" class="service-item-mobile-text">{{ $t('american-music-awards-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[2] = !activeTabItemMobile[2]" class="service-item-mobile-title">{{ $t('billboard-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[2], 'closed': !activeTabItemMobile[2] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[2]" class="service-item-mobile-text">{{ $t('billboard-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[3] = !activeTabItemMobile[3]" class="service-item-mobile-title">{{ $t('gold-n-platinum-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[3], 'closed': !activeTabItemMobile[3]}"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[3]" class="service-item-mobile-text">{{ $t('gold-n-platinum-text')}}</p>
                            </transition>
                        </div>
                    </div>
                    <div class="service-list-mobile" v-if="activeTabMobile == 1">
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[4] = !activeTabItemMobile[4]" class="service-item-mobile-title">{{ $t('image-strategy-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[4], 'closed': !activeTabItemMobile[4] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[4]" class="service-item-mobile-text">{{ $t('image-strategy-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[5] = !activeTabItemMobile[5]" class="service-item-mobile-title">{{ $t('music-video-creation-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[5], 'closed': !activeTabItemMobile[5] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[5]" class="service-item-mobile-text">{{ $t('music-video-creation-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[6] = !activeTabItemMobile[6]" class="service-item-mobile-title">{{ $t('image-book-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[6], 'closed': !activeTabItemMobile[6] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[6]" class="service-item-mobile-text">{{ $t('image-book-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[7] = !activeTabItemMobile[7]" class="service-item-mobile-title">{{ $t('media-channel-selection-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[7], 'closed': !activeTabItemMobile[7]}"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[7]" class="service-item-mobile-text">{{ $t('media-channel-selection-text') }}</p>
                            </transition>
                        </div>
                    </div>
                    <div class="service-list-mobile" v-if="activeTabMobile == 2">
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[8] = !activeTabItemMobile[8]" class="service-item-mobile-title">{{ $t('you-tube-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[8], 'closed': !activeTabItemMobile[8] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[8]" class="service-item-mobile-text">{{ $t('you-tube-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[9] = !activeTabItemMobile[9]" class="service-item-mobile-title">{{ $t('spotify-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[9], 'closed': !activeTabItemMobile[9] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[9]" class="service-item-mobile-text">{{ $t('spotify-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[10] = !activeTabItemMobile[10]" class="service-item-mobile-title">{{ $t('instagram-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[10], 'closed': !activeTabItemMobile[10] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[10]" class="service-item-mobile-text">{{ $t('instagram-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[11] = !activeTabItemMobile[11]" class="service-item-mobile-title">{{ $t('apple-music-n-i-tunes-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[11], 'closed': !activeTabItemMobile[11]}"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[11]" class="service-item-mobile-text">{{ $t('apple-music-n-i-tunes-text') }}</p>
                            </transition>
                        </div>
                    </div>
                    <div class="service-list-mobile" v-if="activeTabMobile == 3">
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[12] = !activeTabItemMobile[12]" class="service-item-mobile-title">{{ $t('influencer-matching-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[12], 'closed': !activeTabItemMobile[12] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[12]" class="service-item-mobile-text">{{ $t('influencer-matching-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[13] = !activeTabItemMobile[13]" class="service-item-mobile-title">{{ $t('features-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[13], 'closed': !activeTabItemMobile[13] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[13]" class="service-item-mobile-text">{{ $t('features-text') }}</p>
                            </transition>
                        </div>
                        <div class="service-item-mobile">
                            <h4 v-on:click="activeTabItemMobile[14] = !activeTabItemMobile[14]" class="service-item-mobile-title">{{ $t('dj-remixes-sub-title') }}<span class="status" v-bind:class="{'opened': activeTabItemMobile[14], 'closed': !activeTabItemMobile[14] }"><span class="horizontal"></span><span class="vertical"></span></span></h4>
                            <transition name="mobile-text" v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:before-leave="beforeLeave" v-on:leave="leave">
                                <p v-if="activeTabItemMobile[14]" class="service-item-mobile-text">{{ $t('dj-remixes-text') }}</p>
                            </transition>
                        </div>
                    </div>
                </div>
            </div>    
        <div class="tabs-wrapper">
            <tabs :options="{ useUrlFragment: false }">
                <tab :name="$t('awards-n-charts-title')">
                    <div class="service-list">
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('grammys-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('grammys-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('american-music-awards-sub-title')}}</h4>
                            <p class="service-item-text">{{ $t('american-music-awards-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('billboard-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('billboard-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('gold-n-platinum-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('gold-n-platinum-text')}}</p>
                        </div>
                    </div>
                </tab>
                <tab :name="$t('creative-branding-title')">
                     <div class="service-list">
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('image-strategy-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('image-strategy-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('music-video-creation-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('music-video-creation-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('image-book-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('image-book-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('media-channel-selection-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('media-channel-selection-text') }}</p>
                        </div>
                    </div>
                </tab>
                <tab :name="$t('digital-promotion-title')">
                    <div class="service-list">
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('you-tube-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('you-tube-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('spotify-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('spotify-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('instagram-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('instagram-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('apple-music-n-i-tunes-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('apple-music-n-i-tunes-text') }}</p>
                        </div>
                    </div>
                </tab>
                <tab :name="$t('collaboration-with-celebrities-title')">
                    <div class="service-list">
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('influencer-matching-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('influencer-matching-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('features-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('features-text') }}</p>
                        </div>
                        <div class="service-item">
                            <h4 class="service-item-title">{{ $t('dj-remixes-sub-title') }}</h4>
                            <p class="service-item-text">{{ $t('dj-remixes-text') }}</p>
                        </div>
                    </div>
                </tab>
            </tabs>
        </div>
    </div>
</template>
<script>
export default {
    data() {
            return {
                activeTabMobile: 0,
                activeTabItemMobile: {
                    0:false, 1:false, 2:false, 3:false, 4:false,
                    5:false, 6:false, 7:false, 8:false, 9:false,
                    10:false, 11:false, 12:false, 13:false, 14:false
                }
            }
    },
    methods: {
        swipe(data) {
            const element = document.getElementById('tabs-controls');
            
            let marLeft = +this.getStyle(element, 'margin-left').split('px')[0];
            
            let width = +this.getStyle(element, 'width').split('px')[0];

            let minShift = (-width) + 100;
            let maxShift = -150;

            let shift = marLeft + data.deltaX;

            if(shift < minShift) {
                shift = minShift;
            } 
            
            if(shift > maxShift) {
                shift = maxShift;
            }
            
            element.style.marginLeft =  shift + 'px';
        },
        getStyle(e, styleName) {
            let styleValue = "";

            if(document.defaultView && document.defaultView.getComputedStyle) {
                styleValue = document.defaultView.getComputedStyle(e, "").getPropertyValue(styleName);
            }
            else if(e.currentStyle) {
                styleName = styleName.replace(/\-(\w)/g, function (strMatch, p1) {
                    return p1.toUpperCase();
                });
                styleValue = e.currentStyle[styleName];
            }
            return styleValue;
        },

        beforeEnter: function(el) {
            el.style.height = '0';
        },
        enter: function(el) {
            el.style.height = el.scrollHeight + 'px';
        },
        beforeLeave: function(el) {
            el.style.height = el.scrollHeight + 'px';
        },
        leave: function(el) {
            el.style.height = '0';
        },
        moveTabMobile(index) {
            this.activeTabMobile = index;
            const container = document.getElementById('tabs-controls');
            const elementParams = document
                .querySelector(`#tabs-controls .tab-control:nth-child(${++index})`)
                .getBoundingClientRect();
            
            const ww = window.innerWidth - elementParams.width;

            const clientWindowDis = elementParams.left - (ww / 3);

            const oldMargin = +this.getStyle(container, 'margin-left').split('px')[0];
            
            container.style.marginLeft = (oldMargin - clientWindowDis) + 'px';
        }
    }
}
</script>
<style lang="scss">
    @import './../../../sass/app';

    .services-wrapper {
        position:relative;
        height:inherit;
        z-index: 1;
        background-position: top center;
        background-repeat: no-repeat;

        &::after {
            content: '';
            position: absolute;
            top:0;
            left: 0;
            right:0;
            bottom:0;
            background: $blue-dark;
            @include opacity(.9);
            z-index: 2;
        }

        .tabs-wrapper {
            position:relative;
            z-index: 3;
            padding: 0 0 70px 0;
        }
    }

    .service-section-title {
        @include font-size($section-header-font-size);
        text-align:center;
        color: $white;
        position:relative;
        z-index: 3;
        padding: 50px 0 30px;
    }

    .tabs-component {
        width: 90%;
        margin: auto;
    }

    .tabs-component-tab {
        display: inline-block;
    }

    .tabs-component-tab.is-active {

        .tabs-component-tab-a {
            color: $white;
            padding-bottom: 7px;
            &::after {
                left:0;
                bottom: 0;
            }
            &::before {
                right: 0;
                bottom: 0;
            }
        }
    }

    .tabs-component-tab-a {
        position: relative;
        color: transparent;
        @include font-size(24px);
        -webkit-text-stroke: .5px $white;

        &::after, &::before {
            content: '';
            transition: all 0.5s ease-in-out;
            position: absolute;
            bottom: 1px;
            right: 50%;
            left: 50%;
            height: 3px;
            background: $gold;
        }

        &:hover {
            text-decoration: none;
            color:transparent;
        }
    }

    .tabs-component-tabs {
        width: 70%;
        margin: auto;
        padding-bottom: 40px;
    }

    .tabs-component-panel {
        color: $white;
    }

    .tabs-component-tabs {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .service-list {
        display: flex;
        flex-wrap: wrap;
    }

    .service-item {
        width: 45%;
        margin: 10px 2.5%;
        padding: 25px 35px;
        background-color: $blue-dark;
        @include opacity(.7);
    }

    .service-item-title {
        @include font-size(20px);
        padding-bottom: 10px;
        color: $white;
    }

    .service-item-text {
        @include font-size(16px);
        color: $gray-light;
    }
    
    $tab-mobile-width: 200px;

    .touch-wrapper {
        display: none;
        z-index: 3;
    }

    .mobile-tabs {
        display: none;
        width: 100%;
        height: auto;
        overflow: hidden;
        z-index: 3;
    
        .tabs-controls {
            position: relative;
            top: 0;
            height: 50px;
            left: 50%;
            margin-left: -166px;
            display: flex;
            @include calc(width, $tab-mobile-width * 4);
            height: inherit;
        }

        .tab-control {
            width: $tab-mobile-width;
            height: inherit;
            color: transparent;
            @include font-size(24px);
            -webkit-text-stroke: .5px $white;
            white-space: nowrap;

            span {
                display: inline-block;
                height: inherit;
                border-bottom: 2px solid transparent;
            }

            &.active {
                color: $white;
                span {
                    border-bottom: 2px solid $gold;
                }
            }
        }

        .service-item-mobile {

            color: $white;
        }

        .service-item-mobile-title {
            position: relative;
            margin: 15px 0 20px;
            @include font-size(20px);
            width: inherit;

            .status {
                position: absolute;
                top:0;
                right: 0;
                display: block;
                width: 15px;
                height: 15px;

                &.closed {
                    .vertical {
                        @include transition(all 0.5s ease-in-out);
                        @include rotate(-90deg);
                    }
                    .horizontal {
                        @include transition(all 0.5s ease-in-out);
                        @include rotate(-90deg);
                        @include opacity(1);
                    }
                }

                &.opened {
                    @include opacity(1);
                    .vertical {
                        @include transition(all 0.5s ease-in-out);
                        @include rotate(90deg);
                    }
                    .horizontal {
                        @include transition(all 0.5s ease-in-out);
                        @include rotate(90deg);
                        @include opacity(0);
                    }
                }

                .horizontal {
                    position: absolute;
                    background-color: $white;
                    width: 15px;
                    height: 2px;
                    left: 50%;
                    margin-left: -8px;
                    top: 50%;
                    margin-top: -1px;
                }

                .vertical {
                    position: absolute;
                    background-color: $white;
                    width: 2px;
                    height: 15px;
                    left: 50%;
                    margin-left: -1px;
                    top: 50%;
                    margin-top: -8px;
                }
            }
        }

        .service-item-mobile-text {
            color: $gray-light;
            font-family: $font-noto;
            @include font-size(14px);
            line-height: 160%;
        }

        .tab-content-body-mobile {
            display: block;
            height: auto;
            width: 90%;
            margin: auto;
        }

        .service-list-mobile {
            margin-top: 30px;
            position: static;
            display: block;
        }
    }

    .mobile-text-enter {
        @include opacity(0);
        height: 0%;
        transform: translateX(10px);
    }
    
    .mobile-text-enter-to {
        @include opacity(1);
        height: 100%;
    }

    .mobile-text-enter-active {
        transition: all .4s ease;
    }

    .mobile-text-leave-active {
        transition: all .4s ease;
    }

    .mobile-text-leave {
        @include opacity(1);
        height: 100%;
    }

    .mobile-text-leave-to {
        @include opacity(0);
        height: 0%;
    }

    // Extra small devices (portrait phones, less than 576px)
    @media (max-width: 575.98px) { 

        .services-wrapper {
            background: transparent !important;
             &::after {
                 display:none;
             }
        }

        .tabs-wrapper {
            display:none;
        }

        .mobile-tabs {
            display: block;
        }

        .touch-wrapper {
            display: block;
        }

        .service-section-title {
            @include font-size(27px);
            width: 90%;
            margin: 30px auto 20px;
            padding: 0;
            text-align: left;
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