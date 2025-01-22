<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Dodaj Film</h1>
        <a href="<?php echo e(route('filmy.index')); ?>" class="btn btn-secondary mb-3">Powrót do listy filmów</a>

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

        <!-- Formularz dodawania filmu -->
        <form action="<?php echo e(route('filmy.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="tytul" class="form-label">Tytuł</label>
                <input type="text" class="form-control" id="tytul" name="tytul" required>
            </div>

            <div class="mb-3">
                <label for="gatunek" class="form-label">Gatunek</label>
                <select class="form-control" id="gatunek" name="gatunek" required>
                    <option value="komedia">Komedia</option>
                    <option value="dramat">Dramat</option>
                    <option value="horror">Horror</option>
                    <option value="akcja">Akcja</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="rezyser" class="form-label">Reżyser</label>
                <input type="text" class="form-control" id="rezyser" name="rezyser" required>
            </div>

            <div class="mb-3">
                <label for="rok_produkcji" class="form-label">Rok produkcji</label>
                <input type="number" class="form-control" id="rok_produkcji" name="rok_produkcji" required>
            </div>

            <div class="mb-3">
                <label for="czas_trwania" class="form-label">Czas trwania (w minutach)</label>
                <input type="number" class="form-control" id="czas_trwania" name="czas_trwania" required>
            </div>

            <div class="mb-3">
                <label for="opis" class="form-label">Opis</label>
                <textarea class="form-control" id="opis" name="opis"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj Film</button>
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/filmy/create.blade.php ENDPATH**/ ?>