<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj ocenę</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<script src="<?php echo e(asset('js/accessibility.js')); ?>"></script>
<div class="container">
    <h1>Dodaj ocenę</h1>
    <a href="<?php echo e(route('oceny.index')); ?>" class="btn btn-secondary mb-3">Powrót do listy ocen</a>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('oceny.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="film_id" class="form-label">Film</label>
            <select class="form-control" id="film_id" name="film_id" required>
                <option value="">Wybierz film</option>
                <?php $__currentLoopData = $filmy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($film->id); ?>"><?php echo e($film->tytul); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="uzytkownik_id" class="form-label">Użytkownik</label>
            <select class="form-control" id="uzytkownik_id" name="uzytkownik_id" required>
                <option value="">Wybierz użytkownika</option>
                <?php $__currentLoopData = $uzytkownicy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uzytkownik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($uzytkownik->id); ?>"><?php echo e($uzytkownik->nazwa_uzytkownika); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="ocena" class="form-label">Ocena (1-10)</label>
            <input type="number" class="form-control" id="ocena" name="ocena" min="1" max="10" value="<?php echo e(old('ocena')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="komentarze" class="form-label">Komentarz</label>
            <textarea class="form-control" id="komentarze" name="komentarze" rows="3"><?php echo e(old('komentarze')); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Dodaj ocenę</button>
    </form>
</div>

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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/oceny/create.blade.php ENDPATH**/ ?>