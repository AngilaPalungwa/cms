@extends('backend.layouts.master')
@section('Title','Category')
@section('content')

    @if(session()->has('success'))
        <div class="alert-success"> {{ session('success') }}</div>
    @endif

    @if(session()->has('error'))
        <div class="alert-danger"> {{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('posts') }}">

                        <h3 class="card-title fw-bold text-dark">Posts</h3>
                    </a>

                    <div class="card-tools">
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-sm m-1" style="width: 200px;">
                                    <form action="{{ route('posts') }}" method="GET">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="search" class="form-control float-right" placeholder="Search" >
                                            </div>
                                            <div class="col input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="col">
                                <a href="{{ route('posts.create') }}" class="float-end btn btn-info"><i
                                        class="fas fa-plus"></i><span class="hide-menu ps-2">Create New Post </span></a>
                            </div>
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
                                <td>
                                    <a href="{{ route('post.edit', $post->id) }} " class="btn btn-success">Edit</a>
                                    <a href="{{ route('post.delete', $post->id) }} " class="btn btn-danger">Delete</a>

                                </td>
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

