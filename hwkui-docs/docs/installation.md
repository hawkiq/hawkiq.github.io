# 🚀 Installation

```bash
composer require hawkiq/hwkui
```

## 🚀   Publish Assets

```bash
php artisan vendor:publish --tag=hwkui-assets
```
this will publish file `hwkui.css` to `resources/css/` needed to correct style widgets

add this line to `app.css` after `@import "tailwindcss";`

```css
@import './hwkui.css';
```
## 🚀 Update

if you want to update use 
```bash
composer update hawkiq/hwkui
```
