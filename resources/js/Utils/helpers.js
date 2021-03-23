import { Inertia } from "@inertiajs/inertia";
import Mixin from "./mixin";
import mitt from "mitt";

import DeviceDetector from "mobile-device-detect";

const emitter = mitt();

window.onerror = () => {
    emitter.emit("error", () => location.reload());
};

Inertia.on("navigate", (event) => {
    emitter.on("error", async () => {
        console.log("Successfully made a visit to = " + event.detail.page.url);
    });
});

export default {
    install: (app, options) => {
        app.config.globalProperties.$events = {
            sidebar: "toggleSidebar",
            closeSidebar: "closeSidebar",
            profileDropdown: "toggleProfileDropdown",
        };

        app.config.globalProperties.$detector = DeviceDetector;

        app.config.globalProperties.$titleCase = (string) => {
            var sentence = string.toLowerCase().split(" ");

            for (var i = 0; i < sentence.length; i++) {
                sentence[i] =
                    sentence[i][0].toUpperCase() + sentence[i].slice(1);
            }

            return sentence.join(" ");
        };

        app.config.globalProperties.$replace = (str, glue, exp) => {
            RegExp.quote = function (str) {
                return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
            };

            var expression = exp || "-";
            var joiner = glue || "";
            var regex = new RegExp(RegExp.quote(expression), "g");

            let string = str.replace(regex, joiner);
            return string;
        };

        app.config.globalProperties.$slugify = (str, seperator) => {
            const sep = seperator || "-";
            str = str.replace(/^\s+|\s+$/g, ""); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "åàáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaaaeeeeiiiioooouuuunc------";

            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(
                    new RegExp(from.charAt(i), "g"),
                    to.charAt(i)
                );
            }

            str = str
                .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
                .replace(/\s+/g, sep) // collapse whitespace and replace by -
                .replace(/-+/g, "-"); // collapse dashes

            return str;
        };

        app.config.globalProperties.emitter = emitter;

        app.mixin(Mixin);
    },
};
