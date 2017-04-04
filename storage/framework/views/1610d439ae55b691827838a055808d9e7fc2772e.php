<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">
            <h1><?php echo e(trans('quickadmin::admin.users-edit-edit_user')); ?></h1>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php echo implode('', $errors->all('
                        <li class="error">:message</li>
                        ')); ?>

                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php echo Form::open(['route' => ['users.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH']); ?>


    <div class="form-group">
        <?php echo Form::label('name', trans('quickadmin::admin.users-edit-name'), ['class'=>'col-sm-2 control-label']); ?>

        <div class="col-sm-10">
            <?php echo Form::text('name', old('name', $user->name), ['class'=>'form-control', 'placeholder'=> trans('quickadmin::admin.users-edit-name_placeholder')]); ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('email', trans('quickadmin::admin.users-edit-email'), ['class'=>'col-sm-2 control-label']); ?>

        <div class="col-sm-10">
            <?php echo Form::email('email', old('email', $user->email), ['class'=>'form-control', 'placeholder'=> trans('quickadmin::admin.users-edit-email_placeholder')]); ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('password', trans('quickadmin::admin.users-edit-password'), ['class'=>'col-sm-2 control-label']); ?>

        <div class="col-sm-10">
            <?php echo Form::password('password', ['class'=>'form-control', 'placeholder'=> trans('quickadmin::admin.users-edit-password_placeholder')]); ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('role_id', trans('quickadmin::admin.users-edit-role'), ['class'=>'col-sm-2 control-label']); ?>

        <div class="col-sm-10">
            <?php echo Form::select('role_id', $roles, old('role_id', $user->role_id), ['class'=>'form-control']); ?>

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <?php echo Form::submit(trans('quickadmin::admin.users-edit-btnupdate'), ['class' => 'btn btn-primary']); ?>

        </div>
    </div>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>