<template>
    <div class="bg-wrapper">
        <transition name="fade">
            <div v-show="isActive" id="bg-image"></div>
        </transition>
        
   <div class="wrapper">
        <h2 class="office-section-title">Locations</h2>
        <div class="mobile-offices-carousel">
            <carousel></carousel>
        </div>
        <div class="map-wrapper">
            <svg class="map" viewBox="0 0 1149 647" fill="none" xmlns="http://www.w3.org/2000/svg">
                <image x="0" y="0" width="1149" height="647" xlink:href="/images/home-bg/map-min.png" />
                <g>
                    <rect x="269.421" y="209.424" width="92.8256" height="37.3567" rx="6" fill="#1E2437" />
                    <text x="280.421" y="235.424" width="92.8256" height="37.3567" fill="#C8D0E9">New York</text> 
                </g>
                <g>
                    <rect x="603.423" y="164.143" width="77.8256" height="37.3567" rx="6" fill="#1E2437"/>
                    <text x="626.423" y="188.143" width="92.8256" height="37.3567" fill="#C8D0E9">Kyiv</text> 
                </g>
                <g>
                    <rect x="692" y="280.741" width="85.4493" height="37.3567" rx="6" fill="#1E2437"/>
                    <text x="706" y="303.741" width="72.4493" height="37.3567" fill="#C8D0E9">Sharjah</text> 
                </g>    
                <g>
                    <rect x="962.217" y="202.632" width="74.7133" height="37.3567" rx="6" fill="#1E2437"/>
                    <text x="974.217" y="226.632" width="74.7133" height="37.3567" fill="#C8D0E9">Tokyo</text> 
                </g>
                <circle cx="314.702" cy="266.025" r="9.05616" fill="#D1B87C"/>
                <circle class="pulse" id="new-york" @mouseover="pointOn('new-york')" @mouseleave="pointOut()" opacity="0.3" cx="314.701" cy="266.025" r="15.8483" fill="#D1B87C" />
                <circle cx="735.813" cy="345.266" r="9.05616" fill="#D1B87C"/>
                <circle class="pulse" id="dubai" @mouseover="pointOn('dubai')" @mouseleave="pointOut()" opacity="0.3" cx="735.813" cy="345.266" r="15.8483" fill="#D1B87C"/>
                <circle class="hover-item" cx="642.987" cy="224.14" r="9.05616" fill="#D1B87C"/>
                <circle class="pulse" id="kyiv" @mouseover="pointOn('kyiv')" @mouseleave="pointOut()"  opacity="0.3" cx="642.987" cy="224.14" r="15.8483" fill="#D1B87C"/>
                <circle class="hover-item" cx="998.441" cy="261.497" r="9.05616" fill="#D1B87C"/>
                <circle class="pulse" id="tokyo" @mouseover="pointOn('tokyo')" @mouseleave="pointOut()" opacity="0.3" cx="998.442" cy="261.497" r="15.8483" fill="#D1B87C"/>
            </svg>
            <div @mouseover="isActive = true" @mouseleave="isActive = false" id="office-preview" class="office-preview" v-show="isActive">
                <office 
                    :title="officeTitle" 
                    :preview="officeImage"
                    :email="officeEmail"
                    :address="oficeAddress">
                </office>  
            </div>
        </div>
        <transition name="fade">
            <div class="partners-wrapper">
                <h3 class="partners-title">Partners</h3>
                <div class="partner-items">
                    <div class="partner-wrapper">
                        <div class="number" v-bind:class="{'active' : isICActive}">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <span>01</span>
                                </div>
                                <div class="flip-card-back">
                                    <img class="ic" src="images/icons/logo_ic.png" alt="ic logo">
                                </div>
                            </div>
                        </div>
                        <div class="description" v-on:mouseover="isICActive = true" v-on:mouseleave="isICActive = false">
                            <h4 class="item-title"><a href="//g-and-l.co.jp" target="_blank">G&L - Tokyo</a></h4>
                            <p class="item-descr">Consulting Partner</p>
                        </div>
                    </div>
                    <div class="partner-wrapper">
                        <div class="number" v-bind:class="{'active' : isSenseCodeActive}">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <span>02</span>
                                </div>
                                <div class="flip-card-back">
                                    <img class="sens-code" src="images/icons/logo-inverse.svg" alt="sens code logo">
                                </div>
                            </div>
                        </div>
                        <div class="description" v-on:mouseover="isSenseCodeActive = true" v-on:mouseleave="isSenseCodeActive = false">
                            <h4 class="item-title"><a href="//senscode.tech" target="_blank">SensCode - Tallinn</a></h4>
                            <p class="item-descr">Technology Partner</p>
                        </div>
                    </div>
                    <div class="partner-wrapper">
                        <div class="number" v-bind:class="{'active' : isJoinJapanActive}">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <span>03</span>
                                </div>
                                <div class="flip-card-back">
                                    <img class="join-japan" src="images/icons/jj.svg" alt="join japan logo">
                                </div>
                            </div>
                        </div>
                        <div class="description" v-on:mouseover="isJoinJapanActive = true" v-on:mouseleave="isJoinJapanActive = false">
                            <h4 class="item-title"><a href="//www.joinjapan.com.ua" target="_blank">JoinJapan - Kiev</a></h4>
                            <p class="item-descr">Marketing Partner</p>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        </div>
    </div>
