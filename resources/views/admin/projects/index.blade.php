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
                <div class="card-header text-center" style="font-size: 20px; color: #0069D9;"><b><i class="fa fa-users"></i> All Projects</b></div>

                <div class="card-body">
                   @foreach($projects as $project)
                            <li class="list-group-item" style="color: #232323"><a href="/projects/{{ $project->id }}">{{ $project->name }}</a>
                             <a class="float-right" href="#" 
                            onclick="
                                var result = confirm('Are you sure you want to proceed deleting this User?');
                                if ( result ) {
                                    event.preventDefault();
                                    document.getElementById('delete-form').submit();
                                }">
                                <i class="fas fa-trash-alt"></i>&nbsp;Delete
                            </a>
                            <form id="delete-form" action="/projects/{{ $project->id }}" method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                            </form>
                            </li>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection