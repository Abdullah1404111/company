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
                  <img src="/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%;" />
                  <form enctype="multipart/form-data" action="/usersAvatars" method="POST" style="clear: both;">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                  </form>
                 	<p style="clear: both;"><b>Name:</b> {{$user->name}}&nbsp;&nbsp;&nbsp;&nbsp;</p>
                 	<p><b>E-mail:</b> {{$user->email}}
                 	<p><b>Position:</b> @if($user->role_id == 3) 
                	Member
                	@elseif($user->role_id == 1) 
					Admin
					@endif</p>
                </div>
                <div class="card-footer text-center">Copyright &copy;Abdullah Al Hossain(14)</div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
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
                <label for="name">Name:<span class="required"></span></label>
                <input placeholder="Enter name" id="name" name="name" spellcheck="false" class="form-control" value="{{ $user->name }}" />
            </div>

            <div class="form-group">
                <label for="email">Email:<span class="required"></span></label>
                <input placeholder="Enter email" id="email" name="email" spellcheck="false" class="form-control" value="{{ $user->email }}" />
            </div>       

             <!-- <div class="form-group">
                <label for="password">Password:<span class="required"></span></label>
                <input placeholder="Enter password" id="password" name="password" spellcheck="false" class="form-control" value="" />
            </div>     -->
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Reset All Info</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>
@endsection

@else
	<h1 class="text-danger text-center" style="font-size: 450px;">Error!!</h1>
@endif

