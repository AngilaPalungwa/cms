@extends('backend.layouts.master')
@section('title','System Setting')
@section('content')


    <form role="form" action="{{ route('system.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{  \App\Utils\SettingUtils::get('system_email') }}">
                @if($errors->first('email'))
                    <span style="color: red">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{  \App\Utils\SettingUtils::get('system_name') }}">
                @if($errors->first('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="number" class="form-control" id="name" placeholder="Phone" name="phone" value="{{  \App\Utils\SettingUtils::get('system_phone') }}">
                @if($errors->first('phone'))
                    <span style="color: red">{{ $errors->first('phone') }}</span>
                @endif


            </div>
            <div class="form-group">
                <label for="name">Footer</label>
                <input type="text" class="form-control" id="name" placeholder="Footer" name="footer" value="{{  \App\Utils\SettingUtils::get('system_footer') }}">
                @if($errors->first('footer'))
                    <span style="color: red">{{ $errors->first('footer') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Logo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="logo">
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
