

<?php $__env->startSection('title', 'Contact'); ?>

<?php $__env->startSection('content'); ?>
<section class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-2">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">Contact</p>
            <h1 class="mt-3 text-3xl font-bold text-primary-dark">Nous contacter</h1>
            <p class="mt-4 text-gray-600">Vous avez une question sur nos plants de palmier à huile, la livraison ou la plantation ? Notre équipe vous répond rapidement.</p>

            <div class="mt-8 space-y-5">
                <div>
                    <p class="text-sm font-medium text-gray-500">Téléphone</p>
                    <p class="mt-1 text-base text-gray-900">+229 01 00 00 00</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Email</p>
                    <p class="mt-1 text-base text-gray-900">contact@elaeis-prestige.com</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Adresse</p>
                    <p class="mt-1 text-base text-gray-900">Bénin</p>
                </div>
            </div>
        </div>

        <div class="card p-6 sm:p-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <form method="POST" action="<?php echo e(route('contact.store')); ?>" class="space-y-5">
                <?php echo csrf_field(); ?>

                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Nom complet</label>
                    <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="email" class="mb-1 block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div>
                        <label for="phone" class="mb-1 block text-sm font-medium text-gray-700">Téléphone</label>
                        <input id="phone" name="phone" type="text" value="<?php echo e(old('phone')); ?>" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                    </div>
                </div>

                <div>
                    <label for="subject" class="mb-1 block text-sm font-medium text-gray-700">Objet</label>
                    <input id="subject" name="subject" type="text" value="<?php echo e(old('subject')); ?>" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                </div>

                <div>
                    <label for="message" class="mb-1 block text-sm font-medium text-gray-700">Message</label>
                    <textarea id="message" name="message" rows="5" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30"><?php echo e(old('message')); ?></textarea>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <button type="submit" class="btn-primary w-full">Envoyer le message</button>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\elaeis-prestige\resources\views/pages/contact.blade.php ENDPATH**/ ?>