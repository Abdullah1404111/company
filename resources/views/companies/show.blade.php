@extends('layouts.app')
<script type="text/javascript">
	function fun(){

	}
</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>{{ $company->name }}</h1>
						<p class="lead"> {{ $company->description }}</p></div>

                <div class="card-body">
                	<div class="row">
                		<div class="col-lg-10">
                			<?php
                				$i=0;
                			?>
						@foreach($company->projects as $project)

							<div class="col-lg-4" style="float: left; overflow: hidden; min-height: 300px; position: relative; background-color: #ccc; margin-bottom: 1px; margin-right: px; border-radius: 20px; border: 1px solid #999;">
								<h2 style="padding: 10px;">{{ $project->name }}</h2>
								<hr style="background-color:	#fff; width:100%; height: 1px;">
								<p class="danger">{{ $project->description }}</p>
								<p style="bottom: 5px; position: absolute;"><a href="/projects/{{ $project->id }}" class="btn btn-primary" role="button">View Project >></a></p>
							</div>
							<?php
								$i++;
							?>
							<!-- @if($i%4==0)
								<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
							@endif -->
						@endforeach
						</div>
					<div class="col-lg-2"  style="border-left: 1px solid #ccc;">
						<ul class="list-unstyled" style="float: left;">
							<li><a href="/companies/{{ $company->id }}/edit"><i class="fas fa-edit"></i>&nbsp;Edit</a></li>
							<li><a href="/projects/create/{{ $company->id }}"><i class="fas fa-plus" ></i> Add new project</a></li>
							@if($company->user_id == Auth::user()->id || Auth::user()->role_id == 1)
							<li><a href="#" onclick="
							var result = confirm('Are you sure you want to proceed deleting this company?');
							if ( result ) {
								event.preventDefault();
								document.getElementById('delete-form').submit();
							}"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a></li>
							<form id="delete-form" action="{{ route('companies.destroy', [$company->id]) }}" method="POST" style="display: none;">
								<input type="hidden" name="_method" value="delete">
								{{ csrf_field() }}
							</form>
							@endif
						</ul>
					</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
