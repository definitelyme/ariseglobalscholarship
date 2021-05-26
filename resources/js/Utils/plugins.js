import moment from "moment";
import Swal from "sweetalert2";
import mitt from "mitt";
import Flutterwave from "flutterwave-vue-v3";

// import MultiSelect from "@vueform/multiselect";
// import { reactive, toRefs } from "vue";

const emitter = mitt();

window.onerror = () => {
    emitter.emit("error", () => location.reload());
};

//import Tracker from "@asayerio/tracker";

// Setup tracker
//const tracker = new Tracker({
//    projectID: 7105153169947095,
//});

// Start tracker
//tracker.start();

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

const plugins = (app) => {
    app.config.globalProperties.$emitter = emitter;

    app.config.globalProperties.$on = (type, handler) =>
        emitter.on(type, handler);

    app.config.globalProperties.$off = (type, handler) =>
        emitter.off(type, handler);

    app.config.globalProperties.$alert = Swal;

    app.config.globalProperties.$toast = Toast;

    app.config.globalProperties.$moment = moment;

    // app.use(MultiSelect);
    // Public Key ===> FLWPUBK-e8d040940b9fcbc0ec44bc2fbb936641-X
    // Secret Key ===> FLWSECK-8a8dd5afa211ae139db6fcb0039a6984-X
    // Encryption Key ===> 8a8dd5afa211a1d4d62aade9
    app.use(Flutterwave, {
        publicKey: "FLWPUBK-e8d040940b9fcbc0ec44bc2fbb936641-X",
    });
};

export default plugins;
