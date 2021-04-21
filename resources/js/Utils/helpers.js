import Mixin from "./mixin";
import mitt from "mitt";
import Province from "./regional/index";
// import { reactive, toRefs } from "vue";
import kLists from "./lists";
import directives from "./directives";
import Swal from "sweetalert2";
//import Tracker from "@asayerio/tracker";

import DeviceDetector from "mobile-device-detect";

const emitter = mitt();

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

// Setup tracker
//const tracker = new Tracker({
//    projectID: 7105153169947095,
//});

// Start tracker
//tracker.start();

window.onerror = () => {
    emitter.emit("error", () => location.reload());
};

const titleCase = (string) => {
    // Step 1. Lowercase the string
    string = string.toLowerCase();
    // str = "I'm a little tea pot".toLowerCase();
    // str = "i'm a little tea pot";

    // Step 2. Split the string into an array of strings
    string = string.split(" ");
    // str = "i'm a little tea pot".split(' ');
    // str = ["i'm", "a", "little", "tea", "pot"];

    // Step 3. Create the FOR loop
    for (var i = 0; i < string.length; i++) {
        string[i] = string[i].charAt(0).toUpperCase() + string[i].slice(1);
        /* Here string.length = 5
            1st iteration: str[0] = str[0].charAt(0).toUpperCase() + str[0].slice(1);
                        str[0] = "i'm".charAt(0).toUpperCase()  + "i'm".slice(1);
                        str[0] = "I"                            + "'m";
                        str[0] = "I'm";
            2nd iteration: str[1] = str[1].charAt(0).toUpperCase() + str[1].slice(1);
                        str[1] = "a".charAt(0).toUpperCase()    + "a".slice(1);
                        str[1] = "A"                            + "";
                        str[1] = "A";
            3rd iteration: str[2] = str[2].charAt(0).toUpperCase()   + str[2].slice(1);
                        str[2] = "little".charAt(0).toUpperCase() + "little".slice(1);
                        str[2] = "L"                              + "ittle";
                        str[2] = "Little";
            ...
        */
    }
    // Step 4. Return the output
    return string.join(" "); // ["I'm", "A", "Little", "Tea", "Pot"].join(' ') => "I'm A Little Tea Pot"
};

const find = (array, predicate, ctx) => {
    var result = null;
    array.some((el, i) => {
        return predicate.call(ctx, el, i, array)
            ? ((result = el), true)
            : false;
    });
    return result;
};

const calculateAge = (birthday) => {
    if (typeof birthday == "string") birthday = new Date(Date.parse(birthday));
    var ageDiffMs = Date.now() - birthday.getTime();
    var ageDate = new Date(ageDiffMs); // miliseconds from epoch
    return Math.abs(ageDate.getUTCFullYear() - 1970);
};

const slugify = (str, seperator) => {
    const sep = seperator || "-";
    str = str.replace(/^\s+|\s+$/g, ""); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "åàáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to = "aaaaaaeeeeiiiioooouuuunc------";

    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
    }

    str = str
        .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
        .replace(/\s+/g, sep) // collapse whitespace and replace by -
        .replace(/-+/g, "-"); // collapse dashes

    return str;
};

const guid = () => {
    let s4 = () => {
        return Math.floor((1 + Math.random()) * 0x10000)
            .toString(16)
            .substring(1);
    };
    //return id of format 'aaaaaaaa'-'aaaa'-'aaaa'-'aaaa'-'aaaaaaaaaaaa'
    return (
        s4() +
        s4() +
        "-" +
        s4() +
        "-" +
        s4() +
        "-" +
        s4() +
        "-" +
        s4() +
        s4() +
        s4()
    );
};

const replace = (str, glue, exp) => {
    RegExp.quote = function (str) {
        return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
    };

    var expression = exp || "-";
    var joiner = glue || "";
    var regex = new RegExp(RegExp.quote(expression), "g");

    let string = str.replace(regex, joiner);
    return string;
};

const logger = (msg) => {
    console.log(msg);
};

const utils = {
    install: (app, options) => {
        app.config.globalProperties.$events = {
            tester: "tester",
            sidebar: "toggleSidebar",
            closeSidebar: "closeSidebar",
            profileDropdown: "toggleProfileDropdown",
            toggleFullOverlay: "toggleOverlay",
            onSelectionChanged: "selection-changed-event",
            toggleDashboardMenu: "toggle-dashboard-menu",
            toggleDashboardTabMenu: "toggle-dashboard-tab-menu",
            applicationTabChanged: "application-tab-changed",
            switchNextTab: "switch-next-tab",
            switchPrevTab: "switch-prev-tab",
            closeModal: "close-modal",
            openModal: "open-modal",
        };

        app.config.globalProperties.$Province = Province;

        app.config.globalProperties.$kLists = kLists;

        app.config.globalProperties.$titleCase = titleCase;

        app.config.globalProperties.$find = find;

        app.config.globalProperties.$replace = replace;

        app.config.globalProperties.$slugify = slugify;

        app.config.globalProperties.$guid = guid;

        app.config.globalProperties.$logger = logger;

        app.config.globalProperties.$calculateAge = calculateAge;

        app.config.globalProperties.$alert = Swal;

        app.config.globalProperties.$toast = Toast;

        app.config.globalProperties.$detector = DeviceDetector;

        app.config.globalProperties.$emitter = emitter;

        app.config.globalProperties.$on = (type, handler) =>
            emitter.on(type, handler);

        app.config.globalProperties.$off = (type, handler) =>
            emitter.off(type, handler);

        // app.config.globalProperties.$reactive = reactive;

        // app.config.globalProperties.$toRefs = toRefs;

        directives.clickOutside(app);

        directives.reactive(app);

        directives.switchColor(app);

        app.mixin(Mixin);
    },
};

export { titleCase, find, slugify, replace, emitter, utils };
