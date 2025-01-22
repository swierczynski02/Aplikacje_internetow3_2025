<!-- resources/views/rezerwacje/edit.blade.php -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Rezerwację</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
<div class="container">
    <h1>Edytuj Rezerwację</h1>
    <a href="<?php echo e(route('rezerwacje.index')); ?>" class="btn btn-secondary mb-3">Powrót do listy rezerwacji</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <!-- Formularz edycji rezerwacji -->
    <form action="<?php echo e(route('rezerwacje.update', $rezerwacja->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="klient_id" class="form-label">Klient</label>
            <select class="form-control" id="klient_id" name="klient_id">
                <?php $__currentLoopData = $uzytkownicy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uzytkownik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($uzytkownik->id); ?>" <?php echo e($uzytkownik->id == $rezerwacja->klient_id ? 'selected' : ''); ?>>
                        <?php echo e($uzytkownik->imie); ?> <?php echo e($uzytkownik->nazwisko); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="projekcja_id" class="form-label">Projekcja</label>
            <select class="form-control" id="projekcja_id" name="projekcja_id">
                <?php $__currentLoopData = $projekcje; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projekcja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($projekcja->id); ?>" <?php echo e($projekcja->id == $rezerwacja->projekcja_id ? 'selected' : ''); ?>>
                        <?php echo e($projekcja->film->tytul); ?> - <?php echo e($projekcja->data); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="numer_miejsca" class="form-label">Numer Miejsca</label>
            <input type="text" class="form-control" id="numer_miejsca" name="numer_miejsca" value="<?php echo e($rezerwacja->numer_miejsca); ?>">
        </div>

        <div class="mb-3">
            <label for="data_rezerwacji" class="form-label">Data Rezerwacji</label>
            <input type="date" class="form-control" id="data_rezerwacji" name="data_rezerwacji" value="<?php echo e(\Carbon\Carbon::parse($rezerwacja->data_rezerwacji)->toDateString()); ?>">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="oczekująca" <?php echo e($rezerwacja->status == 'oczekująca' ? 'selected' : ''); ?>>Oczekująca</option>
                <option value="potwierdzona" <?php echo e($rezerwacja->status == 'potwierdzona' ? 'selected' : ''); ?>>Potwierdzona</option>
                <option value="odwołana" <?php echo e($rezerwacja->status == 'odwołana' ? 'selected' : ''); ?>>Odwołana</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_waznosci" class="form-label">Data Ważności</label>
            <input type="date" class="form-control" id="data_waznosci" name="data_waznosci" value="<?php echo e(\Carbon\Carbon::parse($rezerwacja->data_waznosci)->toDateString()); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Zaktualizuj Rezerwację</button>
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/rezerwacje/edit.blade.php ENDPATH**/ ?>