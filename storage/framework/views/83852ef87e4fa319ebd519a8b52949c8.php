

<?php $site = app('App\Services\SettingsService'); ?>

<?php
    $images = $product->galleryImageUrls();
    $whatsappMessage = "Bonjour, je suis intéressé(e) par : {$product->name} (réf. {$product->reference}). Est-il disponible ?";
    $whatsappUrl = $site->whatsappUrl($whatsappMessage);
?>

<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>
<section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

    <nav class="mb-6 flex flex-wrap items-center gap-1 text-sm text-gray-500" aria-label="Fil d'Ariane">
        <a href="<?php echo e(route('home')); ?>" class="hover:text-primary">Accueil</a>
        <span aria-hidden="true">/</span>
        <a href="<?php echo e(route('products.index')); ?>" class="hover:text-primary">Nos plants</a>
        <span aria-hidden="true">/</span>
        <span class="text-gray-700"><?php echo e($product->name); ?></span>
    </nav>

    <div class="grid gap-10 lg:grid-cols-2">

        
        <div x-data="{ active: 0, images: <?php echo \Illuminate\Support\Js::from($images)->toHtml() ?> }">
            <div class="aspect-[4/3] overflow-hidden rounded-card bg-primary/5 ring-1 ring-neutral-100">
                <template x-if="images.length">
                    <img :src="images[active]" alt="<?php echo e($product->name); ?>" class="h-full w-full object-cover">
                </template>
                <template x-if="! images.length">
                    <div class="flex h-full w-full items-center justify-center text-6xl" aria-hidden="true">🌴</div>
                </template>
            </div>

            <div class="mt-3 grid grid-cols-5 gap-2" x-show="images.length > 1" x-cloak>
                <template x-for="(image, index) in images" :key="index">
                    <button type="button" @click="active = index"
                            class="aspect-square overflow-hidden rounded-lg ring-2 transition"
                            :class="active === index ? 'ring-primary' : 'ring-transparent opacity-70 hover:opacity-100'">
                        <img :src="image" alt="" class="h-full w-full object-cover">
                    </button>
                </template>
            </div>
        </div>

        
        <div>
            <div class="mb-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! $product->isInStock()): ?>
                    <?php if (isset($component)) { $__componentOriginal2ddbc40e602c342e508ac696e52f8719 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ddbc40e602c342e508ac696e52f8719 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.badge','data' => ['color' => 'gray']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'gray']); ?>Épuisé <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $attributes = $__attributesOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $component = $__componentOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__componentOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?>
                <?php elseif($product->isLowStock()): ?>
                    <?php if (isset($component)) { $__componentOriginal2ddbc40e602c342e508ac696e52f8719 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ddbc40e602c342e508ac696e52f8719 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.badge','data' => ['color' => 'gold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'gold']); ?>Stock limité — <?php echo e($product->stock); ?> restant<?php echo e($product->stock > 1 ? 's' : ''); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $attributes = $__attributesOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $component = $__componentOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__componentOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginal2ddbc40e602c342e508ac696e52f8719 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ddbc40e602c342e508ac696e52f8719 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.badge','data' => ['color' => 'green']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'green']); ?>Disponible <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $attributes = $__attributesOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $component = $__componentOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__componentOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl"><?php echo e($product->name); ?></h1>
            <p class="mt-1 text-sm text-gray-500">Référence : <?php echo e($product->reference); ?></p>

            <div class="mt-4 flex flex-wrap items-baseline gap-x-3">
                <span class="text-2xl font-bold text-primary"><?php echo e(number_format((float) $product->price, 0, ',', ' ')); ?> FCFA</span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->hasDiscount()): ?>
                    <span class="text-lg text-gray-400 line-through"><?php echo e(number_format((float) $product->old_price, 0, ',', ' ')); ?> FCFA</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->short_description): ?>
                <p class="mt-4 leading-relaxed text-gray-600"><?php echo e($product->short_description); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <dl class="mt-6 grid grid-cols-2 gap-4 rounded-lg bg-neutral-50 p-4 text-sm sm:grid-cols-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->variety): ?>
                    <div>
                        <dt class="text-gray-500">Variété</dt>
                        <dd class="font-medium text-gray-900"><?php echo e($product->variety); ?></dd>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->age): ?>
                    <div>
                        <dt class="text-gray-500">Âge</dt>
                        <dd class="font-medium text-gray-900"><?php echo e($product->age); ?></dd>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->category): ?>
                    <div>
                        <dt class="text-gray-500">Catégorie</dt>
                        <dd class="font-medium text-gray-900"><?php echo e($product->category->name); ?></dd>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </dl>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->isInStock()): ?>
                <div x-data="{ qty: 1, max: <?php echo e($product->stock); ?> }" class="mt-8">
                    <label for="qty" class="mb-2 block text-sm font-medium text-gray-700">Quantité</label>
                    <div class="flex items-center gap-3">
                        <div class="inline-flex items-center rounded-lg border border-gray-300">
                            <button type="button" @click="qty = Math.max(1, qty - 1)" class="px-3 py-2 text-lg text-gray-600 hover:text-primary" aria-label="Diminuer la quantité">−</button>
                            <input id="qty" type="number" x-model.number="qty" min="1" :max="max" readonly
                                   class="w-14 border-x border-gray-300 py-2 text-center focus:outline-none">
                            <button type="button" @click="qty = Math.min(max, qty + 1)" class="px-3 py-2 text-lg text-gray-600 hover:text-primary" aria-label="Augmenter la quantité">+</button>
                        </div>
                        <span class="text-sm text-gray-500"><?php echo e($product->stock); ?> en stock</span>
                    </div>

                    <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                        <button type="button" disabled
                                title="Le panier sera activé dans une prochaine étape du site"
                                class="btn-primary w-full cursor-not-allowed opacity-50 sm:w-auto">
                            Ajouter au panier
                        </button>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($whatsappUrl): ?>
                            <a href="<?php echo e($whatsappUrl); ?>" target="_blank" rel="noopener" class="btn-gold w-full sm:w-auto">
                                Commander via WhatsApp
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="mt-8">
                    <p class="mb-4 text-sm text-gray-500">Ce plant est actuellement épuisé.</p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($whatsappUrl): ?>
                        <a href="<?php echo e($whatsappUrl); ?>" target="_blank" rel="noopener" class="btn-outline">
                            Être prévenu de la disponibilité (WhatsApp)
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <p class="mt-4 text-sm text-gray-500">
                Une question ?
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($whatsappUrl): ?>
                    <a href="<?php echo e($whatsappUrl); ?>" target="_blank" rel="noopener" class="font-medium text-primary hover:underline">Contactez-nous sur WhatsApp</a>
                <?php else: ?>
                    Contactez-nous.
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->description): ?>
        <div class="mt-14 max-w-3xl">
            <h2 class="text-xl font-bold text-primary-dark">Description</h2>
            <div class="mt-4 leading-relaxed text-gray-700">
                <?php echo nl2br(e($product->description)); ?>

            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->isNotEmpty()): ?>
        <div class="mt-16 border-t border-neutral-100 pt-12">
            <h2 class="text-xl font-bold text-primary-dark">Produits similaires</h2>
            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.product-card','data' => ['product' => $item]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $attributes = $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $component = $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\elaeis-prestige\resources\views/pages/products/show.blade.php ENDPATH**/ ?>