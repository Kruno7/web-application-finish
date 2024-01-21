

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Stanovi</div>
                    </div>
                </div>

                <div class="card-body">
                    
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Naslov</th>
                                <th scope="col">Adresa</th>
                                <th scope="col">Kontakt</th>
                                <th scope="col">Cijena</th>
                                <th scope="col">Opcije</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($apartment->id); ?></th>
                                    <td><?php echo e($apartment->title); ?></td>
                                    <td><?php echo e($apartment->address); ?></td>
                                    <td><?php echo e($apartment->contact); ?></td>
                                    <td><?php echo e($apartment->price); ?> KM</td>
                                    <td>
                                    <form action="<?php echo e(route('admin.apartment.destroy', $apartment->id)); ?>" method="POST" class="float-start">
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('DELETE')); ?>

                                        <button type="submit" class="btn btn-danger btn-sm">Ukloni</button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/admin/apartments/index.blade.php ENDPATH**/ ?>