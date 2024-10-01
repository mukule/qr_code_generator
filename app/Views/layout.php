<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qr Generator|<?= esc($title); ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png'); ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9590b3c858.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <?= $this->renderSection('styles'); ?>
</head>
<body>
    <?= $this->include('includes/header'); ?>

    <div id="main-content">
        <?= $this->renderSection('content'); ?>
    </div>

    <?= $this->include('includes/footer'); ?>
    <?= $this->renderSection('scripts'); ?>

    
<script>
   
   document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
 
</body>
</html>
