@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
      <div class="well well-lg">
        <h1>{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>-->
      </div>

      <!-- Example row of columns -->
      <div class="row" style="background: white; margin: 10px;">
        <div class="panel">
          <div class="panel-body">
  	        <a href="/projects/create/{{ $project->company_id }}" class="pull-right btn btn-default">Add Project</a>
       	  </div>
      	</div>

        <div class="panel">
          <div class="panel-body">
	        <form method="post" action="{{ route('comments.store') }}">
	          {{ csrf_field() }} <!--//This protect your application from cross-site request forgery (CSRF) attacks. -->

	          <input type="hidden" name="commentable_type" value="App\Project">
	          <input type="hidden" name="commentable_id" value="{{ $project->id }}">
	          <div class="form-group">
	            <label for="comment-content">Comment:</label>
	            <textarea placeholder="Enter the comment"
	                   style="resize: vertical;" 
	                   id="comment-content"
	                   name="body"
	                   rows="3"
	                   spellcheck="False"
	                   class="form-control autosize-target text-left">
	            </textarea>
	          </div>
	          <div class="form-group">
	            <label for="comment-url">Proof of wrok done (URL/Photos):</label>
	            <textarea placeholder="Enter URL or Screenshots"
	                   style="resize: vertical;" 
	                   id="comment-url"
	                   name="url"
	                   rows="2"
	                   spellcheck="False"
	                   class="form-control autosize-target text-left">
	            </textarea>
	          </div>
	          <button type="submit" class="btn btn-primary">Enviar</button>
	        </form>      	
       	  </div>
      	</div>

        <div class="panel">
          <div class="panel-body">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
		            <!-- Fluid width widget -->        
		    	    <div class="panel panel-default">
		                <div class="panel-heading">
		                    <h3 class="panel-title">
		                        <span class="glyphicon glyphicon-comment"></span> 
		                        Recent Comments
		                    </h3>
		                </div>
		                <div class="panel-body">
		                    <ul class="media-list">
		                    	@foreach($project->comments as $comment)
		                        <li class="media">
		                            <div class="media-left">
		                                <img src="http://placehold.it/60x60" class="img-circle">
		                            </div>
		                            <div class="media-body">
		                                <h4 class="media-heading">
		                                    {{ $comment->user->name }}
		                                    <br>
		                                    <small>
		                                        commented on <a href="#">{{ $comment->created_at }}</a>
		                                    </small>
		                                </h4>
		                                <p>
		                                    {{ $comment->body }}
		                                </p>
		                                Proof:
		                                <a href="{{ $comment->url }}">{{ $comment->url }}</a>
		                            </div>
		                        </li>
		                        @endforeach
		                    </ul>
		                </div>
		            </div>
		            <!-- End fluid width widget -->
				</div>
			</div>
		  </div>
      	</div>
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>© 2016 Company, Inc.</p>
      </footer>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
      <!--<div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>-->
      <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
          <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
          <li>
            <a href=""
               onclick="
                  var result = confirm('Estas seguro que deseas eliminar esta registro?');
                  if(result){
                    event.preventDefault();
                    document.getElementById('delete-form').submit();
                  }
               "
              >
              Delete
            </a>
            <form id="delete-form" action="{{ route('projects.destroy', [$project->id]) }}"
              method="POST" style="display: none;">
              <input type="hidden" name="_method" value="delete">
              {{ csrf_field() }}
            </form>
          </li>
          <li><a href="/projects/create/{{ $project->company_id }}">Add Project</a></li>
        </ol>
      </div>
      <!--<div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">
          <li><a href="#">March 2014</a></li>
        </ol>
      </div>-->
    </div>
@endsection