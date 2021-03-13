const mixin = {
    data() {
        return {
            // $sidebarOpen: false,
        };
    },

    computed: {
        $app_url() {
            return `${process.env.MIX_APP_URL}`;
        },
        $app_name() {
            return `${process.env.MIX_APP_NAME}`;
        },
        $app_name_short() {
            return `${process.env.MIX_APP_NAME_SHORT}`;
        },
        $app_initials() {
            return `${process.env.MIX_APP_INITIALS}`;
        },
        $app_env() {
            return `${process.env.MIX_APP_ENV}`;
        },
        $asset_url() {
            return `${process.env.MIX_ASSET_URL}`;
        },
        $asset_url_import() {
            return `${process.env.MIX_ASSET_URL_IMPORT}`;
        },
    },

    methods: {
        $visit({
            url,
            method,
            data,
            replace,
            preserveState,
            preserveScroll,
            errorBag,
            onSuccess,
            onError,
            onFinish,
        }) {
            const _method = method || "get";
            const _replace = replace || false;
            const _preserveState = preserveState || false;
            const _preserveScroll = preserveScroll || true;
            // const onSuccess = onSuccess || (page) => {};

            return this.$inertia.visit(url, {
                method: _method,
                data: data,
                replace: _replace,
                preserveState: _preserveState,
                preserveScroll: _preserveScroll,
                errorBag: errorBag,
                // onCancelToken: (cancelToken) => {},
                // onCancel: () => {},
                // onBefore: (visit) => {},
                // onStart: (visit) => {},
                // onProgress: (progress) => {},
                onSuccess: onSuccess,
                onError: onError,
                onFinish: onFinish,
            });
        },
    },
};

export default mixin;
