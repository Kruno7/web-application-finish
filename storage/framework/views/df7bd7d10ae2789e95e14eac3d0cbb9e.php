

<?php $__env->startSection('content'); ?>

<div class="container mt-4 mb-6" style="min-height:100vh">
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
            
            <div class="col-md-4">
                <div class="col-md-4">Balkon: 
                    <?php if($apartment->balcony == 1): ?>
                    <i class="bi bi-check-square"></i>
                    <?php else: ?>
                    <i class="bi bi-dash-square"></i>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">Lift: 
                    <?php if($apartment->elevator == 1): ?>
                    <i class="bi bi-check-square"></i>
                    <?php else: ?>
                    <i class="bi bi-dash-square"></i>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">Klima:
                    <?php if($apartment->climate == 1): ?>
                    <i class="bi bi-check-square"></i>
                    <?php else: ?>
                    <i class="bi bi-dash-square"></i>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4">Parking: 
                    <?php if($apartment->climate == 1): ?>
                    <i class="bi bi-check-square"></i>
                    <?php else: ?>
                    <i class="bi bi-dash-square"></i>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">Wi-fi: 
                    <?php if($apartment->climate == 1): ?>
                    <i class="bi bi-check-square"></i>
                    <?php else: ?>
                    <i class="bi bi-dash-square"></i>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">Kabelska TV: 
                    <?php if($apartment->climate == 1): ?>
                    <i class="bi bi-check-square"></i>
                    <?php else: ?>
                    <i class="bi bi-dash-square"></i>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4">Namjesten: 
                    <?php if($apartment->furnished == 1): ?>
                    <i class="bi bi-check-square"></i>
                    <?php else: ?>
                    <i class="bi bi-dash-square"></i>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">Kucni ljubimci: 
                    <?php if($apartment->climate == 1): ?>
                    <i class="bi bi-check-square"></i>
                    <?php else: ?>
                    <i class="bi bi-dash-square"></i>
                    <?php endif; ?>
                </div>
                
            </div>
            
        </div>
        <?php if(Auth::check()): ?>
            <a href="<?php echo e(route('user.apartment.send-message', $apartment->id)); ?>" class="btn btn-primary btm-sm mt-4">Posalji poruku iznajmljivacu</a>
        <?php else: ?>
            Ako zelite poslati poruku iznajmljivacu, morate se prijaviti <a href="<?php echo e(route('login')); ?>"  class="btn btn-primary btn-sm">Prijava</a>
        <?php endif; ?>
        <hr>
        
        <div class="row">
            <?php $__currentLoopData = $apartment->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <img src="<?php echo e(asset('storage/' . $image->image)); ?>" class="card-img-top" height="250" alt="...">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <hr>
    </div>
</div>
    

<?php $__env->stopSection(); ?>

<script>
    /*window.onload = function() {
        document.getElementById("asd").style.display = "none";
    };*/
    function sendMessage () {
        document.getElementById("asd").style.display = "block";
        
    }
</script>
<?php echo $__env->make('layouts.public.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/user/apartments/show.blade.php ENDPATH**/ ?>