export default {
    created: function () {
        console.log('mixin hook called')
    },
    methods: {
        showToast(options) {

            const { toast_details } = options.data;

            console.log(options);

            if (!toast_details) {
                console.log("No toast details");
                return;
            }

            let message = toast_details.message || "Wystąpił błądaaaa!";

            this.$bvToast.toast(
                message,
                {
                    title: toast_details.title || "",
                    autoHideDelay: toast_details.toast_title || 5000,
                    appendToast: true,
                    variant: toast_details.variant || 'danger',
                })
        }
    }
}