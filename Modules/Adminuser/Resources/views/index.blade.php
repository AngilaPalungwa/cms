@extends('backend.layouts.master')
@section('Title','User Setting')
@section('content')

@if(session()->has('success'))
    <div class="alert-success"> {{ session('success') }}</div>
@endif

@if(session()->has('error'))
    <div class="alert-danger"> {{ session('error') }}</div>
@endif
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form class="form"  method="post" action="{{ route('user.password.reset') }}">
                  @csrf
                  <input type="hidden" id="resetId" value="" name="id">
                  <input type="password" name="password" class="form-control">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<a class="btn btn-primary" href="{{ route('users.create') }}"> Create New</a>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <form action="{{ route('users.index') }}" method="GET">
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="tag tag-success">{{ $user->username }}</span></td>
                                <td>{{ $user->status }}</td>
                                <td><a href="{{ route('users.edit', $user->id) }}"  class="btn btn-primary">Edit </a> <a href="#" class="btn btn-primary resetBtn" data-user-id="{{ $user->id }}">Reset Password </a><a href="" class="btn btn-danger">Delete</a> </td>
                            </tr>
                        @empty
                            <tr><td>NO Users</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

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

