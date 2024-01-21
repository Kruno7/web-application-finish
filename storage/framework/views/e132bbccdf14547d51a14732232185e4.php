

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?php if(Session::has('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6">Gradovi</div>
                        <div class="col-md-6"><a class="btn btn-primary btn-sm float-end" href="<?php echo e(route('admin.city.create')); ?>">Dodaj grad</a></div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Postanski broj</th>
                            <th scope="col">Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($city->id); ?></th>
                                <td><?php echo e($city->name); ?></td>
                                <td><?php echo e($city->zip_code); ?></td>
                                <td>
                                <a href="<?php echo e(route('admin.city.edit', $city->id)); ?>"><button type="button" class="btn btn-warning btn-sm float-start mx-2">Uredi</button></a>
                                <form action="<?php echo e(route('admin.city.destroy', $city->id)); ?>" method="POST" class="float-start">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('DELETE')); ?>

                                    <button type="submit" class="btn btn-danger btn-sm">Izbrisi</button>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/admin/cities/index.blade.php ENDPATH**/ ?>