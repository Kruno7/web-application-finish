

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"><a class="btn btn-primary" href="">Add apartment</a></div>
                    </div>
                </div>

                <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                    <h2>Dodaj smještaj </h2>
                <div class="container mt-3">           
                   
                    <form action="/action_page.php">
                    <div class="mb-3 mt-3">
                        <label for="text" class="form-label">Opis:</label>
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Grad:</label>
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresa:</label>
                        <input type="address" class="form-control" name="adress">
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Cijena:</label>
                        <input type="number" class="form-control" name="number">
                    </div>
                    Tip:
                    <select class="form-select">
                        <option></option>
                        <option>garsonjera</option>
                        <option>jednosoban</option>
                        <option>dvosoban</option>
                        <option>trosoban</option>
                        </select>
                    
                    </div> <br>
                    <button type="submit" class="btn btn-primary">Odustani</button>
                    
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                    
                        
                    </div>
                   
                    
                    <div class="col-sm-8">
                        
                    <div class="container mt-3">
                  
                   
                        <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="option1" value="something" checked>
                        <label class="form-check-label" for="check1">Balkon1</label>
                        </div>
                        <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="option2" value="something">
                        <label class="form-check-label" for="check2">Internet</label>
                        </div>
                        <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">Novogradnja</label>
                        </div>
                        
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/renter/apartment/create.blade.php ENDPATH**/ ?>