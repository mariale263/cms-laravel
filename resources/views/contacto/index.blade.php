@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('message'))
    <div class="alert alert-success">
      {{ session()->get('message') }}  
    </div><br />
  @endif
  <div class="card-header">
    Listado
  </div>
  <table class="table table-striped table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
    <thead class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <tr>
          <td>ID</td>
          <td>Nombre</td>
          <td>Correo</td>
          <td>Mensaje</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        @foreach($contact as $contacto)
        <tr>
            <td>{{$contacto->id}}</td>
            <td>{{$contacto->name}}</td>
            <td>{{$contacto->email}}</td>
            <td>{{$contacto->message}}</td>
            <td><a href="{{ route('contactos.edit', $contacto->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('contactos.destroy', $contacto->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection