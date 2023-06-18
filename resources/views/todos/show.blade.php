@extends('app')
@section('content')
<div class="container w-25 border p-4">
    <form action="{{ route('todos-update',['id' => $todo->id]) }}" method ="POST">
        @method('PATCH')
        @csrf

        @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('title')
        <!--message var predefinida-->
        <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Actualizar nota</label>
            <input type="text" name="title" class="form-control" id="title" value="{{$todo->title}}" >
            
        </div>
    
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
   
</div>
@endsection