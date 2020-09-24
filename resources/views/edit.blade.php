@extends('layout')
  <title>Producto | Editar</title>
@section('content')
    <h1 class="h3 mb-2 text-gray-800"><b>Productos</b></h1>
    <p class="mb-4">Tabla productos</a>.</p>
    
   <form class="user" action="{{ route('update', $dato) }}"  method="POST">
   @csrf @method('PATCH')
        <div class="form-group">
          <h1><center>Actualizar producto</center></h1>
          <input type="text" class="form-control form-control-user" name="name" value="{{ old('name', $dato->name) }}" aria-describedby="emailHelp" placeholder="Nombre...">
          {!! $errors->first('name','<small style="color: red;">:message</small>') !!}    
          </div>
          <div class="form-group">
          <input type="text" class="form-control form-control-user" name="description" value="{{ old('description', $dato->description)}}" placeholder="Descripcion...">
          {!! $errors->first('description','<small style="color: red;">:message</small>') !!}
          </div>
          <div class="form-group">
            <label for="tipo">Categoria</label>
            <select name="category" class="form-control" required="">
                  <option value="{{ $dato->idCategory }}">Seleccione</option>
                  @foreach($category as $tipo)
                    <option value="{{ $tipo->id }}" {{ old('category') == $tipo->id ? 'selected' : ''}} >{{ $tipo->category }}</option>
                  @endforeach
            </select>
          {!! $errors->first('category','<small style="color: red;">:message</small>') !!}
           </div>
           <button type="submit" class="btn btn-primary btn-user btn-block">
               Actualizar Producto
           </button>
           <hr>                   
           </form>
           
@endsection