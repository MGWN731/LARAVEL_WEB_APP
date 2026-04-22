<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>

    <body class="font-sans antialiased bg-slate-50 text-slate-900" x-data="adminShell">
        <?php if(session('status')): ?>
            <script>window.__FLASH_STATUS__ = <?php echo json_encode(session('status'), 15, 512) ?>;</script>
        <?php endif; ?>

        <div class="min-h-screen">
            <header class="border-b bg-white/80 backdrop-blur border-slate-200">
                <div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <a href="<?php echo e(url('/dashboard')); ?>" class="flex items-center min-w-0 gap-3">
                        <?php if (isset($component)) { $__componentOriginal8892e718f3d0d7a916180885c6f012e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8892e718f3d0d7a916180885c6f012e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.application-logo','data' => ['class' => 'w-auto h-8 fill-current text-slate-900']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-auto h-8 fill-current text-slate-900']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $attributes = $__attributesOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $component = $__componentOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__componentOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
                        <span class="font-semibold truncate text-slate-900"><?php echo e(config('app.name', 'Laravel')); ?></span>
                    </a>

                    <nav class="flex flex-wrap items-center gap-2 sm:justify-end sm:gap-3">
                        <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-md text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Dashboard</a>
                        <a href="<?php echo e(route('employees.index')); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-md text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Employees</a>
                        <a href="<?php echo e(route('profile.edit')); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-md text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Profile</a>

                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white rounded-md bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Log out</button>
                        </form>
                    </nav>
                </div>
            </header>

            <?php if(isset($header)): ?>
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="bg-white rounded-xl ring-1 ring-slate-200 shadow-sm p-5">
                        <?php echo e($header); ?>

                    </div>
                </div>
            <?php endif; ?>

            <main>
                <?php echo e($slot); ?>

            </main>
        </div>
    </body>
</html>
<?php /**PATH C:\lara_EmployeeManagementSystem\resources\views/components/app-layout.blade.php ENDPATH**/ ?>