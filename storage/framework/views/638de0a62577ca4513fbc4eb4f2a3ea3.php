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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <?php if(Auth::user()->hasRole('admin')): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Request::is('admin/user') ? 'active' : ''); ?>" aria-current="page" href="<?php echo e(route('admin.user.index')); ?>">Korisnici</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Request::is('admin/city') ? 'active' : ''); ?>" href="<?php echo e(route('admin.city.index')); ?>">Gradovi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Request::is('admin/apartment') ? 'active' : ''); ?>" href="<?php echo e(route('admin.apartment.index')); ?>">Stanovi</a>
                            </li>
                        <?php elseif(Auth::user()->hasRole('renter')): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Request::is('renter/apartment') ? 'active' : ''); ?>" href="<?php echo e(route('renter.apartment.index')); ?>">Stanovi</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Request::is('renter/apartment/message') ? 'active' : ''); ?>" href="<?php echo e(route('renter.apartment.message')); ?>">Poruke 
                                    <span class="badge badge-danger"><?php echo e(Auth::user()->unreadNotifications->count()); ?></span>
                                </a>
                            </li>
                            

                            <!--<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Neprocitane poruke 
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <?php $__empty_1 = true; $__currentLoopData = Auth::user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($notification->read_at == null): ?>
                                    <!--<a href="" class="dropdown-item"></a> --
                                    <a href="javascript:void(0)" class="dropdown-item" onclick="read_message(this)"  data-notificationid=""></a>
                                <?php endif; ?>
                                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <a class="dropdown-item">No message found</a>
                                <?php endif; ?>
                                    
                                </div>
                            </li> -->
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
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

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

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <div>
            <?php echo $__env->make('layouts.public.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <script>
        function read_message (caller) {
            //console.log("Radi")
            //console.log("AAA ", item)
            let notificationid = document.getElementById('messageId').value = $(caller).attr('data-notificationid')
            console.log("Notify ", notificationid)
                $.ajax({
                //url: "<?php echo e(route('user.serach.cities')); ?>",
                url: "<?php echo e(route('renter.apartment.message.read')); ?>",
                method: "GET",
                data: {
                    id: notificationid,
                },
                success: function (response) {
                    window.location.reload();
                    console.log(response)
                    /*$('#show-list').html('')
                    $.each(response.cities, function(key, value){
                        var url = '<?php echo e(route("user.serach.city", ":id")); ?>';
                        url = url.replace(':id', value.id);
                        //$('#show-list').append('<li class="list-group-item">'+ value.name +'</li>')
                        $('#show-list').append('<a href="'+ url +'" class="list-group-item list-group-item-action mt-2">'+ value.name +'</a>')
                    }) */
                    //$('#result').html('<li class="list-group-item">haha</li>')
                    //$("#show-list").html(response);
                },
            });
        }
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\web-application\resources\views/layouts/admin/app.blade.php ENDPATH**/ ?>