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