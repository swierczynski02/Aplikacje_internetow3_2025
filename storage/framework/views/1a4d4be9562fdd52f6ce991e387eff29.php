<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Projekcję</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>

<div class="container">
    <h1>Edytuj Projekcję</h1>
    <a href="<?php echo e(route('projekcje.index')); ?>" class="btn btn-secondary mb-3">Powrót do listy projekcji</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('projekcje.update', $projekcja->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="film_id" class="form-label">Film</label>
            <select id="film_id" name="film_id" class="form-select">
                <?php $__currentLoopData = $filmy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($film->id); ?>" <?php echo e($film->id == $projekcja->film_id ? 'selected' : ''); ?>>
                        <?php echo e($film->tytul); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_czas" class="form-label">Data i Czas</label>
            <input type="datetime-local" class="form-control" id="data_czas" name="data_czas" value="<?php echo e(\Carbon\Carbon::parse($projekcja->data_czas)->format('Y-m-d\TH:i')); ?>">

        </div>

        <div class="mb-3">
            <label for="sala" class="form-label">Sala</label>
            <input type="text" class="form-control" id="sala" name="sala" value="<?php echo e($projekcja->sala); ?>">
        </div>

        <div class="mb-3">
            <label for="dostępność_miejsc" class="form-label">Dostępność Miejsc</label>
            <input type="number" class="form-control" id="dostępność_miejsc" name="dostępność_miejsc" value="<?php echo e($projekcja->dostępność_miejsc); ?>">
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/projekcje/edit.blade.php ENDPATH**/ ?>