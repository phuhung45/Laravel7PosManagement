@extends('layouts.app')

@section('content')
@livewire('products')

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
          <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="product_name" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Mã sản phẩm</label>
                <input type="text" name="product_code" id="" class="form-control">
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

            <div class="form-group">
                <label for="">Hình ảnh</label>
                <input type ="file" name="product_image" id="product_image" cols="30" rows="2" class="form-control">
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
