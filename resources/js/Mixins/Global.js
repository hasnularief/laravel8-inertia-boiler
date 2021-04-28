import axios from "axios";
export default {
    computed: {
        _host() {
            return window._HOST;
        },
    },
    methods: {
        axios,

        url(val) {
            return this._host + val;
        },
    },
};
