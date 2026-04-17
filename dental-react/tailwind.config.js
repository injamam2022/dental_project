/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{js,ts,jsx,tsx}'],
  theme: {
    extend: {
      colors: {
        'deep-brown': '#4C3A33',
        'stone-beige': '#BDB5A6',
        'soft-ivory': '#F6EBE0',
        'charcoal-black': '#242424',
        'neutral-grey': '#E8E8E8',
        'dark-text': '#242424',
        'medium-text': '#555555',
        'light-bg': '#F6EBE0',
        'primary-orange': '#4C3A33',
      },
      fontFamily: {
        'sans': ['system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
      },
      spacing: {
        'section': '80px',
      },
      borderRadius: {
        'brand': '8px',
        'pill': '9999px',
        'medium': '27px',
      },
    },
  },
  plugins: [],
};
