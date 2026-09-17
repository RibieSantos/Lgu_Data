import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: "var(--primary)",
                "primary-hover": "var(--primary-hover)",

                secondary: "var(--secondary)",
                "secondary-hover": "var(--secondary-hover)",
                "secondary-light": "var(--secondary-light)",

                bg: "var(--bg)",
                surface: "var(--surface)",
                sidebar: "var(--sidebar)",

                text: "var(--text)",
                muted: "var(--text-muted)",

                border: "var(--border)",
                "border-light": "var(--border-light)",

                success: "var(--success)",
                warning: "var(--warning)",
                error: "var(--error)",
                info: "var(--info)",
            },

            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
