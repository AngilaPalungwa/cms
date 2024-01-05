@extends('backend.layouts.master')
@section('Title','Category')
@section('content')

    @if(session()->has('success'))
        <div class="alert-success"> {{ session('success') }}</div>
    @endif

    @if(session()->has('error'))
        <div class="alert-danger"> {{ session('error') }}</div>
    @endif
    <a class="btn btn-primary" href="{{ route('posts.create') }}"> Create New</a>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <form action="{{ route('posts') }}" method="GET">
                                @csrf
                                <input type="text" name="search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th>description</th>
                            <th>status</th>
                            <th>featured Image</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{!! $post->description !!}  </td>
                                <td>{{ $post->status }}</td>
                                <td>{{ $post->status }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td><a href="{{ route('users.edit', $post->id) }}"  class="btn btn-primary">Edit </a> <a href="{{ route('users.edit', $post->id) }}" class="btn btn-danger">Delete</a> </td>
                            </tr>
                        @empty
                            <tr><td>NO POST</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        {{ $posts->links() }}
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>

        $(document).ready( function (){
            $('.resetBtn').click( function () {
                var id  = $(this).data('user-id');
                if(id ==''){
                    return false;
                }
                $('#resetId').val(id);
                $('#exampleModalCenter').modal('show');

            });
        });
    </script>
@endsection

