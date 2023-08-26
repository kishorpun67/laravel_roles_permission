@extends('admin.layouts.app')
@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{__('Add Post')}}</h4>
        <form class="forms-sample" method="POST"  action="{{route('admin.posts.store')}}">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="" placeholder="Title" name="title" value={{ old('title')}}>
            @error('title')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description"  class="form-control">{{old('description')}}</textarea>
            @error('title')
              <p  style="color: red">{{$message}}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">{{__('Add')}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection