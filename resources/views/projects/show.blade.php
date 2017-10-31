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

       	  @foreach($project->comments as $comment)
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h2>{{ $comment->body }}</h2>
				<p class="text-justify">{{ $comment->url }}</p>
				<p><a href="/projects/{{ $project->id }}" class="btn btn-primary" role="button">View Project</a></p>
			</div>
       	  @endforeach
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