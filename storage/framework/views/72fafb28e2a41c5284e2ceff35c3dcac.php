<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Pracownika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
<div class="container">
    <h1>Edytuj Pracownika</h1>
    <a href="<?php echo e(route('pracownicy.index')); ?>" class="btn btn-secondary mb-3">Powrót do listy pracowników</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('pracownicy.update', $pracownik->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="uzytkownik_id" class="form-label">Użytkownik</label>
            <select name="uzytkownik_id" id="uzytkownik_id" class="form-control">
                <?php $__currentLoopData = $uzytkownicy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uzytkownik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($uzytkownik->id); ?>" 
                        <?php echo e($pracownik->uzytkownik_id == $uzytkownik->id ? 'selected' : ''); ?>>
                        <?php echo e($uzytkownik->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="rola" class="form-label">Rola</label>
            <select name="rola" id="rola" class="form-control">
                <option value="rejestracja" <?php echo e($pracownik->rola == 'rejestracja' ? 'selected' : ''); ?>>Rejestracja</option>
                <option value="obsługa klienta" <?php echo e($pracownik->rola == 'obsługa klienta' ? 'selected' : ''); ?>>Obsługa Klienta</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_zatrudnienia" class="form-label">Data Zatrudnienia</label>
            <input type="date" name="data_zatrudnienia" id="data_zatrudnienia" value="<?php echo e($pracownik->data_zatrudnienia); ?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Zaktualizuj</button>
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/pracownicy/edit.blade.php ENDPATH**/ ?>