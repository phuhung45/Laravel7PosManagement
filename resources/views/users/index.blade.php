@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12">
        <div class="row">
           <div class="col-md-9">
           <div class="card">
                <div class="card-header"><h4 style="float:left">Danh sách người dùng</h4><a href="#" style="float:right" class="btn btn-dark" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus"></i> Thêm người dùng mới</a>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <!-- <th>Số điện thoại</th> -->
                                    <th>Vai trò</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users AS $key => $user)
                            <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <!-- <th>{{ $user->phone }}</th> -->
                                    <td>@if ($user->is_admin == 1) Admin
                                        @else Nhân viên
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editUser{{ $user->id }}"><i class="fa fa-edit"></i>Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUser{{ $user->id }}"><i class="fa fa-trash"></i>Delete</a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Model sửa thông tin người dùng -->
                                  <!-- model -->

                    <div class="modal right fade" id="editUser{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="staticBackdropLabel">Sửa thông tin người dùng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $user->id }}
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('users.update', $user->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Tên</label>
                                    <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="" value="{{$user->email}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" name="password" readonly value="{{$user->password}}" id=""  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Vai trò</label>
                                    <select name="is_admin" id="" class="form-control">
                                        <option value="1" @if ($user->is_admin == 1) selected
                                            @endif
                                        >Admin</option>
                                        <option value="2" @if ($user->is_admin == 2) selected
                                            @endif>Nhân viên</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning btn-block">Sửa thông tin người dùng</button>
                                </div>
                            </form>
                            <form action="{{ route('users.store') }}" method="post">
                        </div>

                        </div>
                    </div>
                    </div>

                        <!-- Model xóa thông tin người dùng -->
                                  <!-- model -->

                    <div class="modal right fade" id="deleteUser{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="staticBackdropLabel">Xóa thông tin người dùng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <!-- {{ $user->id }} -->
                        </div>
                        <div class="modal-body">

                                <p>Bạn chắc chắn muốn xóa người dùng {{ $user->name }} ?</p>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                                    <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                    @csrf
                                    @method('delete')

                                        <!-- <button type="submit" class="btn btn-danger">Xóa</button> -->
                                    </form>

                                    <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-danger">Xoá</button>
                                        </form>
                                </div>

                        </div>
                        </div>
                    </div>
                    </div>

                                @endforeach
                            </tbody>

                            {{ $users->links() }}

                        </table>
                    </div>
                </div>
            </div>
           </div>
           <div class="col-md-3">
           <div class="card">
                <div class="card-header"><h4> Tìm kiếm người dùng</h4>
                    <div class="card-body">
                        ...........
                        </div>
                        </div>
        </div>
    </div>
</div>
<!-- Modal thêm người dùng -->
<!-- modal -->

<div class="modal right fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Thêm người dùng</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Tên</label>
                <input type="text" name="name" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Xác nhận mật khẩu</label>
                <input type="password" name="confirm-password" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Vai trò</label>
                <select name="is_admin" id="" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">Nhân viên</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-block">Thêm người dùng</button>
            </div>
          <form action="{{ route('users.store') }}" method="post">

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>

<style>
    a.btn.btn-dark {
    margin-bottom: 10px;
}

.modal.right .modal-dialog{
    top: 0;
    right:0;
    margin-right: 20vh;
}

.modal.fade:not(.in).right .modal-dialog{
    -webkit-transform: translate3d(25%, 0, 0);
    transform: translate3d(25%, 0, 0);
}
</style>
@endsection
