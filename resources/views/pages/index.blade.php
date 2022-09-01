@extends('layouts.app')
@section('title', config('app.name'))
@section('content')
    <div class="container py-5"></div>
    <div class="container my-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 bg-light border rounded p-3">
                <h1 class="h2 text-center">Shorten Your URL</h1>
                <form action="{{ route('generate') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row mt-3">
                        <label for="url" class="col-12" class="form-label">Input URL</label>
                        <div class="col-12">
                            <input type="text" name="url" id="url" class="form-control">
                        </div>
                    </div>

                    <button type="submit" id="submit" class="btn btn-primary float-end my-3">Generate</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
<script>
    function checkURL(url)
    {
        var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
        return regexp.test(url);
    }
    $(()=>{
        $("#submit").click((e)=>{
            var url = $("#url").val();

            if(!checkURL(url))
            {
                alert("Please input valid URL");
                e.preventDefault();
            }
        });
    });
</script>
@endsection
