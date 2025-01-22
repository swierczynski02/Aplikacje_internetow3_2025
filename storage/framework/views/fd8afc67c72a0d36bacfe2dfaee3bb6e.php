<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Pracownika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Dodaj Pracownika</h1>
        <a href="<?php echo e(route('pracownicy.index')); ?>" class="btn btn-secondary mb-3">Powrót do listy pracowników</a>

        <!-- Wyświetlanie komunikatów błędów -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formularz dodawania pracownika -->
        <form action="<?php echo e(route('pracownicy.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="uzytkownik_id" class="form-label">Wybierz Użytkownika</label>
                <select class="form-select" id="uzytkownik_id" name="uzytkownik_id" required>
                    <option value="" disabled selected>Wybierz użytkownika</option>
                    <?php $__currentLoopData = $uzytkownicy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uzytkownik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($uzytkownik->id); ?>"><?php echo e($uzytkownik->id); ?> - <?php echo e($uzytkownik->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="rola" class="form-label">Rola</label>
                <select class="form-select" id="rola" name="rola" required>
                    <option value="rejestracja">Rejestracja</option>
                    <option value="obsługa klienta">Obsługa Klienta</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="data_zatrudnienia" class="form-label">Data Zatrudnienia</label>
                <input type="date" class="form-control" id="data_zatrudnienia" name="data_zatrudnienia" required>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj Pracownika</button>
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/pracownicy/create.blade.php ENDPATH**/ ?>