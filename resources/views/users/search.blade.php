@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-size: 20px; color: #0069D9;"><i class="fa fa-users"></i> Search result
                </div>


                <div class="card-body">
                  <ol>
                    <div class="card-body">
                       @foreach($user as $use)
                            <li class="list-group-item" style="color: #232323; position: relative;  padding-left: 50px;">
                                 <img src="/uploads/avatars/{{ $use->avatar }}" style="width: 32px; height: 32px; position: absolute; top: 5px; left: 10px;border-radius: 50%;" /><a href="/users/{{ $use->id }}">{{ $use->name }}@if($use->role_id == 3)
                        (Member)
                        @elseif($use->role_id == 1)
                        (Admin)
                        @endif</a>
                            </li>
                        @endforeach
                  </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
