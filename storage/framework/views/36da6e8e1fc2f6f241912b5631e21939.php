

<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>
<section class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8">
    <article class="card overflow-hidden">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->image): ?>
            <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->title); ?>" class="h-72 w-full object-cover sm:h-96">
        <?php else: ?>
            <div class="flex h-72 items-center justify-center bg-gradient-to-br from-primary-light/20 to-gold/20 text-5xl sm:h-96">🌿</div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="p-6 sm:p-8">
            <p class="text-sm text-gray-500"><?php echo e($post->published_at?->locale('fr')->translatedFormat('d F Y')); ?></p>
            <h1 class="mt-3 text-3xl font-bold text-primary-dark"><?php echo e($post->title); ?></h1>
            <div class="prose prose-lg mt-6 max-w-none text-gray-700">
                <?php echo nl2br(e($post->content)); ?>

            </div>
        </div>
    </article>

    <div class="mt-8">
        <a href="<?php echo e(route('posts.index')); ?>" class="btn-outline">← Retour aux conseils</a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\elaeis-prestige\resources\views/pages/posts/show.blade.php ENDPATH**/ ?>