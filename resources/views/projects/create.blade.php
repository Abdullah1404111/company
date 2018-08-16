@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-size: 20px;">Add new project</div>

                <div class="card-body">
                    <form method="POST" action="/projects">
						{{ csrf_field() }}
		

						<div class="form-group">
							<label for="project-name">Name <span class="required">*</span></label>
							<input placeholder="Enter name" id="project-name" required name="name" spellcheck="false" class="form-control"/>
							@if($companies == null)
								<input class="form-control" type="hidden" name="company_id" value="{{ $company_id}}">
							@endif
						</div>

						@if($companies != null)
							<div class="form-group">
								<label for="project-content">Select Company<span class="required">*</span></label>
								<select name="company_id" class="form-control">
									@foreach($companies as $company)
										<option value="{{ $company->id }}"> {{ $company->name }}</option>
									@endforeach
								</select>
							</div>
						@endif
                
						<div class="form-group">
							<label for="project-content">Description</label>
							<textarea placeholder="Enter a description for the project" style="resize: vertical;" id="project-content" name="description" rows="5" spellcheck="false" class="form-control autosize-target text-left"></textarea>
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