@extends('layouts.app')
@section('content')
    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">
      <h2>Create a new Project</h2>
      <!-- Example row of columns -->
      <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">

        <form method="post" action="{{ route('projects.store') }}">
          {{ csrf_field() }} <!--//This protect your application from cross-site request forgery (CSRF) attacks. -->
          <div class="form-group">
            <label for="project-name">Nombre:<span class="required"></span></label>
            <input placeholder="Nombre del Proyecto:"
                   id="project-name"
                   required="true" 
                   name="name"
                   spellcheck="false" 
                   class="form-control">
          </div>
          <div class="form-group">
            <label for="project-content">Descripción:</label>
            <textarea placeholder="Escriba la Descripción"
                   style="resize: vertical;" 
                   id="project-content"
                   name="description"
                   rows="5"
                   spellcheck="False"
                   class="form-control autosize-target text-left">
            </textarea>
          </div>
          <div class="form-group">
            <label for="project-days">Duración:<span class="required"></span></label>
            <input placeholder="Duración"
                   id="project-days"
                   required="true" 
                   name="days"
                   spellcheck="false" 
                   class="form-control">
          </div>
          @if($companies == null)
            <input type="hidden"
                     name="company_id"
                     value={{ $company_id }}>
          @endif
          @if($companies != null)
            <div class="form-group">
              <label for="company_id">Company:<span class="required"></span></label>
              <select class="form-control" id="company_id" name="company_id">
                <option value="X">-- Select Company --</option>
                @foreach($companies as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>
            </div>
          @endif
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
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
          <li><a href="/companies">Ver todas las Compañías</a></li>
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