@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Channel Settings</div>

                <div class="panel-body">
                  <form action="/channel/{{ $channel->slug }}/edit" method="post">


                    <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                      <label for="name">name</label>
                      <input type="text" name="name" value="{{old('name') ? old('name') : $channel->name }}" class="form-control">

                      @if ($errors->has('name'))
                        <div class="help-block">
                          {{$errors->first('name')}}
                        </div>
                      @endif
                    </div>


                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : ''}}">
                      <label for="name">Unique URL</label>
                      <div class="input-group">
                        <div class="input-group-addon">{{config('app.url')}}/channel/</div>
                        <input type="text" name="slug" value="{{old('slug') ? old('slug') : $channel->slug }}" class="form-control">
                      </div>


                      @if ($errors->has('slug'))
                        <div class="help-block">
                          {{$errors->first('slug')}}
                        </div>
                      @endif

                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                      <label for="description">description</label>
                      <textarea type="text" name="description" class="form-control">{{old('description') ? old('description') : $channel->description }}</textarea>

                      @if ($errors->has('description'))
                        <div class="help-block">
                          {{$errors->first('description')}}
                        </div>
                      @endif
                    </div>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <button type="submit" name="button" class="btn btn-success">Update</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
