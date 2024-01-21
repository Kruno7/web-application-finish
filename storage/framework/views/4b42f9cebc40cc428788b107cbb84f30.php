

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Azuriraj grad
                </div>

                <div class="card-body">
                <form action="<?php echo e(route('admin.city.update', $city)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 mt-3">
                        <?php if($errors->has('name')): ?>
                            <p class="alert alert-danger"><?php echo e($errors->first('name')); ?></p>
                        <?php endif; ?>
                        <label for="name" class="form-label">Unesite grad:</label>
                        <input type="text" class="form-control" id="name" placeholder="Unesite grad" name="name" value="<?php echo e($city->name); ?>" name="name">
                    </div>
                    <div class="mb-3">
                        <?php if($errors->has('zip_code')): ?>
                            <p class="alert alert-danger"><?php echo e($errors->first('zip_code')); ?></p>
                        <?php endif; ?>
                        <label for="zip_code" class="form-label">Postanski broj:</label>
                        <input type="number" class="form-control" id="num" placeholder="Unesite postanski broj" name="zip_code" value="<?php echo e($city->zip_code); ?>" name="zip_code">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Azuriraj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/admin/cities/edit.blade.php ENDPATH**/ ?>