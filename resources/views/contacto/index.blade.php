@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper container">
  @if(session()->get('message'))
    <div class="alert alert-success">
      {{ session()->get('message') }}  
    </div><br />
  @endif
  <div class="card-header">
    Listado
  </div>

  <div class="table-responsive">
    <table class="table table-striped ">
            <thead>
                <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Correo</td>
                <td>Mensaje</td>
                <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($contact as $contacto)
                <tr>
                    <td>{{$contacto->id}}</td>
                    <td>{{$contacto->name}}</td>
                    <td>{{$contacto->email}}</td>
                    <td>{{$contacto->message}}</td>
                    <td><a href="{{ route('contactos.edit', $contacto->id)}}" class="btn btn-primary fa fa-edit"></a></td>
                    <td>
                        <form action="{{ route('contactos.destroy', $contacto->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger fa fa-trash" type="submit"></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
    
<div>
@endsection