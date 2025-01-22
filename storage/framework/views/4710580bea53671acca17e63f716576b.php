<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Szczegół Zamówienia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
<div class="container mt-5">
    <h1>Dodaj Szczegół Zamówienia</h1>
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

    <form action="<?php echo e(route('szczegolyZamowienia.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div class="mb-3">
        <label for="zamowienie_id" class="form-label">Zamówienie</label>
        <select class="form-control" id="zamowienie_id" name="zamowienie_id" required>
            <option value="">Wybierz zamówienie</option>
            <?php $__currentLoopData = $zamowienies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zamowienie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($zamowienie->id); ?>"><?php echo e($zamowienie->id); ?> - <?php echo e($zamowienie->nazwa); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="bilet_id" class="form-label">Bilet</label>
        <select class="form-control" id="bilet_id" name="bilet_id" required>
            <option value="">Wybierz bilet</option>
            <?php $__currentLoopData = $bilets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bilet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($bilet->id); ?>"><?php echo e($bilet->id); ?> - <?php echo e($bilet->nazwa); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="ilosc" class="form-label">Ilość</label>
        <input type="number" class="form-control" id="ilosc" name="ilosc" value="<?php echo e(old('ilosc')); ?>" required>
    </div>

    <div class="mb-3">
        <label for="cena" class="form-label">Cena jednostkowa</label>
        <input type="text" class="form-control" id="cena" name="cena" value="<?php echo e(old('cena')); ?>" required>
    </div>

    <div class="mb-3">
        <label for="cena_calkowita" class="form-label">Całkowita cena</label>
        <input type="text" class="form-control" id="cena_calkowita" name="cena_calkowita" value="<?php echo e(old('cena_calkowita')); ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Dodaj</button>
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/szczegolyZamowienia/create.blade.php ENDPATH**/ ?>