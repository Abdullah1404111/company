@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 30px;">  
                <div class="card-header">All Roles</div>           
                <div class="card-body">
                     @foreach($roles as $role)
                            <li class="list-group-item" style="color: #232323"><a href="/roles/{{ $role->id }}">{{ $role->name }}s</a></li>
                    @endforeach                                                                                     
                </div>
                 <div class="card-footer text-center">Copyright &copy;Abdullah Al Hossain(14)</div>
            </div>           
        </div>
    </div>
</div>

@endsection