@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper container">
    <img src="" alt="">
  <div class="card-header">
    Agregar Mensaje
  </div>
  @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
  @endif
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('contactos.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">Correo :</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="price">Mensaje :</label>
              <input type="text" class="form-control" name="message"/>
          </div>
          
          <button type="submit" class="btn btn-info">Crear Mensaje</button>
      </form>
  </div>
</div>
@endsection