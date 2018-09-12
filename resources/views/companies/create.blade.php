@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-size: 20px;">Add new Company</div>

                <div class="card-body">
                    <form method="POST" action="/companies">
						{{ csrf_field() }}


						<div class="form-group">
							<label for="company-name">Name <span class="required">*</span></label>
							<input placeholder="Enter name" id="company-name" required name="name" spellcheck="false" class="form-control"/>
						</div>

						<div class="form-group">
							<label for="company-content">Description</label>
							<textarea placeholder="Enter a description for the project" style="resize: vertical;" id="company-content" name="description" rows="5" spellcheck="false" class="form-control autosize-target text-left"></textarea>
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
