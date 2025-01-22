<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Bilet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Edytuj Bilet</h1>
        <a href="<?php echo e(route('bilety.index')); ?>" class="btn btn-secondary mb-3">Powrót do strony głównej</a>

        <!-- Formularz edycji biletu -->
        <form action="<?php echo e(route('bilety.update', $bilet->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="rodzaj_biletu" class="form-label">Rodzaj biletu</label>
                <select class="form-control" id="rodzaj_biletu" name="rodzaj_biletu" required>
                    <option value="normalny" <?php echo e(old('rodzaj_biletu', $bilet->rodzaj_biletu ?? '') == 'normalny' ? 'selected' : ''); ?>>Normalny</option>
                    <option value="ulgowy" <?php echo e(old('rodzaj_biletu', $bilet->rodzaj_biletu ?? '') == 'ulgowy' ? 'selected' : ''); ?>>Ulgowy</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="data_zakupu" class="form-label">Data zakupu</label>
                <input type="date" class="form-control" id="data_zakupu" name="data_zakupu" value="<?php echo e(old('data_zakupu', $bilet->data_zakupu)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="cena" class="form-label">Cena</label>
                <input type="number" class="form-control" id="cena" name="cena" value="<?php echo e(old('cena', $bilet->cena)); ?>" required>
            </div>

            

            <button type="submit" class="btn btn-primary">Zaktualizuj Bilet</button>
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
<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/bilety/edit.blade.php ENDPATH**/ ?>