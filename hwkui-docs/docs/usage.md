# 🧩 Components

## TomSelect Component

This component replaces Select2.js with a vanilla JS alternative, so it does not depend on jQuery.

Basic Usage in Blade

```blade
<x-hwkui-tom-select
    class="h-full"
    wire:model="customer_id"
    label="Customer"
    placeholder="Select customer...">

    <!-- Default empty option -->
    <option value="">Select Customer...</option>

    <!-- Dynamic options -->
    @foreach ($customers as $c)
        <option value="{{ (string) $c->id }}" wire:key="{{ $c->id }}">
            {{ $c->name }}
        </option>
    @endforeach

</x-hwkui-tom-select>

```
### Passing Additional TomSelect Options
You can pass extra options via the `:options` attribute:

```blade
<x-hwkui-tom-select
    wire:model="customer_id"
    label="Customer"
    :options="[
        'maxItems' => 3,
        'create' => true,
        'plugins' => ['remove_button']
    ]">
</x-hwkui-tom-select>
```

More information about TomSelect setup can be found at the official website [Tom Select]([https://tom-select.js.org/)

## Select2 Component

In your Blade view:

```blade
 <x-hwkui-select wire:model="selectedItem" label="Select User to PLay" placeholder="Select a user Babe">
            @forelse ($users as $user)
                <option wire:key="{{ $user->id }}" value="{{ $user->name }}">{{ $user->name }}</option>
            @empty
                <option value="">No options available</option>
            @endforelse
        </x-hwkui-select>

```
Make sure to include Livewire and the component's scripts on your page.

you can pass options for Select2 like via component

```blade
<x-hwkui-select
    wire:model="selectedUser"
    label="Choose User"
    :options="$options" 
>
</x-hwkui-select>

```

or direct array

```blade
<x-hwkui-select
    wire:model="selectedUser"
    label="Choose User"
    :options="[
         'placeholder' => 'Select an option',
        'allowClear' => true,
        'multiple' => true,
    ]" 
>
</x-hwkui-select>

```

## 🗓️ DateTime Picker Component

This component provides an elegant datetime picker powered by Tempus Dominus v6, ready to use in your Laravel Livewire app with a clean, customizable Blade syntax.

Enable in Configuration

```php
'Datetime' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/css/tempus-dominus.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'defer' => true,
                    'location' => '//cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'defer' => true,
                    'location' => '//cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js',
                ],
            ],
        ],
```

in your blade use it like this

### ✅ Basic Usage

```blade

 <x-hwkui-datetime id="test-datetime" label="Test DateTime"
        placeholder="Select Date" wire:model="setDatetime" />

```

🛠️ You can configure default picker options globally in  `config/hwkui.php`

```php

'datetime' => [
        'defaultOptions' => [
            'display' => [
                'viewMode' => 'calendar',
                'components' => [
                    'calendar' => true,
                    'date' => true,
                    'year' => true,
                    'month' => true,
                    'clock' => true,
                ],
                'calendarWeeks' => false,
            ],
            'debug' => false,
            'useCurrent' => true,
            'stepping' => 1,
            'localization' => [
                'format' => 'yyyy-MM-dd hh:mm',
                'locale' => app()->getLocale(),
            ],
        ],
    ],


```

You can explore all available options on the  [Options page](https://getdatepicker.com/6/options/) and see what you can add.

### ✏️ Override Options Per Component

yOverride settings for individual instances using the `:options`  attribute:

```blade

 <x-hwkui-datetime id="test-datetime" :options="[
        'display' => [
            'components' => [
                'date' => false,
                'year' => true,
                'month' => true,
                'clock' => false,
            ],
        ],
        'localization' => [
            'format' => 'yyyy-MM h:i:s',
            'locale' => app()->getLocale(),
        ],
    ]" class="border-amber-500" label="Test DateTime"
        placeholder="Select Date" wire:model="setDatetime" />

```

## ✒️ Text Editor Component

A rich-text editor component powered by Quill.js, built for Laravel Livewire 3. Fully supports customization, toolbar control, themes, and Livewire model binding.
In your `config/hwkui.php`, activate the editor plugin:

```php

'plugins' => [
    'Editor' => [
        'active' => true,
        'files' => [
            [
                'type' => 'css',
                'asset' => false,
                'location' => '//cdn.quilljs.com/1.3.6/quill.snow.css',
            ],
            [
                'type' => 'js',
                'asset' => false,
                'location' => '//cdn.quilljs.com/1.3.6/quill.min.js',
            ],
        ],
    ],
],


```

### ✅ Basic Usage

```blade
<x-hwkui-editor id="editor" wire:model="content">
    Default content goes here...
</x-hwkui-editor>
```
### 🛠 Toolbar Customization
Use the toolbar attribute to define your desired tools.

```blade

<x-hwkui-editor id="editor"
    wire:model.live="content"
    theme="snow"
    toolbar="bold|italic|underline|link|image|code-block|blockquote|list|clean">
</x-hwkui-editor>


```
🔹 You can customize the toolbar using Quill toolbar options separated by |.

---