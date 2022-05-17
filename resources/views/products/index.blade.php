@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
           <div class="col-md-9">
           <div class="card">
                <div class="card-header"><h4 style="float:left">Danh sách sản phẩm</h4><a href="#" style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus"></i> Thêm sản phẩm mới</a>
                    <div class="card-body">
                        <table class="table table-bordered table-left">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mô tả</th>
                                    <!-- <th>Số điện thoại</th> -->
                                    <th>Thương hiệu</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái kho</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $key => $product)
                            <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->brand }}</th>
                                    <td>{{ number_format($product->price,2) }}</th>
                                    <td>{{ $product->quantity }}</th>
                                    <td>@if ($product->alert_stock >= $product->quantity) <span class="badge badge-danger">sắp hết : {{ $product->alert_stock }}</span>
                                    @else <span class="badge badge-success"> {{ $product->alert_stock }}</span>
                                    @endif
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editproduct{{ $product->id }}"><i class="fa fa-edit"></i>Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteproduct{{ $product->id }}"><i class="fa fa-trash"></i>Delete</a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Model sửa thông tin sp -->
                                  <!-- model -->

                    <div class="modal right fade" id="editproduct{{ $product->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="staticBackdropLabel">Sửa thông tin sản phẩm</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $product->id }}
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('products.update', $product->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="product_name" id="" value="{{$product->product_name}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Thương hiệu</label>
                                    <input type="text" name="brand" id="" value="{{$product->brand}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea name="description" id="" cols="30" rows="2" class="form-control">{{$product->brand}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Giá</label>
                                    <input type="number" name="price" value="{{$product->price}}" id=""  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Trạng thái kho</label>
                                    <input type="number" name="alert_stock" value="{{$product->alert_stock}}" id=""  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Số lượng</label>
                                    <input type="number" name="quantity" id="" value="{{$product->quantity}}" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-block">Cập nhật thông tin sản phẩm</button>
                                </div>
                            </form>
                            <form action="{{ route('products.store') }}" method="post">
                        </div>

                        </div>
                    </div>
                    </div>

                        <!-- Model xóa thông tin người dùng -->
                                  <!-- model -->

                    <div class="modal right fade" id="deleteproduct{{ $product->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="staticBackdropLabel">Xóa thông tin sản phẩm</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                                <p>Bạn chắc chắn muốn xóa sản phẩm {{ $product->product_name }} ?</p>
                                <div class="modal-footer">
                                    <button class="btn btn-info" data-dismiss="modal">Hủy</button>
                                    <form method="post" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                                    @csrf
                                    @method('delete')

                                        <!-- <button type="submit" class="btn btn-danger">Xóa</button> -->
                                    </form>

                                    <form method="post" action="{{ route('products.destroy', ['product' => $product->id]) }}">
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

                                {{ $products->links() }}

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
           </div>
           <div class="col-md-3">
           <div class="card">
                <div class="card-header"><h4> Tìm kiếm sản phẩm</h4>
                    <div class="card-body">
                        ...........
                        </div>
                        </div>
        </div>
    </div>
</div>
<!-- Modal thêm người dùng -->
<!-- modal -->

<div class="modal right fade" id="addproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Thêm sản phẩm</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('products.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="product_name" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Thương hiệu</label>
                <input type="text" name="brand" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Giá</label>
                <input type="number" name="price" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" name="quantity" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Trạng thái kho</label>
                <input type="number" name="alert_stock" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary btn-block">Thêm sản phẩm</button>
            </div>
          <form action="{{ route('products.store') }}" method="post">

      </div>
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
