

<?php $__env->startSection('title', 'Conseils agricoles'); ?>

<?php $__env->startSection('content'); ?>
<section class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">Conseils</p>
        <h1 class="mt-3 text-3xl font-bold text-primary-dark">Conseils agricoles</h1>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($posts->isEmpty()): ?>
        <div class="card p-10 text-center text-gray-600">Aucun article publié pour le moment.</div>
    <?php else: ?>
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="card overflow-hidden">
                    <a href="<?php echo e(route('posts.show', $post)); ?>" class="block aspect-[16/9] overflow-hidden bg-primary/5">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->image): ?>
                            <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->title); ?>" class="h-full w-full object-cover hover:scale-105 transition duration-300">
                        <?php else: ?>
                            <div class="flex h-full items-center justify-center bg-gradient-to-br from-primary-light/20 to-gold/20 text-4xl">🌿</div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </a>
                    <div class="p-5">
                        <p class="text-xs text-gray-500"><?php echo e($post->published_at?->locale('fr')->translatedFormat('d F Y')); ?></p>
                        <h2 class="mt-2 text-xl font-semibold text-gray-900">
                            <a href="<?php echo e(route('posts.show', $post)); ?>" class="hover:text-primary"><?php echo e($post->title); ?></a>
                        </h2>
                        <p class="mt-3 text-sm leading-relaxed text-gray-600"><?php echo e(Illuminate\Support\Str::limit(strip_tags($post->content), 140)); ?></p>
                        <a href="<?php echo e(route('posts.show', $post)); ?>" class="mt-4 inline-block text-sm font-medium text-primary hover:underline">Lire l'article →</a>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="mt-10">
            <?php echo e($posts->links()); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\elaeis-prestige\resources\views/pages/posts/index.blade.php ENDPATH**/ ?>