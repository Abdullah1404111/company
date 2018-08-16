<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
    
        <!-- Fluid width widget -->        
	    <div class="card panel-default">
            <div class="card-header bg-primary text-white">               
                <span class="glyphicon glyphicon-comment"></span> 
                <i class="fas fa-comments" style="font-size: 25px;"></i> &nbsp;&nbsp;<b>Recent Comments </b>               
            </div>
            <div class="card-body">
                <ul class="media-list">
                	@foreach($comments as $comment)
                    <li class="media">
                        <div class="media-left">
                            <img src="/uploads/avatars/{{$comment->user->avatar }}" class="rounded-circle" style="width: 52px; height: 52px; top: 5px; left: 0px;" />
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                
                                
                                <small>
                                	<a href="users/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
                                	<br>
                                    {{ $comment->created_at->diffForHumans() }}
                                </small>
                            </h4>
                            <p>
                                {{ $comment->body }}
                            </p>
                            <b>Proof: </b>
                            <p>
                            	{{ $comment->url }}
                            </p>
                        </div>
                    </li>
                    <hr />
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- End fluid width widget --> 
        
	</div>
</div>