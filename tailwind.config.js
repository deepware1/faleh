/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
        "./vendor/lara-zeus/core/resources/views/**/*.blade.php",
        "./vendor/lara-zeus/sky/resources/views/themes/**/*.blade.php",
        "./vendor/lara-zeus/sky/resources/views/filament/**/*.blade.php",
    ],
    theme: {
        container: {
            paddingInline: '2rem'
        },
        extend: {
            colors: {
                primary: {
                    "50": "#eff6ff",
                    "100": "#dbeafe",
                    "200": "#bfdbfe",
                    "300": "#93c5fd",
                    "400": "#60a5fa",
                    "500": "#3b82f6",
                    "600": "#2563eb",
                    "700": "#1d4ed8",
                    "800": "#1e40af",
                    "900": "#1e3a8a",
                    "950": "#172554"
                }
            },
            height: {
                '100': '28rem',
            },
            spacing: {
                '100': '28rem',
            }
        },
    },
    layers: {
        'no-tailwindcss': {
            // Add any styles you want to disable here
            '.no-tailwindcss': {
                all: 'unset',
            },
        },
    },
    plugins: [
        require('flowbite/plugin'),
        function ({ addComponents }) {
            addComponents({
                '@layer components': {
                    '.container': {
                        width: '100%',
                        'padding-left': '2rem',
                        'padding-right': '2rem',
                        '@screen md': {
                            'padding-left': '4rem',
                            'padding-right': '4rem',
                        },
                        'margin-left': 'auto',
                        'margin-right': 'auto',
                        'max-width': '1140px',
                    },
                },
            });
        },
    ],
}

