<template>
    <div v-for="(obj, token) in stacked" :key="token">
        <banner-child
            :message="obj.message"
            :style="obj.style"
            @close="close(token)"
        />
    </div>
</template>

<script>
import BannerChild from "./BannerChild.vue";

export default {
    components: { BannerChild },
    data() {
        return {
            show: true,
            stacked: {},
        };
    },

    watch: {
        response_token(val) {
            if (this.message) {
                this.stacked[val] = {
                    message: this.message,
                    style: this.style,
                };
            }
        },
    },

    computed: {
        style() {
            return this.$page.props.jetstream.flash?.bannerStyle || "success";
        },

        message() {
            return this.$page.props.jetstream.flash?.banner || "";
        },

        response_token() {
            return this.$page.props.response_token;
        },
    },

    methods: {
        close(token) {
            delete this.stacked[token];
            console.log("CLOSE TOKEN: " + token);
        },
    },
};
</script>
