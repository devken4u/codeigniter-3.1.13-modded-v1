# Custom Modded CodeIgniter 3 Template

A customized CodeIgniter 3 setup with Bootstrap, Bootstrap Icons and jQuery included and a ready-to-use layout structure for rapid web application development.

---

## Setup Configuration

The `url` helper has been enabled to easily manage URL functions like `base_url()`. This is done by adding `'url'` to the autoload helpers in `application/config/autoload.php`:

```php
$autoload['helper'] = ['url'];
```

Also, the default base URL is set in application/config/config.php to ensure proper URL generation:

```php
$config['base_url'] = 'http://yourdomain.com/';
```

To remove index.php from the URL when accessing routes, the following rules were added to the root .htaccess file

```php
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

## Bootstrap Integration

Bootstrap v5.3.6 has been downloaded and placed in the `root/assets/bootstrap` directory.

## Bootstrap Icons Integration

Bootstrap Icons v1.13.1 has been downloaded and placed in the `root/assets/bootstrap-icons-1.13.1` directory.

## jQuery Integration

jQuery v3.7.1 has been downloaded and placed in the `root/assets/jquery` directory.

## Main Layout File for Reusability

To promote code reusability and maintain a consistent design, a main layout file has been created. This layout includes the common structure of your web pages and the inclusion of Bootstrap and jQuery assets.

Individual views can extend this main layout, allowing you to focus only on the unique content for each page while keeping the overall look and feel uniform across the application.

`root/application/views/layouts/main.php`

```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'App' ?></title>
    <!-- Default CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css'); ?>">
    <!-- Page Specific CSS -->
    <?php
    if (isset($styles)) {
        foreach ($styles as $style) {
            echo "<link rel=\"stylesheet\" href=\"$style\">";
        }
    }
    ?>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
</head>

<body>
    <!-- This is where the page-specific content will be injected -->
    <?php echo isset($content) ? $content : ''; ?>

    <!-- Default Script -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Page Specific Script -->
    <?php
    if (isset($scripts)) {
        foreach ($scripts as $script) {
            echo "<script src=\"$script\"></script>";
        }
    }
    ?>
</body>

</html>
```

## How to Use Main Layout?

```php
$data['title'] = "Page Title";

// Load your page content into a variable
$data['content'] = $this->load->view('pages/some_page', [], true);

// Pass arrays of styles and scripts
$data['styles'] = [
    base_url('assets/css/dashboard.css'),
    base_url('assets/css/widgets.css'),
];

$data['scripts'] = [
    base_url('assets/js/dashboard.js'),
    base_url('assets/js/widgets.js'),
];

// Load the main layout and pass the content
$this->load->view('layouts/main', $data);
```

```php
$data['title'] = "Page Title";
```

- This sets a variable named title inside the $data array.
- The title can be used in the view to dynamically set the page title or for any other purpose.

```php
$data['content'] = $this->load->view('view-path-here', [], true);
```

- This loads the view file located at the specified path.
- The second parameter is the data being passed to the specific view
- The third parameter true tells CodeIgniter to return the rendered view as a string instead of sending it directly to the browser.
- The returned HTML content is then stored in $data['content'].
- This allows you to embed the page-specific content inside a layout late

```php
$data['styles'] = [
    base_url('css-path'),
    base_url('css-path'),
];

$data['scripts'] = [
    base_url('js-path'),
    base_url('js-path'),
];
```

- If you want to include page-specific scripts/styles

```php
$this->load->view('layouts/main', $data);
```

- This loads the main layout view located at `application/views/layouts/main.php.`
- It passes the $data array to this layout.
- Inside main.php, you can access $title and $content variables to display the page title and embed the page-specific content respectively.
- This allows you to keep a consistent layout while dynamically injecting different page contents.
