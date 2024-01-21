@extends('layouts.public.app')

@section('content')

<div class="container mt-4" style="min-height:70vh">
    <h3>Poruke</h3>
    <input type="text" id="apartmentId" name="apartment_id" hidden value="@if(isset($apartment)){{ $apartment->id }} @endif">
        @if (isset($apartments))
            @foreach ($apartments as $apartment)
            <hr>
                {{ $apartment->title }} 
            @foreach ($apartment->messages as $message)
                <br>
                @if ($message->user_id == Auth::user()->id)
                    {{ $message }}
                @endif
            @endforeach
            <br>
            <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="reply(this)" data-messageid="@if(isset($message)){{ $message->id }} @endif">Odgovori</a>
        <br>
        @endforeach
<br>
@endif
    @foreach ($messages as $message)
        <h5><b>{{ $message->apartments->title }}</b></h5> <br>
        <b>Poruka: </b> {{ $message->content }} <br>
        @foreach ($message->replies as $reply)
        <b>Odgovor:</b> {{ $reply->content }} <br>
        @endforeach
        <br>
        <a href="javascript:void(0)" class="btn btn-primary btn-sm"  onclick="reply(this)" data-messageid="@if(isset($message)){{ $message->id }} @endif">Odgovori</a>
        
    <hr>
    @endforeach

    @if(!empty($apartment) && empty($message))
        <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="sendMessage(this)" data-messageid="6">Posalji prvu poruku iznajmljivacu</a>
   @endif

        <div class="replyDiv" style="display:none; width:40%">
            <form action="{{ route('user.apartment.reply') }}" method="POST">
                @csrf
                <input type="text" id="messageId" name="message_id" hidden>
                <textarea class="form-control mb-2" name="content" placeholder="Ovdje napisite poruku" id="floatingTextarea2" style="height: 70px; margin-top:12px"></textarea>
                
                <button type="submit" class="btn btn-primary btn-sm">Posalji poruku</button>
                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="reply_close(this)">Zatvori</a>
            </form>
        </div>

            <form id="asd" style="display:none" action="{{ route('user.apartment.send') }}" method="POST">
                @csrf
                <input type="text" id="userId" name="user_id" hidden value="{{ Auth::user()->id }}">
                @if(isset($apartment))
                <input type="text" id="apartmentId" name="apartment_id" hidden value="@if(!empty($apartment)){{ $apartment->id }} @endif">
                @endif
                <div class="mb-3 mt-2" style="width:40%">
                    <textarea class="form-control" id="content" name="content" rows="2" placeholder="Ovdje napisite poruku"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-3 btn-sm">Posalji poruku </button>
            </form>
  
    
</div>


@endsection

<script>

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
                url: "{{ route('user.apartment.message.read') }}",
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
    

</script>