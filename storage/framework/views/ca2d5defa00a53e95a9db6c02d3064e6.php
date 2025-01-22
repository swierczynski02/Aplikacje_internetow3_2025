<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Rezerwację</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
<div class="container">
    <h1>Dodaj Rezerwację</h1>
    <a href="<?php echo e(route('rezerwacje.index')); ?>" class="btn btn-secondary mb-3">Powrót do rezerwacji</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('rezerwacje.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="klient_id">Klient:</label>
            <select name="klient_id" id="klient_id" class="form-control" required>
                <option value="">Wybierz klienta</option>
                <?php $__currentLoopData = $uzytkownicy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uzytkownik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($uzytkownik->id); ?>"><?php echo e($uzytkownik->nazwa_uzytkownika); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label for="projekcja_id">Projekcja:</label>
            <select name="projekcja_id" id="projekcja_id" class="form-control" required>
                <option value="">Wybierz projekcję</option>
                <?php $__currentLoopData = $projekcje; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projekcja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($projekcja->id); ?>"><?php echo e($projekcja->film->tytul); ?> (<?php echo e($projekcja->data); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label for="numer_miejsca">Numer miejsca:</label>
            <input type="number" name="numer_miejsca" id="numer_miejsca" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_rezerwacji">Data rezerwacji:</label>
            <input type="date" name="data_rezerwacji" id="data_rezerwacji" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="oczekująca">Oczekująca</option>
                <option value="potwierdzona">Potwierdzona</option>
                <option value="odwołana">Odwołana</option>
            </select>
        </div>

        <div class="form-group">
            <label for="data_waznosci">Data ważności:</label>
            <input type="date" name="data_waznosci" id="data_waznosci" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Zapisz Rezerwację</button>
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/rezerwacje/create.blade.php ENDPATH**/ ?>