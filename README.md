####

## Getting started 🚀

#### STEP 1: Start Project

Run: `npm install`

#### STEP 2: Build CSS

_Remove option `--watch` if you don't need tailwind auto build css on save._

**A. Build Global CSS**

Window OS: `npx tailwindcss -i .\tailwind_src\global.css -o .\public\css\global.css --watch`

Linux OS: `npx tailwindcss -i ./tailwind_src/global.css -o ./public/css/global.css --watch`

---

**B. Build Specific CSS**
_Ex: public/css/pages/home.css_

Window OS: `npx tailwindcss -i .\tailwind_src\pages\home.css -o .\public\css\pages\home.css --watch`

Linux OS: `npx tailwindcss -i ./tailwind_src/pages/home.css -o ./public/css/pages/home.css --watch`

---

**----Happy Coding----**

---

#### STRUCTURE

<pre>
<b>/project-root</b>
<b>|-- /app</b>
	||-- PageHelper.php
	||-- Route.php
	||-- Config.php
<b>|-- /public</b>
	||-- /images
		|||-- not-found.jpg
	||-- /css
		|||-- global.css
		|||-- header.css
		|||-- footer.css
		|||-- /pages
		|||-- home.css
		|||-- about.css
	||-- /js
		|||-- global.js
		|||-- /pages
		|||-- home.js
		|||-- about.js
	||-- index.php
<b>|-- /pages</b>
	||-- /templates
		|||-- header.php
		|||-- footer.php
	||-- /home.php
	||-- /about.php
	||-- 404.php
	||-- 500.php
<b>|-- /tailwind.config.js</b>
<b>|-- /package.json</b>
<b>|-- /tailwind_src</b>
	||-- global.css
	||-- header.css
	||-- footer.css
	||-- /pages
	||-- home.js
	||-- about.js
</pre>
