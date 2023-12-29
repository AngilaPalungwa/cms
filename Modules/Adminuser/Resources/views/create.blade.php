@extends('backend.layouts.master')
@section('Title','User Setting')
@section('content')

    <form role="form" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="">
                @if($errors->first('email'))
                    <span style="color: red">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="">
                @if($errors->first('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="number" class="form-control" id="name" placeholder="Phone" name="mobile" value="">
                @if($errors->first('mobile'))
                    <span style="color: red">{{ $errors->first('mobile') }}</span>
                @endif


            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" placeholder="Username" name="username" value="">
                @if($errors->first('username'))
                    <span style="color: red">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Address</label>
                <input type="text" class="form-control" id="name" placeholder="Address" name="address" value="">
                @if($errors->first('address'))
                    <span style="color: red">{{ $errors->first('address') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Designation</label>
                <input type="text" class="form-control" id="name" placeholder="Designation" name="designation" value="">
                @if($errors->first('designation'))
                    <span style="color: red">{{ $errors->first('designation') }}</span>
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
                <label for="exampleInputFile">profile</label>
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


@endsection

