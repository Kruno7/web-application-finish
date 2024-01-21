<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <!--<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>-->

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Logo
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                   
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('/') ? 'active' : ''); ?>" aria-current="page" href="<?php echo e(url('/')); ?>">Početna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('apartment') ? 'active' : ''); ?>" href="<?php echo e(route('user.apartment.index')); ?>">Stanovi</a>
                        </li>
                        <?php if(Auth::check()): ?>
                        
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('apartment/messages') ? 'active' : ''); ?>" href="<?php echo e(route('user.apartment.message')); ?>">Poruke 
                                <span class="badge badge-danger"><?php echo e(Auth::user()->unreadNotifications ->count()); ?></span>
                            </a>
                        </li>
                     
                        <?php endif; ?>
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Prijava')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Registracija')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->first_name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <?php if(Auth::user()->hasRole('admin')): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.profile.index')); ?>">
                                        <?php echo e(__('Profil')); ?>

                                    </a>
                                    <?php elseif(Auth::user()->hasRole('renter')): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('renter.profile.index')); ?>">
                                        <?php echo e(__('Profil')); ?>

                                    </a>
                                    <?php else: ?>
                                    <a class="dropdown-item" href="<?php echo e(route('user.profile.index')); ?>">
                                        <?php echo e(__('Profil')); ?>

                                    </a>
                                    <?php endif; ?>
                                    
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Odjava')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
       
        <main class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <div>
            <?php echo $__env->make('layouts.public.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\web-application\resources\views/layouts/public/app.blade.php ENDPATH**/ ?>