</template>
<style lang="scss" scoped>
    @import './../../../sass/app';
    .bg-wrapper {
        position:relative;
        height:inherit;
        overflow:hidden;
    }

    .wrapper {
        height:inherit;
        z-index:2;
    }

    #bg-image {
        position:absolute;
        top:0;
        left:0;
        right:0;
        bottom:0;
        @include background-size(cover);
        z-index:1;
        @include filter(blur, 3px);

        &:after {
            content: '';
            position: absolute;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background: -moz-linear-gradient(top,  rgba(30,36,55,0.95) 0%, rgba(30,36,55,0.99) 14%, rgba(30,36,55,0.75) 50%, rgba(30,36,55,1) 89%, rgba(30,36,55,1) 99%, rgba(30,36,55,1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top,  rgba(30,36,55,0.95) 0%,rgba(30,36,55,0.99) 14%,rgba(30,36,55,0.75) 50%,rgba(30,36,55,1) 89%,rgba(30,36,55,1) 99%,rgba(30,36,55,1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom,  rgba(30,36,55,0.95) 0%,rgba(30,36,55,0.99) 14%,rgba(30,36,55,0.75) 50%,rgba(30,36,55,1) 89%,rgba(30,36,55,1) 99%,rgba(30,36,55,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f21e2437', endColorstr='#1e2437',GradientType=0 ); /* IE6-9 */
            z-index:2;
        }
    }

    .map-wrapper {
        position: relative;
        height: 70%;
        top: 0;
        bottom: 0;
        width: 70%;
        margin:auto;
        display:flex;
        align-items: center;
        justify-content:center;

        .hover-item:hover {
            fill: #fff;
        }
    }

    .office-section-title {
        position: relative;
        @include font-size($section-header-font-size);
        padding-top: 35px;
        color: $white;
        text-align:center;
        z-index: 3;
    }

    .office-preview {
        position: fixed;
        top: 0;
        left: 0;
        width: 300px;
        height: 280px;
        background-color: $black;
        z-index:4;
        &:after {
            content:'';
            position: absolute;
            left: -7px;
            margin-left: 50%;
            bottom: -10px;
            width: 0; 
            height: 0; 
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid $black;
        }
    }

    .map {
        width: 1100px;
        z-index:2;
    }

    .partners-wrapper {
        position:relative;
        margin-top: -130px;
        padding-bottom: 50px;
        color: $white;
        z-index:3;
     
        background: rgba(30,36,55,0);
        background: -moz-linear-gradient(top, rgba(30,36,55,0) 0%, rgba(30,36,55,0.61) 12%, rgba(30,36,55,0.96) 53%, rgba(30,36,55,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(30,36,55,0)), color-stop(12%, rgba(30,36,55,0.61)), color-stop(53%, rgba(30,36,55,0.96)), color-stop(100%, rgba(30,36,55,1)));
        background: -webkit-linear-gradient(top, rgba(30,36,55,0) 0%, rgba(30,36,55,0.61) 12%, rgba(30,36,55,0.96) 53%, rgba(30,36,55,1) 100%);
        background: -o-linear-gradient(top, rgba(30,36,55,0) 0%, rgba(30,36,55,0.61) 12%, rgba(30,36,55,0.96) 53%, rgba(30,36,55,1) 100%);
        background: -ms-linear-gradient(top, rgba(30,36,55,0) 0%, rgba(30,36,55,0.61) 12%, rgba(30,36,55,0.96) 53%, rgba(30,36,55,1) 100%);
        background: linear-gradient(to bottom, rgba(30,36,55,0) 0%, rgba(30,36,55,0.61) 12%, rgba(30,36,55,0.96) 53%, rgba(30,36,55,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e2437', endColorstr='#1e2437', GradientType=0 );
    }

    .partners-title {
        text-align:center;
        @include font-size($section-header-font-size);
    }

    .partner-items {
        display:flex;
        justify-content: center;
        align-items: center; 
        margin-bottom: 0;
    }

    .partner-wrapper {
        margin: 30px;
        display:flex;
        align-items:center;
        justify-content:center;

        .number {
            $circle-size: 80px;

            width: $circle-size;
            height: $circle-size;

            text-align:center;
            border: 1px solid rgba(255, 255, 255, .2);
            @include b-radius(50px);
            margin-right: 15px;

            perspective: 1000px;


            .flip-card-inner {
                position: relative;
                width: 100%;
                height: 100%;
                text-align: center;
                transition: transform 0.8s;
                transform-style: preserve-3d;
            }

            &.active .flip-card-inner {
                transform: rotateY(180deg);
            }

            .flip-card-front, .flip-card-back {
                position: absolute;
                width: 100%;
                height: 100%;
                backface-visibility: hidden;
                overflow:hidden;
                img {
                    position:relative;
                    height: 100%;

                    &.sens-code {
                        top: -110px;
                        left: -41px;
                        width: 342px;
                        height: 298px;
                    }

                    &.join-japan {
                        left: 1px;
                    }

                    &.ic {
                        width: 50px;
                        height: auto;
                    }
                }
            }
            .flip-card-front {
                background-color: transparent;
                color: black;
            }

            /* Style the back side */
            .flip-card-back {
                color: white;
                transform: rotateY(180deg);
            }

            span {
                line-height: $circle-size;
                color: $gold;
                @include font-size(18px);
            }
        }

        .description {
            .item-title {
                @include font-size(18px);
                margin-bottom: 7px;

                a {
                    color: $white;
                }
            }

            .item-descr {
                @include font-size($section-text-font-size);
                color: $gray-light;
            }
        }
    }
    
    .mobile-offices-carousel {
        display: none;
        height: 300px;
    }

    .pulse {
        @include transition(all 1.2s ease-in);
        @include animation(pulse 1.2s infinite cubic-bezier(0.66, 0, 0, 1));
    }

    @include keyframes(pulse) {
        0% {
            r: 9.05616;
            @include opacity(.1);
        }
        10% {
            r: 12.05616;
            @include opacity(.6);
        }
        20% {
            r: 15.05616;
            @include opacity(.6);
        }
        30% {
            r: 17.05616;
            @include opacity(.6);
        }
        40% {
            r: 18.05616;
            @include opacity(.6);
        }
        50% {
            r: 20.05616;
            @include opacity(.6);
        }
        60% {
            r: 22.05616;
            @include opacity(.6);
        }
        70% {
            r: 23.05616;
            @include opacity(.5);
        }
        100% {
            r: 23.05616;
            @include opacity(.1);
        }
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s ease;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0
    }


    @media (max-width: 575.98px) { 
        .map-wrapper {
            display: none;
        }

        .partners-wrapper {
            position: static;
            margin: 0;
            margin-top: 20px;
            display: block;
            padding-bottom: 0;
        }

        .mobile-offices-carousel {
            display: block;
        }

        .office-section-title {
            @include font-size(27px);
            width:100%;
            padding: 35px 20px 15px;
            text-align: left;
        }

        .partners-title {
            @include font-size(27px);
            width: 90%;
            margin: 30px auto 20px;
            text-align: left;
        }

        .partner-items {
            display: block;
            width: 95%;
            margin:auto;
        }

        .partner-wrapper {
            justify-content: flex-start;
            align-items: flex-start;
            width: 100%;
            margin: 0 0 15px;
            padding: 10px;

            .number {
                width: 70px;
                height: 70px;

                span {
                    line-height: 70px;
                }
            }

            .description {
                display: flex;
                flex-direction: column;
                justify-content: center;
                height: 70px;
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
<script lang="ts">
import Vue from 'vue'
import officeItem from './../parts/office-item';
import officeCarousel from './../parts/carousel-offices';

export default Vue.extend({
    data() {
        return {
            isActive: false,
            isJoinJapanActive: false,
            isSenseCodeActive: false,
            isICActive: false,
            officeTitle: '',
            officeImage: '',
            officeEmail: '',
            oficeAddress: '',
            officesInfo: {
                'new-york' : {
                    title: "D&D promotion New York",
                    imageUrl: '/images/office/NY-thumbnail.jpg',
                    imageBgUrl: '/images/office/NY-bg.jpg',
                    email: 'newyork@dnd.promo',
                    address: '385 5th Ave, New York City, NY, USA'
                },
                'dubai' : {
                    title: "D&D promotion Sharjah",
                    imageUrl: '/images/office/Sharaj-thumbnail.jpg',
                    imageBgUrl: '/images/office/Sharaj-bg.jpg',
                    email: 'sharjah@dnd.promo',
                    address: 'Sharjah Media City, Sharjah, UAE'
                },
                'kyiv' : {
                    title: "D&D promotion Kyiv",
                    imageUrl: '/images/office/Kiev-thumbnail.jpg',
                    imageBgUrl: '/images/office/Kiev-bg.jpg',
                    email: 'kyiv@dnd.promo',
                    address: 'Block B6, Cosmopolite Mall, V.Hetmana 6, Kyiv, Ukraine'
                },
                'tokyo' : {
                    title: "D&D promotion Tokyo",
                    imageUrl: '/images/office/TOKYO-thumbnail.jpg',
                    imageBgUrl: '/images/office/TOKYO-bg.jpg',
                    email: 'tokyo@dnd.promo',
                    address: '3-2-21 Nishiazabu, Minato-ku, Tokyo, Japan'
                }
            }
        }
    },
    components: {
       'office' : officeItem,
       'carousel': officeCarousel
    },
    methods: {
        pointOn(idStr) {

            const pointInfo = document.getElementById(idStr).getBoundingClientRect();
            const viewWrapper = document.getElementById('office-preview');

            const centerY = pointInfo.y + (pointInfo.height / 2);
            const centerX = pointInfo.x + (pointInfo.width / 2);

            viewWrapper.style.top = centerY - 305 + 'px';
            viewWrapper.style.left = centerX - 154 + 'px';

            const office = this.officesInfo[idStr];

            this.officeTitle = office.title;
            this.officeImage = office.imageUrl;
            this.officeEmail = office.email;
            this.oficeAddress = office.address;
            
            const wrapper = document.getElementById('bg-image');
            wrapper.style.backgroundImage = 'url(' + office.imageBgUrl + ")";

            this.isActive = true;
        },
        pointOut() {
            this.isActive = false;
        }
    },
    mounted() {
        document.addEventListener('scroll', () => this.isActive = false);
    }
})
</script>
