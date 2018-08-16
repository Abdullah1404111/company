@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Your project</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('projects.update', [$project->id]) }}">
						{{ csrf_field() }}
						<input type="hidden" name='_method' value="put">

						<div class="form-group">
							<label for="project-name">Name <span class="required">*</span></label>
							<input placeholder="Enter name" id="project-name" required name="name" spellcheck="false" class="form-control" value="{{ $project->name }}" />
							
						</div>

						<div class="form-group">
							<label for="project-content">Description</label>
							<textarea placeholder="Enter a description for the project" style="resize: vertical;" id="project-content" name="description" rows="5" spellcheck="false" class="form-control autosize-target text-left">{{ $project->description }}</textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-primary">
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection