<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['color' => 'green']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['color' => 'green']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $styles = [
        'green' => 'bg-green-100 text-green-800',
        'gold' => 'bg-amber-100 text-amber-800',
        'gray' => 'bg-gray-200 text-gray-700',
        'red' => 'bg-red-100 text-red-800',
    ];
?>

<span <?php echo e($attributes->merge(['class' => 'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium '.($styles[$color] ?? $styles['green'])])); ?>>
    <?php echo e($slot); ?>

</span><?php /**PATH C:\wamp64\www\elaeis-prestige\resources\views/components/badge.blade.php ENDPATH**/ ?>