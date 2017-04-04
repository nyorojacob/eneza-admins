<?php $__env->startSection('content'); ?>

    <p><?php echo link_to_route('roles.create', trans('quickadmin::admin.roles-index-add_new'), [], ['class' => 'btn btn-success']); ?></p>

    <?php if($roles->count() > 0): ?>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><?php echo e(trans('quickadmin::admin.roles-index-roles_list')); ?></div>
            </div>
            <div class="portlet-body">
                <table id="datatable" class="table table-striped table-hover table-responsive datatable">
                    <thead>
                        <tr>
                            <th><?php echo e(trans('quickadmin::admin.roles-index-title')); ?></th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($role->title); ?></td>
                                <td>
                                    <?php echo link_to_route('roles.edit', trans('quickadmin::admin.roles-index-edit'), [$role->id], ['class' => 'btn btn-xs btn-info']); ?>

                                    <?php echo Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => 'return confirm(\'' . trans('quickadmin::admin.roles-index-are_you_sure') . '\');',  'route' => ['roles.destroy', $role->id]]); ?>

                                    <?php echo Form::submit(trans('quickadmin::admin.roles-index-delete'), ['class' => 'btn btn-xs btn-danger']); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php else: ?>
        <?php echo e(trans('quickadmin::admin.roles-index-no_entries_found')); ?>

    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>