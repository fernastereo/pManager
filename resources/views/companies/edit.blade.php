@extends('layouts.app')

@section('content')
    <div class="col-md-12 col-lg-12 col-sm-12 pull-left">
      <!-- Example row of columns -->
      <div class="row" style="background: white; margin: 10px;">

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
          <li><a href="#">Delete</a></li>
          <li><a href="#">Add New Member</a></li>
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