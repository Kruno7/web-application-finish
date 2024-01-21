

<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="row my-2">
        <div class="col-md-6"><h3>Moji Stanovi</h3>
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(Session::get('success')); ?>

                </div>
            <?php endif; ?>
        </div>
        
        <div class="col-md-6">
            <div class="text-end">
                <a class="btn btn-primary" href="<?php echo e(route('renter.apartment.create')); ?>">Dodaj novi stan</a>
            </div>
                
        </div>
    </div>

    <table class="table table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naslov</th>
            <th scope="col">Adresa</th>
            <th scope="col">Opis</th>
            <th scope="col">Opcije</th>
        </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($apartment->id); ?></th>
                <td><?php echo e($apartment->title); ?></td>
                <td><?php echo e($apartment->address); ?></td>
                <td><?php echo e($apartment->description); ?></td>
                <td>
                    <a href="<?php echo e(route('renter.apartment.show', $apartment)); ?>"><button type="button" class="btn btn-primary btn-sm">Prikazi</button></a>
                    <a href="<?php echo e(route('renter.apartment.edit', $apartment)); ?>"><button type="button" class="btn btn-warning btn-sm">Uredi</button></a>
                    <a href="<?php echo e(route('renter.apartment.delete', $apartment)); ?>"><button type="button" class="btn btn-danger btn-sm">Izbrisi</button></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    


    <!--<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Stanovi</div>
                        <div class="col-md-6">
                            <div class="text-end">
                                <a class="btn btn-primary" href="<?php echo e(route('renter.apartment.create')); ?>">Add apartment</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        
                        <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 border">
                                <p><?php echo e($apartment); ?></p>
                                <a href="<?php echo e(route('renter.apartment.show', $apartment)); ?>">Show apartment</a>
                                <a href="<?php echo e(route('renter.apartment.edit', $apartment)); ?>">Edit apartment</a>
                                <a href="<?php echo e(route('renter.apartment.delete', $apartment)); ?>">Delete apartment</a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div> -->
</div>

<script>

$(".alert").delay(3000).slideUp(200, function() {
    $(this).alert('close');
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/renter/apartments/index.blade.php ENDPATH**/ ?>