@extends('backend.layouts.master')
@section('title', 'Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header ">
                    <span class="fs-4 fw-bold"> Category</span>
                </div>
                <div class="card-body">

                    <form action="{{ route('category.store') }}" , method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter your name" value="">
                            @if ($errors->first('name'))
                                <span style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-info">Add Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
