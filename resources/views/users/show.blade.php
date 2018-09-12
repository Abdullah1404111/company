@if(Auth::user()->id == $user->id || Auth::user()->role_id == 1)

<style type="text/css">
    p {
      font-size: 18px;
    }

</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" ><i class="fa fa-user text-center" style="font-size: 20px; color: #0069D9;"></i>&nbsp;&nbsp;<h3 style="display: inline;">{{$user->name}}
                </h3>
                 <a data-toggle="modal" data-target="#edit" style="float: right; cursor: pointer; color: #0069D9;">
                  &nbsp;&nbsp;<i class="fas fa-user-edit"></i>&nbsp;Edit info</a>
                  <a data-toggle="modal" data-target="#uploadimage" style="float: right; cursor: pointer; color: #0069D9;">
                   &nbsp;&nbsp;<i class="fas fa-user-edit"></i>&nbsp;Update Image</a>

                @if(Auth::user()->id != $user->id && Auth::user()->role_id == 1)
                    <a style="float: right; cursor: pointer;" href="#" onclick="
                    var result = confirm('Are you sure you want to proceed deleting this User?');
                    if ( result ) {
                      event.preventDefault();
                      document.getElementById('delete-form').submit();
                    }" class="text-danger"><i class="fas fa-trash-alt"></i>&nbsp;Delete ID</a>
                  <form id="delete-form" action="{{ route('users.destroy', [$user->id]) }}" method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                  </form>
                @endif

                </div>
                <div class="card-body">
                  <a data-toggle="modal" data-target="#img" href="#"><img src="/uploads/avatars/{{ $user->avatar }}" style="margin:0 40%; width: 200px; height: 200px; border-radius: 50%;" /></a>
                 	<p><b>First Name:</b> {{$user->first_name}}</p>
                  <p><b>Middle Name:</b> {{$user->middle_name}}</p>
                  <p><b>Last Name:</b> {{$user->last_name}}</p>
                  <p><b>Username:</b> {{$user->name}}</p>
                  <p><b>City:</b> {{$user->city}}</p>
                  <p><b>Mobile No.:</b> {{$user->mobile}}</p>
                 	<p><b>E-mail:</b> {{$user->email}}</p>
                 	<p><b>Position:</b> @if($user->role_id == 3)

                	Member
                	@elseif($user->role_id == 1)
					        Admin
					@endif</p>
                <p>Companies:</p>
                <ol>
                  @foreach($companies as $company)
                    <li>{{ $company->name }}</li>
                  @endforeach
                </ol>

                <p>Projects:</p>
                <ol>
                  @foreach($projects as $project)
                    <li>{{ $project->name }}</li>
                  @endforeach
                </ol>
                </div>
                <div class="card-footer text-center">Copyright &copy;Abdullah Al Hossain(14)</div>
            </div>
        </div>
    </div>
</div>

<!-- Modal For User Info Update-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i>&nbsp;Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('users.update', [$user->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('patch') }}
      <div class="modal-body">
            <div class="form-group">
                <label for="first_name">First Name:<span class="required"></span></label>
                <input placeholder="First Name" id="first_name" name="first_name" spellcheck="false" class="form-control" value="{{ $user->first_name }}" />
            </div>

            <div class="form-group">
                <label for="middle_name">Middle Name:<span class="required"></span></label>
                <input placeholder="Enter name" id="middle_name" name="middle_name" spellcheck="false" class="form-control" value="{{ $user->middle_name }}" />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:<span class="required"></span></label>
                <input placeholder="Enter name" id="last_name" name="last_name" spellcheck="false" class="form-control" value="{{ $user->last_name }}" />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:<span class="required"></span></label>
                <input placeholder="Enter name" id="last_name" name="last_name" spellcheck="false" class="form-control" value="{{ $user->last_name }}" />
            </div>

            <div class="form-group">
                <label for="name">Username:<span class="required"></span></label>
                <input placeholder="Enter City" id="name" name="name" spellcheck="false" class="form-control" value="{{ $user->name }}" />
            </div>

            <div class="form-group">
                <label for="city">City:<span class="required"></span></label>
                <input placeholder="Enter City" id="city" name="city" spellcheck="false" class="form-control" value="{{ $user->city }}" />
            </div>

            <div class="form-group">
                <label for="mobile">Mobile:<span class="required"></span></label>
                <input placeholder="Enter mobile" id="mobile" name="mobile" spellcheck="false" class="form-control" value="{{ $user->mobile }}" />
            </div>

            <div class="form-group">
                <label for="email">Email:<span class="required"></span></label>
                <input placeholder="Enter email" id="email" name="email" spellcheck="false" class="form-control" value="{{ $user->email }}" />
            </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Reset All Info</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Modal For user image upload -->
<div class="modal fade" id="uploadimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i>&nbsp;Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Current Image:
        <img src="/uploads/avatars/{{ $user->avatar }}" style="border-radius: 2%; margin: 0% 10%"/>
        <form enctype="multipart/form-data" action="/usersAvatars" method="POST" style="clear: both;">
        <div class="form-group">
           <label for="password">Update Profile Image:<span class="required"></span></label><br>
             <input type="file" name="avatar">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Reset All Info</button>
        <button type="submit" class="pull-right btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Modal for showing user image -->
<div class="modal fade" id="img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 50px; position: fixed; cursor: pointer; top: 50px; right: 50px;">
      <span aria-hidden="true">&times;</span>
    </button>
        <img style="margin-top: 20%; margin-left: 100px" src="/uploads/avatars/{{ $user->avatar }}" alt="Profile image">
  </div>
</div>
@endsection

@else
	<h1 class="text-danger text-center" style="font-size: 450px;">Error!!</h1>
@endif
