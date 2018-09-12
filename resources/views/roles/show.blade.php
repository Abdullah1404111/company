@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 15px;">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">User by category</div>
                <div class="card-body">
            			<ol>
            				@foreach($users as $r_user)
            					<li class="list-group-item" style="color: #232323"><a href="/users/{{ $r_user->id }}">{{ $r_user->name }}</a></li>
            				@endforeach
            			</ol>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection
