export default {
    computed: {
        _host() {
            return window._HOST;
        },
    },
    methods: {
        url(val) {
            return this._host + "/" + val;
        },
    },
};
