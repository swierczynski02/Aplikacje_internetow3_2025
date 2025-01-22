<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Szczegół Zamówienia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Edytuj Szczegół Zamówienia</h1>
    <a href="<?php echo e(route('szczegolyZamowienia.index')); ?>" class="btn btn-secondary mb-3">Powrót</a>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('szczegolyZamowienia.update', $szczegol->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        

        <div class="mb-3">
            <label for="ilosc" class="form-label">Ilość</label>
            <input type="number" class="form-control" id="ilosc" name="ilosc" value="<?php echo e($szczegol->ilosc); ?>" required>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena jednostkowa</label>
            <input type="text" class="form-control" id="cena" name="cena" value="<?php echo e($szczegol->cena); ?>" required>
        </div>

        <div class="mb-3">
            <label for="cena_calkowita" class="form-label">Całkowita cena</label>
            <input type="text" class="form-control" id="cena_calkowita" name="cena_calkowita" value="<?php echo e($szczegol->cena_calkowita); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </form>
</div>
<script src="<?php echo e(asset('js/accessibility.js')); ?>"></script>
     <!-- Przycisk z opcjami dostępności -->
     <div class="accessibility-options">
    <button id="toggleZoomOnHover" class="btn btn-outline-dark">Powiększ po najechaniu</button>
    <button id="toggleReadAloud" class="btn btn-outline-dark">Czytaj na głos po najechaniu</button>
    <button id="toggleInvertColors" class="btn btn-outline-dark">Odwróć kolory</button>
</div>


    <style>
        .accessibility-bar {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            gap: 10px;
            flex-direction: column;
        }
    </style>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/szczegolyZamowienia/edit.blade.php ENDPATH**/ ?>