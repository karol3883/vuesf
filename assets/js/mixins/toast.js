export default {
    created: function () {
        console.log('mixin hook called')
    },
    methods: {
        showToast(options, callback) {

            const { toast_details } = options.data;

            console.log(options);

            if (!toast_details) {
                console.log("No toast details");
                return;
            }

            let message = toast_details.message || "Wystąpił błądaaaa!";

            let defaultDelay = 5000;
            this.$bvToast.toast(
                message,
                {
                    title: toast_details.title || "",
                    autoHideDelay: defaultDelay,
                    appendToast: true,
                    variant: toast_details.variant || 'danger',
                })

            setTimeout(() => callback(), defaultDelay);
        }
    }
}