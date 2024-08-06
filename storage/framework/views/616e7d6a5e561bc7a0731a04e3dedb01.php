<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-8">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_create')): ?>
                <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-success ml-3">
                    <?php echo e(__('global.create_new')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
                <button class="btn btn-danger ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="deleteSelected" wire:loading.attr="disabled" <?php echo e($this->selectedCount ? '' : 'disabled'); ?>>
                    <?php echo e(__('global.delete_selected')); ?>

                </button>
                <?php endif; ?>
                <?php if(file_exists(app_path('Http/Livewire/ExcelExport.php'))): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'User','format' => 'csv'])->html();
} elseif ($_instance->childHasBeenRendered('l3383343287-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3383343287-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3383343287-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3383343287-0');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'User','format' => 'csv']);
    $html = $response->html();
    $_instance->logRenderedChild('l3383343287-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'User','format' => 'xlsx'])->html();
} elseif ($_instance->childHasBeenRendered('l3383343287-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3383343287-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3383343287-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3383343287-1');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'User','format' => 'xlsx']);
    $html = $response->html();
    $_instance->logRenderedChild('l3383343287-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-export', ['model' => 'User','format' => 'pdf'])->html();
} elseif ($_instance->childHasBeenRendered('l3383343287-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l3383343287-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3383343287-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3383343287-2');
} else {
    $response = \Livewire\Livewire::mount('excel-export', ['model' => 'User','format' => 'pdf']);
    $html = $response->html();
    $_instance->logRenderedChild('l3383343287-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endif; ?>
                <div class="d-inline-block">
                    <input type="text" wire:model.debounce.300ms="search" id="SearchInput" placeholder="<?php echo e(__('global.search')); ?>" class="form-control" />
                </div>
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="w-9 text-center">
                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.user.fields.id')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.user.fields.name')); ?>

                        </th>
                        <th class="text-center">
                            <?php echo e(trans('cruds.user.fields.email')); ?>

                        </th>
                       
                        <th class="text-center">
                            <?php echo e(trans('cruds.user.fields.roles')); ?>

                        </th>
                       
                        <th> 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" value="<?php echo e($user->id); ?>" wire:model="selected">
                            </td>
                            <td class="text-center">
                                <?php echo e($user->id); ?>

                            </td>
                            <td class="text-center">
                                <?php echo e($user->name); ?>

                            </td>
                            <td class="text-center">
                                <a class="link-light-blue" href="mailto:<?php echo e($user->email); ?>">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    <?php echo e($user->email); ?>

                                </a>
                            </td>
                           
                            <td class="text-center">
                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge bg-label-primary me-1"><?php echo e($entry->title); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                           
                            <td>
                                <div class="flex justify-center">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_show')): ?>
                                        <a class="btn btn-sm btn-primary mr-2" href="<?php echo e(route('admin.users.show', $user)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_edit')): ?>
                                        <a class="btn btn-sm btn-success mr-2" href="<?php echo e(route('admin.users.edit', $user)); ?>">
                                            <?php echo e(trans('global.edit')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
                                        <button class="btn btn-sm btn-danger mr-2" type="button" wire:click="confirm('delete', <?php echo e($user->id); ?>)" wire:loading.attr="disabled">
                                            <?php echo e(trans('global.delete')); ?>

                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                       
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($users->links()); ?>

        </div>  
    </div>
</div>


<?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/livewire/user/index.blade.php ENDPATH**/ ?>