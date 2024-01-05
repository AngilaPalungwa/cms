@extends('backend.layouts.master')
@section('Title','Post Setting')
@section('content')

    <form role="form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Category</label>
            <select class="form-control" name="category_id">
              @forelse($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }} </option>
                @empty
                  <option> --No categories--</option>
              @endforelse
            </select>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}">
                @if($errors->first('title'))
                    <span style="color: red">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea id="editor" name="description">{{ old('description') }}</textarea>
                @if($errors->first('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">In-Active</option>
                </select>
                @if($errors->first('status'))
                    <span style="color: red">{{ $errors->first('status') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Featured Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="profile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor'
        });
    </script>
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#editor' ) )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}



@endsection

