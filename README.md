# React_Projects
# react.js start

<!-- download react.js + vite + tailwind CSS -->
# npm create vite@latest my-project
# cd my-project

# npm install tailwindcss @tailwindcss/vite

<!-- vite.config.js add to -->
<p> import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [
    tailwindcss(),
  ],
}) </p>

<!-- input.css add to -->
# @import "tailwindcss";

<!-- run app -->
# npm run dev