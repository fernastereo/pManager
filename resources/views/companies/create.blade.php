@extends('layouts.app')

@section('content')
    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">
      <h2>Create a new company</h2>
      <!-- Example row of columns -->
      <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">

        <form method="post" action="{{ route('companies.store') }}">
          {{ csrf_field() }} <!--//This protect your application from cross-site request forgery (CSRF) attacks. -->
          <div class="form-group">
            <label for="company-name">Nombre:<span class="required"></span></label>
            <input placeholder="Nombre de la Compañía"
                   id="company-name"
                   required="true" 
                   name="name"
                   spellcheck="false" 
                   class="form-control">
          </div>
          <div class="form-group">
            <label for="company-content">Descripción:</label>
            <textarea placeholder="Escriba la Descripción"
                   style="resize: vertical;" 
                   id="company-content"
                   name="description"
                   rows="5"
                   spellcheck="False"
                   class="form-control autosize-target text-left">
            </textarea>
          </div>
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