<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj ocenę</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
<div class="container">
    <h1>Edytuj ocenę</h1>
    <a href="<?php echo e(route('oceny.index')); ?>" class="btn btn-secondary mb-3">Powrót do listy ocen</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <!-- Formularz do edytowania oceny -->
    <form action="<?php echo e(route('oceny.update', $ocena->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="film_id" class="form-label">Film</label>
            <select id="film_id" name="film_id" class="form-control">
                <?php $__currentLoopData = $filmy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($film->id); ?>" <?php echo e($film->id == $ocena->film_id ? 'selected' : ''); ?>><?php echo e($film->tytul); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="uzytkownik_id" class="form-label">Użytkownik</label>
            <select id="uzytkownik_id" name="uzytkownik_id" class="form-control">
                <?php $__currentLoopData = $uzytkownicy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uzytkownik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($uzytkownik->id); ?>" <?php echo e($uzytkownik->id == $ocena->uzytkownik_id ? 'selected' : ''); ?>><?php echo e($uzytkownik->nazwa_uzytkownika); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="ocena" class="form-label">Ocena (1-10)</label>
            <input type="number" id="ocena" name="ocena" class="form-control" value="<?php echo e($ocena->ocena); ?>" min="1" max="10" required>
        </div>

        <div class="mb-3">
            <label for="komentarze" class="form-label">Komentarz</label>
            <textarea id="komentarze" name="komentarze" class="form-control" rows="4"><?php echo e($ocena->komentarze); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
    </form>
</div>

<script src="<?php echo e(asset('js/accessibility.js')); ?>"></script>

<div class="accessibility-options">
    <button id="toggleZoomOnHover" class="btn btn-outline-dark">Powiększ po najechaniu</button>
    <button id="toggleReadAloud" class="btn btn-outline-dark">Czytaj na głos po najechaniu</button>
    <button id="toggleInvertColors" class="btn btn-outline-dark">Odwróć kolory</button>
</div>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/oceny/edit.blade.php ENDPATH**/ ?>