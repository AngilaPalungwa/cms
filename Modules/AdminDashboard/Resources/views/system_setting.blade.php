@extends('backend.layouts.master')
@section('title','System Setting')
@section('content')


    <form role="form" action="" method="" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Password" name="name">
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="number" class="form-control" id="name" placeholder="Password" name="phone">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Logo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
