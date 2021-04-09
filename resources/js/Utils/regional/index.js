const states = require("./states.json");
const utils = require("../helpers");

const checkIsOfType = (param, expected) => {
    if (typeof param !== expected)
        throw new ProvinceException(
            "Invalid Type Argument",
            `Parameter ${param} must be of type ${expected}`
        );
};

const Province = {
    getStates: () => ({
        ids: Object.keys(states),
        names: Object.values(states).map((v) => v.state.name),
        slugs: Object.values(states).map((v) => utils.slugify(v.state.name)),
    }),
    getStateByName: (name) => {
        checkIsOfType(name, "string");

        return (
            Object.values(states).find((v) =>
                v.state.name.toLowerCase().includes(name.toLowerCase())
            ) || null
        );
    },
    getStateById: (id) => {
        checkIsOfType(id, "number");

        return (
            Object.values(states).find(
                (v) => v.state.id.toString() === id.toString()
            ) || null
        );
    },
    getStateByCapital: (capital) =>
        Object.values(states).find(
            (v) => v.state.capital.toLowerCase() === capital.toLowerCase()
        ) || null,
    getLocalGovtCount: (name) => {
        checkIsOfType(name, "string");
        // Get state by name if possible
        let va = Object.values(states).find((v) => v.state.name.includes(name));
        // Else throw exception
        if (typeof va == "undefined")
            throw new ProvinceException(
                "OutofBounds",
                `State \'${name}\' not found!`
            );
        return va.state.locals.length;
    },
    getLocalGovt: (name) => {
        checkIsOfType(name, "string");
        if (!name.length) return [];
        // Get state by name if possible
        let va = Object.values(states).find((v) => v.state.name.includes(name));
        // Else throw exception
        if (typeof va == "undefined")
            throw new ProvinceException(
                "OutofBounds",
                `State \'${name}\' not found!`
            );
        return va.state.locals;
    },
    searchByState: (name) =>
        Object.values(states).filter(
            (v) => v.state.name.toLowerCase().indexOf(name.toLowerCase()) > -1
        ) || null,
    searchByLocalGovt: (local) =>
        [].concat.apply(
            [],
            Object.values(states).map((v) =>
                v.state.locals
                    .filter(
                        (t) =>
                            t.name.toLowerCase().indexOf(local.toLowerCase()) >
                            -1
                    )
                    .map((i) => ({
                        id: i.id,
                        name: i.name,
                        state: v.state.name,
                    }))
            )
        ),
};

class ProvinceException {
    constructor(title, message) {
        this.title = title;
        this.message = message;
    }
}

export default Province;
