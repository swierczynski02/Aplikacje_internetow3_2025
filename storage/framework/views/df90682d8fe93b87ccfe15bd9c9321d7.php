<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Użytkownika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Dodaj Nowego Użytkownika</h1>
        <a href="<?php echo e(route('uzytkownicy.index')); ?>" class="btn btn-secondary mb-3">Powrót do listy użytkowników</a>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('uzytkownicy.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="nazwa_uzytkownika" class="form-label">Nazwa użytkownika</label>
                <input type="text" class="form-control" id="nazwa_uzytkownika" name="nazwa_uzytkownika" value="<?php echo e(old('nazwa_uzytkownika')); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div class="mb-3">
                <label for="haslo" class="form-label">Hasło</label>
                <input type="password" class="form-control" id="haslo" name="haslo" required>
            </div>

            <div class="mb-3">
                <label for="haslo_confirmation" class="form-label">Potwierdź Hasło</label>
                <input type="password" class="form-control" id="haslo_confirmation" name="haslo_confirmation" required>
            </div>

            <div class="mb-3">
                <label for="rola" class="form-label">Rola</label>
                <select class="form-select" id="rola" name="rola" required>
                    <option value="administrator" <?php echo e(old('rola') == 'administrator' ? 'selected' : ''); ?>>Administrator</option>
                    <option value="klient" <?php echo e(old('rola') == 'klient' ? 'selected' : ''); ?>>Klient</option>
                    <option value="pracownik" <?php echo e(old('rola') == 'pracownik' ? 'selected' : ''); ?>>Pracownik</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj Użytkownika</button>
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/uzytkownicy/create.blade.php ENDPATH**/ ?>