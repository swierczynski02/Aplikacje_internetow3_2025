<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Zamówienie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>

<div class="container">
    <h1>Edytuj Zamówienie</h1>
    <a href="<?php echo e(route('zamowienia.index')); ?>" class="btn btn-secondary mb-3">Powrót do listy zamówień</a>

    <!-- Wyświetlanie komunikatu sukcesu -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <!-- Formularz edycji -->
    <form action="<?php echo e(route('zamowienia.update', $zamowienie->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="klient_id" class="form-label">Klient</label>
            <select id="klient_id" name="klient_id" class="form-select" required>
                <?php $__currentLoopData = $uzytkownicy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uzytkownik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($uzytkownik->id); ?>" <?php echo e($uzytkownik->id == $zamowienie->klient_id ? 'selected' : ''); ?>>
                        <?php echo e($uzytkownik->imie); ?> <?php echo e($uzytkownik->nazwisko); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
        <input type="date" id="data_zamowienia" name="data_zamowienia" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($zamowienie->data_zamowienia)->format('Y-m-d')); ?>" required>

        </div>

        <div class="mb-3">
            <label for="cena_calkowita" class="form-label">Całkowita cena</label>
            <input type="number" id="cena_calkowita" name="cena_calkowita" class="form-control" value="<?php echo e($zamowienie->cena_calkowita); ?>" required>
        </div>

        <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select id="status" name="status" class="form-select" required>
        <option value="oczekujące" <?php echo e($zamowienie->status == 'oczekujące' ? 'selected' : ''); ?>>Oczekujący</option>
        <option value="zrealizowane" <?php echo e($zamowienie->status == 'zrealizowane' ? 'selected' : ''); ?>>Zrealizowany</option>
        <!-- Możesz dodać więcej opcji w zależności od dostępnych statusów -->
    </select>
</div>

<div class="mb-3">
    <label for="status_platnosci" class="form-label">Status płatności</label>
    <select id="status_platnosci" name="status_platnosci" class="form-select" required>
        <option value="oczekująca" <?php echo e($zamowienie->status_platnosci == 'oczekująca' ? 'selected' : ''); ?>>Opłacono</option>
        <option value="zapłacona" <?php echo e($zamowienie->status_platnosci == 'zapłacona' ? 'selected' : ''); ?>>Nieopłacono</option>
        <!-- Możesz dodać więcej opcji w zależności od dostępnych statusów płatności -->
    </select>
</div>


        <button type="submit" class="btn btn-primary">Zaktualizuj Zamówienie</button>
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/zamowienia/edit.blade.php ENDPATH**/ ?>