

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>
                <div class="card-header"><?php echo e(__('Korisnici')); ?></div>
                
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Email</th>
                            <th scope="col">Uloga</th>
                            <th scope="col">Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($user->id); ?></th>
                            <td><?php echo e($user->first_name); ?></td>
                            <td><?php echo e($user->last_name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->getRoleNames()->first()); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.user.edit', $user->id)); ?>"><button type="button" class="btn btn-primary btn-sm float-start mx-2">Uredi</button></a>
                                <form action="<?php echo e(route('admin.user.destory', $user->id)); ?>" method="POST" class="float-start">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('DELETE')); ?>

                                    <button type="submit" class="btn btn-warning btn-sm">Izbrisi</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(".alert").delay(3000).slideUp(200, function() {
    $(this).alert('close');
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/admin/users/index.blade.php ENDPATH**/ ?>