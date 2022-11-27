/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#ed9c10",
                    "secondary": "#058e5c",
                    "accent": "#b5ffad",
                    "neutral": "#27223A",
                    "base-100": "#F1ECF3",
                    "info": "#609AE6",
                    "success": "#5EDECB",
                    "warning": "#FCAD45",
                    "error": "#F2634A",
                },
            },
        ],
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
        require("daisyui"),
    ],
}
