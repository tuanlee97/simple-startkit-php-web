#### STEP 1: Start Project

Run: npm install

#### STEP 2: Build CSS

A. Build Global CSS

Window OS: npx tailwindcss -i .\tailwind_src\global.css -o .\public\css\global.css --watch

Linux OS: npx tailwindcss -i ./tailwind_src/global.css -o ./public/css/global.css --watch

---

B. Build Specific CSS, ex: public/css/pages/home.css

Window OS: npx tailwindcss -i .\tailwind_src\pages\home.css -o .\public\css\pages\home.css --watch

Linux OS: npx tailwindcss -i ./tailwind_src/pages/home.css -o ./public/css/pages/home.css --watch

----Happy Coding----

---

#### STRUCTURE

/project-root
|-- /app
| |-- PageHelper.php
| |-- Route.php
|-- /public
| |-- /images
| | |-- not-found.jpg
| |-- /css
| | |-- global.css
| | |-- header.css
| | |-- footer.css
| | |-- /pages
| | |-- home.css
| | |-- about.css
| |-- /js
| | |-- global.js
| | |-- /pages
| | |-- home.js
| | |-- about.js
| |-- index.php
|-- /pages
| |-- /templates
| | |-- header.php
| | |-- footer.php
| |-- /home.php
| |-- /about.php
| |-- 404.php
| |-- 500.php
|-- /tailwind.config.js
|-- /node_modules
|-- /package.json
|-- /tailwind_src
| |-- global.css
| |-- header.css
| |-- footer.css
| |-- /pages
| |-- home.js
| |-- about.js
