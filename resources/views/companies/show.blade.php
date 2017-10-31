@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
      <div class="jumbotron">
        <h1>{{ $company->name }}</h1>
        <p class="lead">{{ $company->description }}</p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>-->
      </div>

      <!-- Example row of columns -->
      <div class="row" style="background: white; margin: 10px;">
        <div class="panel">
          <div class="panel-body">
            <a href="/projects/create/{{ $company->id }}" class="pull-right btn btn-default">Add Project</a>
          </div>
        </div>
        
        @foreach($company->projects as $project)
          <div class="col-lg-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>{{ $project->name }}</h3>
              </div>
              <div class="panel-body">
                <p class="text-justify">{{ $project->description }}</p>
              </div>
              <div class="panel-footer">
                <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
              </div>
            </div>
          </div>
        @endforeach
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
          <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
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
            <form id="delete-form" action="{{ route('companies.destroy', [$company->id]) }}"
              method="POST" style="display: none;">
              <input type="hidden" name="_method" value="delete">
              {{ csrf_field() }}
            </form>
          </li>
          <li><a href="/projects/create/{{ $company->id }}">Add Project</a></li>
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