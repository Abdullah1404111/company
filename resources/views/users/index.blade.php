@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
    .crt{
        float: right; border: 1px solid #888; padding: 5px; border-radius: 5px;
    }

    .crt:hover {
        background-color: #ccc;
    }
    .button3 {
      background-color: white;
      color: black;
      border: 2px solid black;
      padding: 5px;
    }
    .button32 {
      background-color: white;
      color: black;
      border: 2px solid black;
      border-radius: 50%;
      padding: 10px;
    }

    .button3:hover {
      cursor: pointer;
      background-color: #f44336;
      color: white;
    }

    .button32:hover {
      cursor: pointer;
      background-color: #888;
      color: white;
    }

    input[type="text"] {
      border: 1 solid black;
      border-radius: 20px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-size: 20px; color: #0069D9;"><i class="fa fa-users"></i> All Users
                <button type="button" class="btn-sm button3" id="flip" style="outline-style: none;">Search</button>
                <form action="/userss" method="GET" id="panel" style="display: none; padding:10px;">
                    <input type="text" name="name" placeholder="Search User ...">
                    <button type="submit" class="button32" style="outline-style: none;"><i class="fas fa-search" style="font-size: 35px;"></i></button>
                  </form>
                </div>

                <div class="card-body">
                   @foreach($users as $user)
                        <li class="list-group-item" style="overflow: hidden;color: #232323; position: relative;  padding-left: 50px;">
                             <img src="/uploads/avatars/{{ $user->avatar }}" style="width: 32px; height: 32px; position: absolute; top: 5px; left: 10px;border-radius: 50%;" /><a href="/users/{{ $user->id }}">{{ $user->name }}@if($user->role_id == 3)
                    (Member)
                    @elseif($user->role_id == 1)
                    (Admin)
                    @endif</a>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>
