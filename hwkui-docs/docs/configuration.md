# ⚙️ Configuration
The config file `config/hwkui.php` defines which JS/CSS plugins to load and whether to use CDN or local assets.

### 1. Publish the Config File

```bash
php artisan vendor:publish --tag=hwkui-config
```

This will create `config/hwkui.php`.

## 🌐 Using CDN (Default)
By default, hwkUI uses CDN links for plugins like jQuery, Select2, and DataTables.

Example from `config/hwkui.php`:

```php
'Select2' => [
    'active' => true,
    'files' => [
        [
            'type' => 'css',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css',
        ],
        [
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js',
        ],
    ],
],

```

## 🗂️ Using Local Assets (Optional)

If you prefer to serve local assets (for offline use or better performance), follow these steps:
### Step 1: Download Required JS/CSS Files

You must download the files manually:

    jQuery: https://code.jquery.com/jquery-3.7.1.min.js

    Select2:

        CSS: https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css

        JS: https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js

    Place them under `public/vendor/hwkui/` or another folder of your choice.

### Step 2: Update config/hwkui.php

Change asset => true and point to your local file path:

```php
'Select2' => [
    'active' => true,
    'files' => [
        [
            'type' => 'css',
            'asset' => true,
            'location' => 'vendor/hwkui/select2.min.css',
        ],
        [
            'type' => 'js',
            'asset' => true,
            'location' => 'vendor/hwkui/select2.min.js',
        ],
    ],
],

```

Laravel will generate the full asset URL using `asset('vendor/hwkui/select2.min.css')`.

---

## 🗂️ Using NPM Assets (Optional)

If you prefer using npm packages, you can disable the plugins in the config file (set to false) and install the required packages: 
```bash
 npm install @popperjs/core @eonasdan/tempus-dominus

 npm install jquery select2

 npm install tom-select
```

These packages will be used for Datetime pickers, Select2, or TomSelect.

Then, in your `app.js`, import the packages:

```js

import $ from "jquery";
import * as Popper from "@popperjs/core";
import { TempusDominus } from "@eonasdan/tempus-dominus";
import "@eonasdan/tempus-dominus/dist/css/tempus-dominus.min.css";
import "select2/dist/js/select2.full.min.js";
import "select2/dist/css/select2.min.css";

import 'tom-select/dist/css/tom-select.css';
import TomSelect from 'tom-select';

window.Popper = Popper;
window.TempusDominus = TempusDominus;
window.$ = $;
window.jQuery = $;
window.Select2 = $.fn.select2;
window.TomSelect = TomSelect;

```