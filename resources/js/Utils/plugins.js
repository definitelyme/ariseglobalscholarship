import moment from "moment";
import Swal from "sweetalert2";
import mitt from "mitt";
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
};

export default plugins;
