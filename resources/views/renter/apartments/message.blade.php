@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Poruke </div>
                    </div>
                </div>
                <div class="card-body">
                      
                    @foreach ($messages as $message)
                        
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $message->apartments->title }}</b></h5>
                            <h6>Poruka od korisnika: {{ $message->users->name }}</h6>
                            <hr>
                            <div>
                                <p class="card-text"></p>
                                <p><b>Poruka: </b>{{ $message->content }} </p>

                            </div>
                            @foreach ($replies as $reply)
                                <p><b>Odgovor:</b> {{ $reply->content }} </p>
                            @endforeach
                            <hr>
                            
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="reply(this)" data-messageid="{{ $message->id }}">Odgovori</a>
                            
                        </div>
                    @endforeach
                    
                        <div class="replyDiv" style="display:none;">
                            <form action="{{ route('renter.apartment.reply') }}" method="POST">
                                @csrf
                                <input type="text" id="messageId" name="message_id" hidden>

                                <textarea class="form-control" name="content" placeholder="Ovdje napisite poruku " id="floatingTextarea2" style="height: 100px"></textarea>
                                
                                <button type="submit" class="btn btn-primary btn-sm">Posalji poruku</button>
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="reply_close(this)">Zatvori</a>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>

    function reply (caller) {
        
        document.getElementById('messageId').value = $(caller).attr('data-messageid')
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
        let messageid = document.getElementById('messageId').value = $(caller).attr('data-messageid')
            console.log("Notify ", messageid)
                $.ajax({
                url: "{{ route('renter.apartment.message.read') }}",
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
    
    function sendMessage () {   
        var button = document.getElementById("insert").value
        document.getElementById("asd").style.display = "block";
        console.log("Klik")
    
    }
    
</script>