@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Actualizar
  </div>
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
    <form method="post" action="{{ route('contactos.update', $contact->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="name" value="{{ $contact->name }}"/>
          </div>
          <div class="form-group">
              <label for="price">Email :</label>
              <input type="email" class="form-control" name="email" value="{{ $contact->email }}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Mensaje :</label>
              <input type="text" class="form-control" name="message" value="{{ $contact->message }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection