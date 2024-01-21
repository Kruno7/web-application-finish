

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Moj profil')); ?></div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-0">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"><?php echo e(Auth::user()->name); ?></h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-2">
                            <div class="card-body">
                                <form action="<?php echo e(route('renter.profile.update')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="name">Ime i prezime</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo e(Auth::user()->name); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  value="<?php echo e(Auth::user()->email); ?>" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" value="<?php echo e(Auth::user()->password); ?>" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary ms-1">Spremi promjene</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/renter/profile/index.blade.php ENDPATH**/ ?>