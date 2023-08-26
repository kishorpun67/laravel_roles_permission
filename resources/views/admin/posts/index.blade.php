@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Brands</h4>
          <a href="{{route('admin.posts.create')}}" style="width:auto; float:right; display:inline;" class="btn btn-primary btn-block">{{__('Create Post')}}</a>
          <div class="table-responsive pt-3">
            <table id="post" class="table table-bordered">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post['id']}}</td>
                        <td>{{$post['user']['name']}}</td>
                        <td>{{$post['title']}}</td>
                        <td>{{$post['description']}}</td>
                        <td>
                            {{-- @can('edit', $post) --}}
                              <a href="{{route('admin.posts.edit', $post['id'])}}" class="" ><i style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                            {{-- @endcan --}}
                            {{-- @can('delete') --}}
                             <form action="{{route('admin.posts.destroy', $post['id'])}}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn "><i style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></button>
                            </form>
                            {{-- @endcan --}}

                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection