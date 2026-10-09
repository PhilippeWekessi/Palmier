

<?php $__env->startSection('title', 'À propos'); ?>

<?php $__env->startSection('content'); ?>
<section class="bg-neutral-50 py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">Elaeis Prestige</p>
                <h1 class="mt-4 text-3xl font-bold text-primary-dark sm:text-4xl">Des plants de qualité pour des plantations solides et durables</h1>
                <p class="mt-5 text-lg leading-relaxed text-gray-700">
                    Nous sommes une structure spécialisée dans la production et la distribution de plants de palmier à huile adaptés aux réalités agro-écologiques du Bénin.
                    Notre objectif est d’accompagner les producteurs, exploitants, collectivités et particuliers dans la réussite de leurs projets agricoles.
                </p>
                <p class="mt-4 text-base leading-relaxed text-gray-600">
                    Forts d’une expertise orientée vers la qualité et l’accompagnement, nous mettons à votre disposition des plants sélectionnés, des conseils pratiques et une logistique fiable pour démarrer ou développer votre plantation dans les meilleures conditions.
                </p>
            </div>

            <div class="overflow-hidden rounded-3xl shadow-lg ring-1 ring-neutral-200">
                <img src="<?php echo e(asset('images/Oil-Palm-Plantation-by-CIFOR.jpg')); ?>" alt="Plantation de palmier à huile" class="h-full w-full object-cover">
            </div>
        </div>
    </div>
</section>

<section class="py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-2xl font-bold text-primary-dark sm:text-3xl">Notre mission</h2>
            <p class="mt-3 text-gray-600">Fournir aux producteurs des plants fiables, de qualité et un accompagnement concret.</p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
                ['Qualité', 'Des plants choisis avec rigueur et conformes aux exigences agronomiques.'],
                ['Accompagnement', 'Des conseils simples pour préparer, planter et entretenir votre parcelle.'],
                ['Confiance', 'Un service proactif, transparent et orienté client.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$title, $text]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card p-6">
                    <div class="mb-4 h-10 w-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold">✓</div>
                    <h3 class="text-lg font-semibold text-primary-dark"><?php echo e($title); ?></h3>
                    <p class="mt-2 text-sm leading-relaxed text-gray-600"><?php echo e($text); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\elaeis-prestige\resources\views/pages/about.blade.php ENDPATH**/ ?>