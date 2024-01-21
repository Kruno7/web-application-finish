

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Odaberi ulogu
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('admin.user.update', $user)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" required value="<?php echo e($role->id); ?>" <?php echo e(($role->id == $user->roles->first()->id) ? "checked" : ""); ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                <b><?php echo e($role->name); ?></b>
                            </label>
                        </div>

                           <!--<div class="form-check">
                                <label><?php echo e($role->name); ?></label>
                                <input type="radio" name="role" required value="<?php echo e($role->id); ?>" <?php echo e(($role->id == $user->roles->first()->id) ? "checked" : ""); ?>>
                            </div> -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Azuriraj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>