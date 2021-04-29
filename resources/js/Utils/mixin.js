const mixin = {
    data() {
        return {
            // Do not delete this.
            // HeaderComponent.vue(menu) depends on it
            _sidebarOpen: false,
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
        $storage_url() {
            return `${process.env.MIX_APP_URL}/storage`;
        },
        $documents_url() {
            return `${this.$storage_url}/documents`;
        },
        $passport_photos_url() {
            return `${this.$storage_url}/photos`;
        },
    },

    // provide() {
    //     return {
    //         user:
    //             typeof this.$attrs.auth != "undefined"
    //                 ? this.$attrs.auth.user
    //                 : null,
    //         settings:
    //             typeof this.$attrs.settings != "undefined"
    //                 ? this.$attrs.settings.user
    //                 : null,
    //     };
    // },

    methods: {
        $emitValue(event, value, modifier) {
            let val = value;
            if (modifier) {
                if (modifier.capitalize) {
                    val = val.charAt(0).toUpperCase() + val.slice(1);
                }
                if (modifier["no-whitespace"]) {
                    val = val.replace(/\s/g, "");
                }
                if (modifier["unmask-phone"]) {
                    val = val.replace(/[^0-9.]/g, "").trim();
                }
                if (modifier.sentence) {
                    val = this.$titleCase(val);
                }
            }

            if (typeof event == "string") this.$emit(event, val);

            return event;
        },
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

    mounted() {
        //
    },
};

export default mixin;
