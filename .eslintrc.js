module.exports = {
    "env": {
        "browser": true,
        "commonjs": true,
        "es2021": true
    },
    "extends": [
        "eslint:recommended",
        "plugin:vue/essential",
        "plugin:prettier/recommended"
    ],
    "parserOptions": {
        "ecmaVersion": 12
    },
    "plugins": [
        "vue",
        "prettier"
    ],
    "rules": {
        "no-undef": "off"
    }
};
