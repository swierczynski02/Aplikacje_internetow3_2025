<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Projekcję</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>

    <div class="container">
        <h1>Dodaj Projekcję</h1>
        <a href="<?php echo e(route('projekcje.index')); ?>" class="btn btn-secondary mb-3">Powrót do projekcji</a>

        <form action="<?php echo e(route('projekcje.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="film_id" class="form-label">Film</label>
                <select id="film_id" name="film_id" class="form-select" required>
                    <option value="">Wybierz film</option>
                    <?php $__currentLoopData = $filmy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($film->id); ?>"><?php echo e($film->tytul); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="data_czas" class="form-label">Data i Czas</label>
                <input type="datetime-local" id="data_czas" name="data_czas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sala" class="form-label">Sala</label>
                <input type="text" id="sala" name="sala" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dostępność_miejsc" class="form-label">Dostępność Miejsc</label>
                <input type="number" id="dostępność_miejsc" name="dostępność_miejsc" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj Projekcję</button>
        </form>
    </div>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/projekcje/create.blade.php ENDPATH**/ ?>