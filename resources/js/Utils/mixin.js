const mixin = {
    computed: {
        app_name() {
            return `${process.env.MIX_APP_NAME}`;
        },
        app_name_short() {
            return `${process.env.MIX_APP_NAME_SHORT}`;
        },
        app_env() {
            return `${process.env.MIX_APP_ENV}`;
        },
        asset_url() {
            return `${process.env.MIX_ASSET_URL}`;
        },
    },
    mounted() {
        // console.log(this.asset_url);
    },
};

export default mixin;
