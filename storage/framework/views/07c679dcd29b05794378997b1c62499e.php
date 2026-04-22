<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?> — About</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>

    <body class="font-sans antialiased bg-slate-50 text-slate-900">
        <div class="min-h-screen">
            <header class="border-b bg-white/80 backdrop-blur border-slate-200">
                <div class="flex flex-col gap-4 px-4 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:flex-row sm:items-center sm:justify-between">
                    <a href="<?php echo e(url('/')); ?>" class="flex items-center min-w-0 gap-3">
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
                        <span class="font-semibold truncate"><?php echo e(config('app.name', 'Laravel')); ?></span>
                    </a>

                    <nav class="flex flex-wrap items-center gap-2 sm:justify-end sm:gap-3">
                        <a href="<?php echo e(route('about')); ?>"
                           class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-md bg-slate-100 text-slate-900 ring-1 ring-slate-200">
                            About
                        </a>

                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url('/dashboard')); ?>"
                               class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white rounded-md bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Dashboard
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>"
                               class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-md text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Log in
                            </a>

                            <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>"
                                   class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white rounded-md bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Register
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </nav>
                </div>
            </header>

            <main class="px-4 py-10 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:py-12 lg:py-16">
                <div class="max-w-4xl">
                    <p class="inline-flex items-center gap-2 px-3 py-1 text-xs font-semibold bg-white rounded-full text-slate-700 ring-1 ring-slate-200">
                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                        About this system
                    </p>

                    <h1 class="max-w-2xl mt-5 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl text-slate-900">
                        Lara Employee Management System
                    </h1>

                    <p class="max-w-3xl mt-4 text-base leading-7 sm:text-lg text-slate-600">
                        A lightweight employee management app built with Laravel 11, Breeze authentication, Tailwind UI,
                        and a clean admin layout. It supports employee CRUD, optional photo uploads, and a modern UX for daily use.
                    </p>
                </div>

                <div class="grid gap-4 mt-10 sm:gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    <div class="p-6 bg-white rounded-xl ring-1 ring-slate-200">
                        <div class="text-sm font-semibold text-slate-900">Authentication</div>
                        <div class="mt-2 text-sm text-slate-600">Register, login, logout, and profile management.</div>
                    </div>

                    <div class="p-6 bg-white rounded-xl ring-1 ring-slate-200">
                        <div class="text-sm font-semibold text-slate-900">Employees</div>
                        <div class="mt-2 text-sm text-slate-600">Create, view, edit, delete employees with contact and role details.</div>
                    </div>

                    <div class="p-6 bg-white rounded-xl ring-1 ring-slate-200">
                        <div class="text-sm font-semibold text-slate-900">Photos</div>
                        <div class="mt-2 text-sm text-slate-600">Upload an optional photo per employee (stored on the public disk).</div>
                    </div>
                </div>

                <div class="grid gap-6 mt-10 lg:grid-cols-12">
                    <div class="lg:col-span-7 p-6 bg-white rounded-xl ring-1 ring-slate-200">
                        <h2 class="text-lg font-semibold text-slate-900">How it works</h2>
                        <ul class="mt-4 space-y-2 text-sm text-slate-700">
                            <li>All employee routes are protected by login (no roles: any logged-in user can access all employees).</li>
                            <li>SweetAlert2 is used for toast notifications, delete confirmations, and the “View details” modal.</li>
                            <li>MySQL/MariaDB migrations are included for easy setup on XAMPP.</li>
                        </ul>

                        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('employees.index')); ?>"
                                   class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-semibold text-white rounded-md sm:w-auto bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Open Employees
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>"
                                   class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-semibold text-white rounded-md sm:w-auto bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Log in to continue
                                </a>
                            <?php endif; ?>

                            <a href="<?php echo e(url('/')); ?>"
                                         class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-semibold bg-white rounded-md sm:w-auto text-slate-900 ring-1 ring-slate-200 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Back to Home
                            </a>
                        </div>

                    </div>

                    <div class="lg:col-span-5 p-6 bg-white rounded-xl ring-1 ring-slate-200">
                        <h2 class="text-lg font-semibold text-slate-900">Team members</h2>
                        <ul class="mt-4 grid gap-2 text-sm text-slate-700 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                            <li class="rounded-md bg-slate-50 px-3 py-2 ring-1 ring-slate-200">Elmer C. Elovera</li>
                            <li class="rounded-md bg-slate-50 px-3 py-2 ring-1 ring-slate-200">Myrnalen A. Guiwan</li>
                            <li class="rounded-md bg-slate-50 px-3 py-2 ring-1 ring-slate-200">Mark David H. Paradiang</li>
                            <li class="rounded-md bg-slate-50 px-3 py-2 ring-1 ring-slate-200">Jasper Allen B. Unatin</li>
                        </ul>
                    </div>
                </div>
            </main>

            <footer class="bg-white border-t border-slate-200">
                <div class="flex flex-col items-center justify-between gap-4 px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:flex-row sm:text-left text-center">
                    <p class="text-sm text-slate-600">© <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Laravel')); ?>. All rights reserved.</p>
                    <p class="text-sm text-slate-600">Built with Laravel + Tailwind.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
<?php /**PATH C:\lara_EmployeeManagementSystem\resources\views\about.blade.php ENDPATH**/ ?>