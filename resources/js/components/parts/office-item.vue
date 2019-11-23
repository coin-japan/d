<template>
    <div class="office-info">
        <div class="preview">
            <img :src="preview" :alt="title"/>
        </div>
        <h4 class="title">{{ title }}</h4>
        <a :href="'mailto:' + email" class="email">{{ email }}</a>
        <p class="address">{{ $i18n.locale == 'jp' && title == 'D&D promotion Tokyo' ? "〒106-0031 東京都港区西麻布3-2-21 8階" : address }}</p>
    </div>
</template>
<style scoped lang="scss">
    @import './../../../sass/app';

    .office-info {
        padding: 10px;
    }

    .preview {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 130px;

        img {
            position:relative;
            top: 50%;
            @include translateY(-50%);
            width: 100%;
        }
    }

    .title {
        @include font-size(17px);
        padding: 0 10px;
        margin-top: 10px;
        color: $white;
        font-weight: bold;
    }

    .email {
        margin-top: 5px;
        margin-left: 10px;
        display: inline-block;
        @include font-size(16px);
        color: $gold;
        border-bottom: 1px dashed $gold;
        text-decoration:none;
    }

    .address {
        padding: 0 10px;
        margin-top: 5px;
        @include font-size(16px);
        color: $white;
    }

    // Extra small devices (portrait phones, less than 576px)
    @media (max-width: 575.98px) { 

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
    import Vue from 'vue';
    
    export default Vue.extend({
        props: {
            title: String,
            preview: String,
            address: String,
            email: String
        }
    });
</script>