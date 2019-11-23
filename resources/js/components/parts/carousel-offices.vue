<template>
    <div id="carousel-offices" class="view-port">
        <div class="slides-wrapper">
            <transition-group name="slide-fade" tag="div">
                <div v-for="office in displayArr" :key="office.index" class="slide-office">
                    <office 
                        :title="office.title" 
                        :preview="office.imageUrl"
                        :email="office.email"
                        :address="office.address">
                    </office>  
                </div>
            </transition-group>
        </div>
        <div class="paging">
            <div class="item" v-on:click="goToItem(index)" v-bind:class="{'active': index == actvieIndex }" v-for="(office, index) in sourceArr" :key="index"></div>
        </div>
    </div>
</template>
<script>

import office from './office-item';
import Vue from 'vue';
import CustomSwipe from './../../swipe';
import { setTimeout, setInterval } from 'timers';

export default {
     data() {
            return {
                actvieIndex: 0,
                displayArr: [],
                sourceArr: [
                     {
                        index: 1,
                        title: "D&D promotion New York",
                        imageUrl: '/images/office/NY-thumbnail.jpg',
                        email: 'newyork@dnd.promo',
                        address: '385 5th Ave, New York City, NY, USA'
                    },
                     {
                        index:2,
                        title: "D&D promotion Sharjah",
                        imageUrl: '/images/office/Sharaj-thumbnail.jpg',
                        email: 'sharjah@dnd.promo',
                        address: 'Sharjah Media City, Sharjah, UAE'
                    },
                    {
                        index: 3,
                        title: "D&D promotion Kyiv",
                        imageUrl: '/images/office/Kiev-thumbnail.jpg',
                        email: 'kyiv@dnd.promo',
                        address: 'Block B6, Cosmopolite Mall, V.Hetmana 6, Kyiv, Ukraine'
                    },
                     {
                        index: 4, 
                        title: "D&D promotion Tokyo",
                        imageUrl: '/images/office/TOKYO-thumbnail.jpg',
                        email: 'tokyo@dnd.promo',
                        address: '3-2-21 Nishiazabu, Minato-ku, Tokyo, Japan'
                    }
                ]
            }
        },
        components: {
            'office' : office
        },
        methods: {
            runCarousel: function() {
                this.displayArr = this.sourceArr;
            },

            next: function() {
                let index = this.actvieIndex + 1;
                
                if(index > 3) {
                    index = 0;
                }
                
                this.actvieIndex = index;

                this.displayArr.push(this.displayArr.shift());
            },

            prev: function() {
                let index = this.actvieIndex - 1;
                
                if(index < 0) {
                    index = 3;
                }
                
                this.actvieIndex = index;

                this.displayArr.unshift(this.displayArr.pop())
            },

            getNextIndex(index) {
                let next = index+1;
                if(this.sourceArr[next]) {
                    return next
                } 
                return 0;
            },

            goToItem(index) {
                do {
                    this.next();
                } while (this.actvieIndex != index);
            }
        },
        mounted() {
            this.runCarousel();

            let swipe = new CustomSwipe('carousel-offices', this.next, this.prev);

            setTimeout(() => {
                swipe.init();
            }, 1000);
        }
}
</script>
<style lang="scss" scoped>
   @import './../../../sass/app';

    .view-port {
        height: inherit;
        overflow: hidden;
        height: 350px;
    }

    .slides-wrapper {
        position:relative;
        left: 50%;
        margin-left: -174px;
        display: flex;
        height: auto;
        width: auto;
        @include calc(width, 340px * 4);
        
    }

    .slide-office {
        float:left;
        display: block;
        height: 260px;
        width: 300px;
        margin: 0 10px;
        padding: 0 3px;
        background-color: $black;
    }

     .slide-fade {
            &:first-child, &:last-child {
                visibility: hidden !important;
            }

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


    .paging {
        width: 100%;
        display:flex;
        align-items: center;
        justify-content: center;
        padding-top: 30px;
    }

    .item {
        width: 10px;
        height:  10px;
        background-color: $gold;
        margin: 0 15px;
        border-radius: 25px;
        
        &.active {
            width: 15px;
            height:  15px;
            margin: 0 10px;
        }
    }
</style>