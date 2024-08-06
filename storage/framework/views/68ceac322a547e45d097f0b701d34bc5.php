<?php if(in_array($field, $orderable)): ?>
    <?php if($sortBy !== $field): ?>
        <i wire:click="sortBy('<?php echo e($field); ?>')" class="fa fa-fw fa-sort cursor-pointer" aria-hidden="true"></i>
    <?php elseif($sortBy === $field && $sortDirection == 'desc'): ?>
        <i wire:click="sortBy('<?php echo e($field); ?>')" class="fa fa-fw fa-sort-down cursor-pointer text-blue-500" aria-hidden="true"></i>
    <?php else: ?>
        <i wire:click="sortBy('<?php echo e($field); ?>')" class="fa fa-fw fa-sort-up cursor-pointer text-blue-500" aria-hidden="true"></i>
    <?php endif; ?>
<?php endif; ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/components/table/sort.blade.php ENDPATH**/ ?>