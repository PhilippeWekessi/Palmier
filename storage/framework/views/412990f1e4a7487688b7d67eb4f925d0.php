<?php $site = app('App\Services\SettingsService'); ?>
<?php
    $links = [
        ['route' => 'home', 'label' => 'Accueil', 'active' => 'home'],
        ['route' => 'products.index', 'label' => 'Nos plants', 'active' => 'products.*'],
        ['route' => 'about', 'label' => 'À propos', 'active' => 'about'],
        ['route' => 'posts.index', 'label' => 'Conseils', 'active' => 'posts.*'],
        ['route' => 'contact', 'label' => 'Contact', 'active' => 'contact'],
    ];

    $user = auth()->user();
    $accountUrl = $user ? ($user->isAdmin() ? route('admin.dashboard') : route('account')) : route('login');
    $accountLabel = $user ? 'Mon compte' : 'Connexion';
    $iconBtn = 'inline-flex h-11 w-11 items-center justify-center rounded-lg text-gray-600 transition hover:bg-neutral-100 hover:text-primary';
?>

<header x-data="{ open: false, search: false }"
        @keydown.escape.window="open = false; search = false"
        class="sticky top-0 z-40 border-b border-neutral-100 bg-white/95 backdrop-blur">

    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">

        
        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2 text-lg font-bold text-primary-dark">
            <span aria-hidden="true">🌴</span>
            <span><?php echo e($site->get('company_name')); ?></span>
        </a>

        
        <nav class="hidden items-center gap-1 lg:flex" aria-label="Navigation principale">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route($link['route'])); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'rounded-lg px-3 py-2 text-sm font-medium transition',
                    'bg-primary/5 text-primary' => request()->routeIs($link['active']),
                    'text-gray-600 hover:bg-neutral-100 hover:text-primary' => ! request()->routeIs($link['active']),
                ]); ?>"><?php echo e($link['label']); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </nav>

        
        <div class="flex items-center gap-1 sm:gap-2">

            
            <button type="button" class="<?php echo e($iconBtn); ?> hidden lg:inline-flex" aria-label="Rechercher"
                    @click="search = !search; $nextTick(() => $refs.q && $refs.q.focus())">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
            </button>

            
            <a href="<?php echo e(route('cart.index')); ?>" class="<?php echo e($iconBtn); ?>" aria-label="Panier">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
            </a>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <div x-data="{ userMenu: false }" class="relative hidden lg:block" @click.outside="userMenu = false">
                    <button type="button" @click="userMenu = !userMenu" class="<?php echo e($iconBtn); ?>" aria-label="Menu utilisateur" title="<?php echo e(auth()->user()->name); ?>">
                        <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                    </button>
                    <div x-show="userMenu" x-cloak x-transition
                         class="absolute right-0 mt-2 w-56 rounded-xl bg-white p-2 shadow-lg ring-1 ring-black/5 z-50">
                        <div class="px-3 py-2 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-900 truncate"><?php echo e(auth()->user()->name); ?></p>
                            <p class="text-xs text-gray-500 truncate"><?php echo e(auth()->user()->email); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->isAdmin()): ?>
                                <span class="mt-1 inline-block text-[11px] font-medium bg-gold/20 text-primary-dark px-2 py-0.5 rounded-full">Administrateur</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="py-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->isAdmin()): ?>
                                <a href="<?php echo e(route('admin.dashboard')); ?>" class="block rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-neutral-100 font-medium">Dashboard Admin</a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <a href="<?php echo e(route('account')); ?>" class="block rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-neutral-100">Mon compte client</a>
                        </div>
                        <div class="border-t border-gray-100 pt-1">
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="w-full text-left rounded-lg px-3 py-2 text-sm text-red-600 hover:bg-red-50">Se déconnecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="<?php echo e($iconBtn); ?> hidden lg:inline-flex" aria-label="Connexion" title="Connexion">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <a href="<?php echo e(route('products.index')); ?>" class="btn-gold hidden px-5 py-2 lg:inline-flex">Commander</a>

            
            <button type="button" class="<?php echo e($iconBtn); ?> lg:hidden" aria-label="Ouvrir le menu"
                    :aria-expanded="open.toString()" @click="open = !open">
                <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                <svg x-show="open" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    
    <div x-show="search" x-cloak x-transition class="hidden border-t border-neutral-100 bg-white lg:block">
        <form action="<?php echo e(route('products.index')); ?>" method="GET" class="mx-auto flex max-w-7xl gap-2 px-8 py-3">
            <input x-ref="q" type="search" name="q" placeholder="Rechercher un plant (variété, âge…)"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
            <button type="submit" class="btn-primary">Rechercher</button>
        </form>
    </div>

    
    <div x-show="open" x-cloak x-transition class="border-t border-neutral-100 bg-white lg:hidden">
        <div class="space-y-1 px-4 py-4">

            <form action="<?php echo e(route('products.index')); ?>" method="GET" class="mb-3 flex gap-2">
                <input type="search" name="q" placeholder="Rechercher un plant…"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-base focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                <button type="submit" class="btn-primary px-4" aria-label="Rechercher">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                </button>
            </form>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route($link['route'])); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'block rounded-lg px-3 py-3 text-base font-medium',
                    'bg-primary/5 text-primary' => request()->routeIs($link['active']),
                    'text-gray-700 hover:bg-neutral-100' => ! request()->routeIs($link['active']),
                ]); ?>"><?php echo e($link['label']); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="my-2 border-t border-neutral-100"></div>

            <a href="<?php echo e($accountUrl); ?>" class="block rounded-lg px-3 py-3 text-base font-medium text-gray-700 hover:bg-neutral-100"><?php echo e($accountLabel); ?></a>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="block w-full rounded-lg px-3 py-3 text-left text-base font-medium text-gray-700 hover:bg-neutral-100">Se déconnecter</button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('register')); ?>" class="block rounded-lg px-3 py-3 text-base font-medium text-gray-700 hover:bg-neutral-100">Créer un compte</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <a href="<?php echo e(route('products.index')); ?>" class="btn-gold mt-3 w-full py-3">Commander</a>
        </div>
    </div>
</header><?php /**PATH C:\wamp64\www\elaeis-prestige\resources\views/components/navbar.blade.php ENDPATH**/ ?>