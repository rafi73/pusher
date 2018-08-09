@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <input type="text" id="txtComment">
                    <a id="pusher" class="btn btn-xs btn-info pull-right">Push</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        console.log(123)
        $("#pusher").click(function(){
            console.log($('#txtComment').val())
            $.ajax({
                url: `/push/${$('#txtComment').val()}`,
                type: 'GET',
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    });
</script>
