@extends('layouts.app')
<script type="text/javascript">
	function fun(){
		
	}
</script>
@section('content')
<div class="container" style="margin-top: 15px;">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h1>
                	@if(strpos($project->name,"Phone") == true)
                		<i class="fa fa-mobile"></i>
                	@endif
                	{{ $project->name }}</h1></div>

                <div class="card-body">
                   <div>                   	
						
						<p class="lead"> {{ $project->description }}</p>
					</div>
                </div>
            </div>

            
            <div class="card">               
                <div class="card-body">
                @include('partials.comments')
                   <div class="col-lg-12">                   	
						<form method="POST" action="{{ route('comments.store') }}">
							{{ csrf_field() }}

							<input type="hidden" name='commentable_type' value="App\Project">
							<input type="hidden" name='commentable_id' value="{{ $project->id }}">

							<div class="form-group">
								<label for="comment-content">Comment</label>
								<textarea placeholder="Enter comment" 
								style="resize: vertical;" 
								id="comment-content" 
								name="body" 
								rows="3" 
								spellcheck="false" 
								class="form-control autosize-target text-left">
									
								</textarea>
							</div>

							<div class="form-group">
								<label for="comment-proof">Proof of work done(Url/Photos)</label>
								<textarea placeholder="Enter url or screenshot" 
								style="resize: vertical;" 
								id="comment-proof" 
								name="url"
								rows="2" 
								spellcheck="false" 
								class="form-control autosize-target text-left">
									
								</textarea>
							</div>


							<div class="form-group">
								<input type="submit" value="Comment" class="btn btn-primary">
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
        	<h4>Actions</h4>
        	<ul class="list-unstyled">
			<li><a href="/projects/{{ $project->id }}/edit"><i class="fas fa-edit"></i>&nbsp;Edit</a></li>
			<li><a href="/projects"><i class="fas fa-briefcase"></i>&nbsp;My projects</a></li>

			@if($project->user_id == Auth::user()->id || Auth::user()->role_id == 1)
				<li><a href="#" onclick="
				var result = confirm('Are you sure you want to proceed deleting this project?');
				if ( result ) {
					event.preventDefault();
					document.getElementById('delete-form').submit();
				}"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a></li>
				<form id="delete-form" action="{{ route('projects.destroy', [$project->id]) }}" method="POST" style="display: none;">
					<input type="hidden" name="_method" value="delete">
					{{ csrf_field() }}
				</form>
			@endif 
			</ul>
			<hr>
			<h4>Add members</h4>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<form id="add-user" action="{{ route('projects.adduser') }}" method="POST">
					<div class="input-group">
						<input type="hidden" class="form-control" value="{{ $project->id }}" name="project_id">
						<input type="text" class="form-control" placeholder="Email . . ." name="email">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Add!</button>
						</span>
					</div>
					</form>
				</div>
			</div>
			<br/>
			<h4>Team Members</h4>
			<ol class="list-unstyled">
				<li><a href="#">Abdullah Al Hossain</a></li>
				<li><a href="#">Jamshed Hossain</a></li>
				<li><a href="#">Anwar Hossain</a></li>
				
			</ol>
        </div>
    </div>
</div>	
@endsection