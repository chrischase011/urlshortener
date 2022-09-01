@extends('layouts.app')
@section('title', "Your link is ready - ".config('app.name'))
@section('content')

<div class="container py-5"></div>
    <div class="container my-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 bg-light border rounded p-3">
                <h1 class="h2 text-center">Your link is ready</h1><br>
                <small class="text-muted">You can now copy your link</small>
                <input type="text" value="{{$token}}" id="url" class="form-control" readonly>
                <a href="javascript:void(0)" id='copy_text'>Copy</a>
                <a href="{{$token}}" class="btn btn-primary btn-lg text-decoration-none w-100 mt-3" target="_blank">Go To Link</a>
                <p class="my-3 text-center"><a href="{{route('home')}}">Generate again</a></p>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <script>
        $(()=>{
            $("#copy_text").on('click', ()=>{
                $("#url").select();

                document.execCommand('copy');

                $("#copy_text").addClass('text-decoration-none text-black').css('cursor', 'default').html("Copied!!!");
                $("#copy_text").unbind('click');
            });
        });
    </script>
@endsection