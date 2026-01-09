/** @type {import('tailwindcss').Config} */
export default {
    darkMode: ["class"],
    content: [
    "./pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./components/**/*.{js,ts,jsx,tsx,mdx}",
    "./app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
	container: {
  			center: true,
  			padding: "15px",
  		},	
		screens: {
			sm: "640px",
			md: "768px",
			lg: "960px",
			xl: "1280px",
			"2xl": "1536px",
		},
		fontFamily:{
			primary: "var(--font-dmSans)",
			secondary: "var(--font-barlow)",
		},
  	extend: {
  		colors: {
			primary: "#0072b1",
        	secondary: "#DDB60A",
        	accent: "#FFca3b",
			border:"#d7d7d7",
		},
		boxShadow:{
			custom: "0px 4px 54px rgba(18, 19, 21, 0.08)",
		},

		backgroundImage: {
			hero: "url('/assets/learning_hero_1.jpg')",
		},
	},
  },
  plugins: [require("tailwindcss-animate")],
};
