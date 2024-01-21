

<?php $__env->startSection('content'); ?>

<div class="container mt-4" style="min-height:70vh">
    <h3>Poruke</h3>
    <input type="text" id="apartmentId" name="apartment_id" hidden value="<?php if(isset($apartment)): ?><?php echo e($apartment->id); ?> <?php endif; ?>">
        <?php if(isset($apartments)): ?>
            <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <hr>
                <?php echo e($apartment->title); ?> 
            <?php $__currentLoopData = $apartment->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <br>
                <?php if($message->user_id == Auth::user()->id): ?>
                    <?php echo e($message); ?>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br>
            <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="reply(this)" data-messageid="<?php if(isset($message)): ?><?php echo e($message->id); ?> <?php endif; ?>">Odgovori</a>
        <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<br>
<?php endif; ?>
    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h5><b><?php echo e($message->apartments->title); ?></b></h5> <br>
        <b>Poruka: </b> <?php echo e($message->content); ?> <br>
        <?php $__currentLoopData = $message->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <b>Odgovor:</b> <?php echo e($reply->content); ?> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br>
        <a href="javascript:void(0)" class="btn btn-primary btn-sm"  onclick="reply(this)" data-messageid="<?php if(isset($message)): ?><?php echo e($message->id); ?> <?php endif; ?>">Odgovori</a>
        
    <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if(!empty($apartment) && empty($message)): ?>
        <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="sendMessage(this)" data-messageid="6">Posalji prvu poruku iznajmljivacu</a>
   <?php endif; ?>

        <div class="replyDiv" style="display:none; width:40%">
            <form action="<?php echo e(route('user.apartment.reply')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" id="messageId" name="message_id" hidden>
                <textarea class="form-control mb-2" name="content" placeholder="Ovdje napisite poruku" id="floatingTextarea2" style="height: 70px; margin-top:12px"></textarea>
                
                <!--<a href="" class="btn btn-primary btn-sm">Pošalji</a>-->
                <button type="submit" class="btn btn-primary btn-sm">Posalji poruku</button>
                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="reply_close(this)">Zatvori</a>
            </form>
        </div>

        <!--<div id="contact"> -->
            <form id="asd" style="display:none" action="<?php echo e(route('user.apartment.send')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" id="userId" name="user_id" hidden value="<?php echo e(Auth::user()->id); ?>">
                <?php if(isset($apartment)): ?>
                <input type="text" id="apartmentId" name="apartment_id" hidden value="<?php if(!empty($apartment)): ?><?php echo e($apartment->id); ?> <?php endif; ?>">
                <?php endif; ?>
                <div class="mb-3 mt-2" style="width:40%">
                    <textarea class="form-control" id="content" name="content" rows="2" placeholder="Ovdje napisite poruku"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-3 btn-sm">Posalji poruku </button>
            </form>
        <!-- </div> -->
   
    
</div>



<!--

<input type="text" id="apartmentId" name="apartment_id" hidden value="<?php if(isset($apartment)): ?><?php echo e($apartment->id); ?> <?php endif; ?>">

    <div class="card-body">

    <?php if(isset($apartments)): ?>
    
        <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <hr>
                <?php echo e($apartment->title); ?> 
            
            <?php $__currentLoopData = $apartment->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <br>
                <?php if($message->user_id == Auth::user()->id): ?>
                    
                    <?php echo e($message); ?>

                    
                <?php endif; ?>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br>
            <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="reply(this)" data-messageid="<?php if(isset($message)): ?><?php echo e($message->id); ?> <?php endif; ?>">Odgovori</a>
        <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    <br>
    <?php endif; ?>

        
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h3><?php echo e($message->apartments->title); ?></h3> <br>
            <?php echo e($message->content); ?> <br>
            <?php $__currentLoopData = $message->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($reply->content); ?> <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br>
            <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="reply(this)" data-messageid="<?php if(isset($message)): ?><?php echo e($message->id); ?> <?php endif; ?>">Odgovori</a>
           
        <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
            
        <?php if(!empty($apartment) && empty($message)): ?>
            <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="sendMessage(this)" data-messageid="6">Posalji prvu poruku iznajmljivacu</a>
            
            <!-<a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="reply(this)" data-messageid="<?php if(isset($message)): ?><?php echo e($message->id); ?> <?php endif; ?>">Odgovori</a>--
        <?php endif; ?>
        
    
        
        <div class="replyDiv" style="display:none;">
            <form action="<?php echo e(route('user.apartment.reply', 1)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" id="messageId" name="message_id" hidden>
                <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                
                <!--<a href="" class="btn btn-primary btn-sm">Pošalji</a>--
                <button type="submit" class="btn btn-primary btn-sm">Posalji poruku</button>
                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="reply_close(this)">Zatvori</a>
            </form>
        </div>
        
            
            <!--<button type="button" onclick="sendMessage()" id="insert" value="Add new Product">Posalji poruku iznajmljivacu</button> --
            <?php if(2 == 3): ?>
            <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="sendMessage(this)" data-messageid="6">Posalji prvu poruku iznajmljivacu</a>
            <?php endif; ?>
            <div id="contact">
                <form id="asd" style="display:none" action="<?php echo e(route('user.apartment.send')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" id="userId" name="user_id" hidden value="<?php echo e(Auth::user()->id); ?>">
                    <?php if(isset($apartment)): ?>
                    <input type="text" id="apartmentId" name="apartment_id" hidden value="<?php if(!empty($apartment)): ?><?php echo e($apartment->id); ?> <?php endif; ?>">
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="content" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Posalji prvu poruku </button>
                </form>
            </div>
            <hr>
          
    </div> -->

    <!--<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($message); ?>

        <?php $__currentLoopData = $message->apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($apartment); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
        
        <!--<?php if(isset($messages)): ?>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($message->content); ?>

                <br>
                <?php $__currentLoopData = $message->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($reply->content); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?> -->

<?php $__env->stopSection(); ?>

<script>
    /*window.onload = function() {
        document.getElementById("asd").style.display = "none";
    };*/


    function sendMessage () {
        document.getElementById("asd").style.display = "block";  
    }

    function reply (caller) {
        document.getElementById('messageId').value = $(caller).attr('data-messageid')
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();

        let messageid = document.getElementById('messageId').value = $(caller).attr('data-messageid')
            console.log("Notify ", messageid)
            $.ajax({
                url: "<?php echo e(route('user.apartment.message.read')); ?>",
                method: "GET",
                data: {
                    message_id: messageid,
                },
                success: function (response) {
                //window.location.reload();
                console.log(response)
            },
        });
        
    }

    function reply_close (caller) {
        $('.replyDiv').hide();
    }
    
    /*function sendMessage () {   
        var button = document.getElementById("insert").value
        document.getElementById("asd").style.display = "block";
        console.log("Klik")
    } */
</script>
<?php echo $__env->make('layouts.public.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-application\resources\views/user/apartments/message.blade.php ENDPATH**/ ?>