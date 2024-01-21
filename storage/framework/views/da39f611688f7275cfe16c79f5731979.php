

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">Moji apartmani </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4><i class="bi bi-house-check"></i> <?php echo e($apartment->title); ?></h4><br>
                    <h5><i class="bi bi-geo-alt-fill"></i> <?php echo e($apartment->address); ?></h5>
                    <br>
                    <h5>Kvadrata: <?php echo e($apartment->square_meter); ?> m2</h5>
                    <h5>Kat: <?php echo e($apartment->floor); ?></h5>
                    <h5>God. izgradnje: <?php echo e($apartment->year_of_construction); ?></h5>
                    <h5>Broj soba: <?php echo e($apartment->type); ?></h5>
                    <h5>Stanje: <?php echo e($apartment->state); ?></h5>
                    <h5>Cijena: <?php echo e($apartment->price); ?> KM</h5>
                    <br>
                        <div class="row">
                            <?php $__currentLoopData = $apartment->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 mt-2">
                                <div class="card">
                                    <img src="<?php echo e(asset('storage/' . $image->image)); ?>" class="card-img-top" alt="..." height="300px">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('renter.apartment.image.delete', $image->id)); ?>" method="POST" class="float-start">
                                            <?php echo csrf_field(); ?>
                                            <?php echo e(method_field('DELETE')); ?>

                                            <button type="submit" class="btn btn-danger btn-sm">Ukloni</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-4">
                                <img src="<?php echo e(asset('storage/' . $image->image)); ?>" class="card-img-top" alt="...">
                                <form action="<?php echo e(route('renter.apartment.image.delete', $image->id)); ?>" method="POST" class="float-start">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('DELETE')); ?>

                                    <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                                </form>   
                            </div> -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/renter/apartments/show.blade.php ENDPATH**/ ?>