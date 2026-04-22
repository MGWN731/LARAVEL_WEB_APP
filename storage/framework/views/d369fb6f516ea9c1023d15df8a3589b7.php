<?php if (isset($component)) { $__componentOriginal4619374cef299e94fd7263111d0abc69 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4619374cef299e94fd7263111d0abc69 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="min-w-0">
            <h2 class="font-semibold text-xl text-slate-900 leading-tight truncate">Profile</h2>
            <p class="mt-1 text-sm text-slate-600">Manage your account details.</p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white border border-slate-200 rounded-lg shadow-sm p-6">
                <h3 class="text-base font-semibold text-slate-900">Profile information</h3>

                <form method="POST" action="<?php echo e(route('profile.update')); ?>" class="mt-4 space-y-4">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <div>
                        <label class="text-sm font-semibold text-slate-700" for="name">Name</label>
                        <input id="name" name="name" type="text" value="<?php echo e(old('name', $user->name)); ?>" required
                               class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-slate-700" for="email">Email</label>
                        <input id="email" name="email" type="email" value="<?php echo e(old('email', $user->email)); ?>" required
                               class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="inline-flex items-center rounded-md bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save</button>
                </form>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg shadow-sm p-6">
                <h3 class="text-base font-semibold text-slate-900">Update password</h3>

                <form method="POST" action="<?php echo e(route('password.update')); ?>" class="mt-4 space-y-4">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div>
                        <label class="text-sm font-semibold text-slate-700" for="current_password">Current password</label>
                        <input id="current_password" name="current_password" type="password" required
                               class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
                        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-slate-700" for="password">New password</label>
                        <input id="password" name="password" type="password" required
                               class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-slate-700" for="password_confirmation">Confirm password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                               class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
                    </div>

                    <button type="submit" class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update password</button>
                </form>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg shadow-sm p-6">
                <h3 class="text-base font-semibold text-slate-900">Delete account</h3>
                <p class="mt-1 text-sm text-slate-600">This action cannot be undone.</p>

                <form method="POST" action="<?php echo e(route('profile.destroy')); ?>" class="mt-4" data-confirm="delete">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-red-700 ring-1 ring-red-200 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete my account</button>
                </form>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $attributes = $__attributesOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__attributesOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $component = $__componentOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__componentOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?>
<?php /**PATH C:\lara_EmployeeManagementSystem\resources\views\profile\edit.blade.php ENDPATH**/ ?>