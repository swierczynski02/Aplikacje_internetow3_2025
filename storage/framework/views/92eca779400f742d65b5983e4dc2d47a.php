<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilety</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dodanie własnego pliku CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Lista Użytkowników</h1> 
        <a href="<?php echo e(route('main.index')); ?>" class="btn btn-secondary mb-3">Powrót do strony głównej</a>
        <a href="<?php echo e(route('uzytkownicy.create')); ?>" class="btn btn-primary mb-3">Dodaj Nowego Użytkownika</a>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nazwa użytkownika</th>
                    <th>Email</th>
                    <th>Rola</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $uzytkownicy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uzytkownik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($uzytkownik->nazwa_uzytkownika); ?></td>
                        <td><?php echo e($uzytkownik->email); ?></td>
                        <td><?php echo e($uzytkownik->rola); ?></td>
                        <td>
                            <!-- Edytowanie użytkownika -->
                            <a href="<?php echo e(route('uzytkownicy.edit', $uzytkownik->id)); ?>" class="btn btn-warning">Edytuj</a>

                             <!-- Formularz do usuwania z potwierdzeniem -->
                             <form action="<?php echo e(route('uzytkownicy.destroy', $uzytkownik->id)); ?>" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten bilet?');" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
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

<?php /**PATH D:\xampp\htdocs\ddd\q\resources\views/uzytkownicy/index.blade.php ENDPATH**/ ?>