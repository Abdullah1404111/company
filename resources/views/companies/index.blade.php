@extends('layouts.app')
<style type="text/css">
	.crt{
		float: right; border: 1px solid #888; padding: 5px; border-radius: 5px;
	}

	.crt:hover {
		background-color: #ccc;
	}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Companies &nbsp;&nbsp;&nbsp;&nbsp;<a href="/companies/create" class="crt"><i class="fas fa-plus" ></i> Add new Company</a></div>

                <div class="card-body">
                   @foreach($companies as $company)
			  				<a href="/companies/{{ $company->id }}"><li class="list-group-item text-center btn-primary" style="color: #232323">{{ $company->name }}</li></a>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection