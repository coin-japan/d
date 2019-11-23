<template>
    <span>{{ result }}</span>
</template>
<script>
import TweenMax from "gsap/TweenMax";
export default {
    data() {
        return {
            result: 0
        }
    },
    props: {
        from: { default:0 },
        to: { default:0 },
        duration: { default: 1}
    },
    methods: {
        numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        play() {
            const _this = this;
            var counter = { var: this.from };
            TweenMax.to(counter, this.duration, {
                var: this.to,
                onUpdate: function() {
                    _this.result = _this.numberWithCommas(Math.ceil(counter.var));
                },
                ease: Circ.easeOut
            });
        }
    },
    mounted() {
        this.play();
    }
}
</script>