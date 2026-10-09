<?php $site = app('App\Services\SettingsService'); ?>
<?php
    // Petite requête de lecture ; sera mise en cache en Phase 14 (optimisation).
    $footerCategories = \App\Models\Category::active()->orderBy('name')->get(['id', 'name', 'slug']);
    $phone = $site->get('phone');
    $email = $site->get('email');
    $whatsappUrl = $site->whatsappUrl();
?>

<footer class="bg-primary-dark text-green-100/80">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">

            
            <div>
                <p class="flex items-center gap-2 text-lg font-bold text-white"><span aria-hidden="true">🌴</span> <?php echo e($site->get('company_name')); ?></p>
                <p class="mt-3 text-sm leading-relaxed">
                    Vente et distribution de plants de palmier à huile pour les agriculteurs, producteurs et particuliers du Bénin.
                </p>
                <div class="mt-4 flex gap-4 text-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site->get('facebook_url')): ?>
                        <a href="<?php echo e($site->get('facebook_url')); ?>" target="_blank" rel="noopener" class="hover:text-gold-light">Facebook</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site->get('instagram_url')): ?>
                        <a href="<?php echo e($site->get('instagram_url')); ?>" target="_blank" rel="noopener" class="hover:text-gold-light">Instagram</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wider text-white">Navigation</h2>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="<?php echo e(route('home')); ?>" class="hover:text-gold-light">Accueil</a></li>
                    <li><a href="<?php echo e(route('products.index')); ?>" class="hover:text-gold-light">Nos plants</a></li>
                    <li><a href="<?php echo e(route('about')); ?>" class="hover:text-gold-light">À propos</a></li>
                    <li><a href="<?php echo e(route('services')); ?>" class="hover:text-gold-light">Nos services</a></li>
                    <li><a href="<?php echo e(route('posts.index')); ?>" class="hover:text-gold-light">Conseils agricoles</a></li>
                    <li><a href="<?php echo e(route('faq')); ?>" class="hover:text-gold-light">FAQ</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>" class="hover:text-gold-light">Contact</a></li>
                </ul>
            </div>

            
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wider text-white">Nos produits</h2>
                <ul class="mt-4 space-y-2 text-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $footerCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('products.index', ['category' => $category->slug])); ?>" class="hover:text-gold-light"><?php echo e($category->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <li><a href="<?php echo e(route('products.index')); ?>" class="hover:text-gold-light">Tous les plants</a></li>
                </ul>
            </div>

            
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wider text-white">Contact</h2>
                <ul class="mt-4 space-y-2 text-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($phone): ?>
                        <li>Téléphone : <a href="<?php echo e($site->telUrl()); ?>" class="hover:text-gold-light"><?php echo e($phone); ?></a></li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($whatsappUrl): ?>
                        <li>WhatsApp : <a href="<?php echo e($whatsappUrl); ?>" target="_blank" rel="noopener" class="hover:text-gold-light">Nous écrire</a></li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($email): ?>
                        <li>E-mail : <a href="mailto:<?php echo e($email); ?>" class="break-all hover:text-gold-light"><?php echo e($email); ?></a></li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site->get('address')): ?>
                        <li><?php echo e($site->get('address')); ?></li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site->get('opening_hours')): ?>
                        <li><?php echo e($site->get('opening_hours')); ?></li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-3 border-t border-white/10 pt-6 text-sm sm:flex-row sm:items-center sm:justify-between">
            <p>© <?php echo e(now()->year); ?> Elaeis Prestige. Tous droits réservés.</p>
            <div class="flex gap-5">
                <a href="<?php echo e(route('terms')); ?>" class="hover:text-gold-light">Conditions générales</a>
                <a href="<?php echo e(route('privacy')); ?>" class="hover:text-gold-light">Confidentialité</a>
            </div>
        </div>
    </div>
</footer><?php /**PATH C:\wamp64\www\elaeis-prestige\resources\views/components/footer.blade.php ENDPATH**/ ?>