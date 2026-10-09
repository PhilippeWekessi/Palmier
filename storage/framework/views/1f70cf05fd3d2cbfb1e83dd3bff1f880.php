

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <section class="mx-auto flex max-w-3xl flex-col items-center px-4 py-24 text-center">
        <h1 class="mt-6 text-3xl font-bold text-primary-dark"><?php echo e($title); ?></h1>
        <p class="mt-3 text-gray-600">Cette page est en cours de construction et sera bientôt disponible.</p>
        <a href="<?php echo e(route('home')); ?>" class="btn-primary mt-8">Retour à l'accueil</a>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\elaeis-prestige\resources\views/pages/soon.blade.php ENDPATH**/ ?>