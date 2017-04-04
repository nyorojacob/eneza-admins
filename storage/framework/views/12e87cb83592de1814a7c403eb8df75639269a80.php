<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            <?php if(Auth::user()->role_id == config('quickadmin.defaultRole')): ?>
                <li <?php if(Request::path() == config('quickadmin.route').'/menu'): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url(config('quickadmin.route').'/menu')); ?>">
                        <i class="fa fa-list"></i>
                        <span class="title"><?php echo e(trans('quickadmin::admin.partials-sidebar-menu')); ?></span>
                    </a>
                </li>
                <li <?php if(Request::path() == 'users'): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('users')); ?>">
                        <i class="fa fa-users"></i>
                        <span class="title"><?php echo e(trans('quickadmin::admin.partials-sidebar-users')); ?></span>
                    </a>
                </li>
                <li <?php if(Request::path() == 'roles'): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('roles')); ?>">
                        <i class="fa fa-gavel"></i>
                        <span class="title"><?php echo e(trans('quickadmin::admin.partials-sidebar-roles')); ?></span>
                    </a>
                </li>
                <li <?php if(Request::path() == config('quickadmin.route').'/actions'): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url(config('quickadmin.route').'/actions')); ?>">
                        <i class="fa fa-users"></i>
                        <span class="title"><?php echo e(trans('quickadmin::admin.partials-sidebar-user-actions')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($menu->menu_type != 2 && is_null($menu->parent_id)): ?>
                    <?php if(Auth::user()->role->canAccessMenu($menu)): ?>
                        <li <?php if(isset(explode('/',Request::path())[1]) && explode('/',Request::path())[1] == strtolower($menu->name)): ?> class="active" <?php endif; ?>>
                            <a href="<?php echo e(route(config('quickadmin.route').'.'.strtolower($menu->name).'.index')); ?>">
                                <i class="fa <?php echo e($menu->icon); ?>"></i>
                                <span class="title"><?php echo e($menu->title); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(Auth::user()->role->canAccessMenu($menu) && !is_null($menu->children()->first()) && is_null($menu->parent_id)): ?>
                        <li>
                            <a href="#">
                                <i class="fa <?php echo e($menu->icon); ?>"></i>
                                <span class="title"><?php echo e($menu->title); ?></span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Auth::user()->role->canAccessMenu($child)): ?>
                                        <li
                                                <?php if(isset(explode('/',Request::path())[1]) && explode('/',Request::path())[1] == strtolower($child->name)): ?> class="active active-sub" <?php endif; ?>>
                                            <a href="<?php echo e(route(strtolower(config('quickadmin.route').'.'.$child->name).'.index')); ?>">
                                                <i class="fa <?php echo e($child->icon); ?>"></i>
                                                <span class="title">
                                                    <?php echo e($child->title); ?>

                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo Form::open(['url' => 'logout']); ?>

                <button type="submit" class="logout">
                    <i class="fa fa-sign-out fa-fw"></i>
                    <span class="title"><?php echo e(trans('quickadmin::admin.partials-sidebar-logout')); ?></span>
                </button>
                <?php echo Form::close(); ?>

            </li>
        </ul>
    </div>
</div>
