@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Rokave</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!!Form::open(['route'=>'admin.roles.store'])!!}
                <div class="form-group">
                    {!! Form::label('name','name')!!}
                    {!! Form::text('name',null,['class'=>'form-control'.($errors->has('name') ? ' is-invalid' : ''),'placeholder'=>'Name of Role']) !!}
                </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><strong>Permissions</strong></div>
        <div class="card-body">
            @forelse ($permissions as $permission)
            <div class="d-flex row">
            <label for="permission" >
                {!!Form::checkbox('permissions[]',$permission->id,null,['class'=>'mr-1 grid']) !!}
                {{$permission->name}}
            </label>
            @error('name')
              span.invalid-feed
            @enderror
            </div>
            @empty

            @endforelse
            {!!Form::submit('Create Rol',['class'=>'btn btn-primary mt-2'])!!}
        </div>
    </div>
    {!!Form::close()!!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
