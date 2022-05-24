<div class="col-lg-12">
        <div class="row">
           <div class="col-md-8">
           <div class="card">

                <div class="card-header"><h4 style="float:left">Danh sách đơn hàng</h4><a href="#" style="float:right" class="btn btn-dark" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus"></i> Thêm sản phẩm mới</a>
                </div>
                <div class="my-2">
                    <form wire:submit.prevent="InsertoCart">
                    @csrf
                    <input type="text" name="" wire:model="product_name" id="" class="form-control" placeholder="Nhập mã sản phẩm">
                    </form>
                    </div>
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                <div class="card-body">

                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                    @elseif(session()->has('info'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-info">{{ session('info') }}</div>
                    @elseif(session()->has('info'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                </form>
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <!-- <th>Số điện thoại</th> -->
                                    <th>Giá</th>
                                    {{-- <th>Giảm giá (%)</th> --}}
                                    <th colspan="6">Thành tiền</th>
                                    <!-- <th><a href="#" class="btn btn-sm btn-success rounded-circle add_more"><i class="fa fa-plus-circle"></i></a></th> -->
                                </tr>
                            </thead>
                            <tbody class="addMoreProduct">
                            <form action="{{ route('orders.store') }}" method="POST">
                            @csrf

                                @foreach ($productInCart as $key=> $cart)
                                <tr>
                                    <td class="no">{{ $key +1 }}</td>
                                    <td width ="30%">
                                        <input type="text" class="form-control"
                                        value="{{ $cart->product->product_name }}">
                                    </td>

                                    <td width="15%">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button wire:click.prevent="DecrementQty({{ $cart->id }})" class="btn-sm btn-danger">-</button>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="" >{{ $cart->product_qty }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <button wire:click.prevent="IncrementQty({{ $cart->id }})" class="btn-sm btn-success">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" value="{{ $cart->product->price }}">
                                    </td>
                                    {{-- <td>
                                        <input type="number" class="form-control">
                                    </td> --}}
                                    <td>
                                        <input type="number" class="form-control" value="{{ $cart->product_qty * $cart->product->price }}">
                                    </td>
                                    <td><a href="#" class="btn btn-sm btn-danger delete rounded-circle"><i class="fa fa-times" wire:click="removeProduct({{ $cart->id }})"></i></a></td>
                                </tr>

                                @endforeach
                                </form>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

            <div class="col-md-4">
            <div class="card">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                                @foreach ($productInCart as $key=> $cart)
                                        <input type="hidden" name="product_id[]" class="form-control" value="{{ $cart->product->id }}">
                                        <input type="hidden" name="quantity[]" value="{{ $cart->product_qty }}">
                                        <input type="hidden" name="price[]" class="form-control price" value="{{ $cart->product->price }}">
                                        <input type="hidden" name="discount[]" class="form-control discount">
                                        <input type="hidden" name="total_amount[]" class="form-control total_amount" value="{{ $cart->product_qty * $cart->product->price }}">
                                @endforeach

                <div class="card-header"><h4> Tổng tiền <b class="total"> {{ $productInCart->sum('product_price') }}</b></h4>
                    <div class="card-body">
                        <div class="panel">
                            <div class="row">
                            <div class="btn-group">
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-dark"><i class="fa fa-print"></i>Print</button>
                            </div>

                            <div class="btn-group">
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-primary"><i class="fa fa-print"></i>History</button>
                            </div>

                            <div class="btn-group">
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-danger"><i class="fa fa-print"></i>Report</button>
                            </div>
                                <table class="table table-striped">
                                    <tr>
                                        <td>
                                        <label for="">Tên khách hàng</label>
                                        <input type="text" name="customer_name" id="" class="form-control">
                                        </td>
                                        <td>
                                        <label for="">Số điện thoại</label>
                                        <input type="number" name="customer_phone" id="" class="form-control">
                                        </td>
                                    </tr>
                                </table>
                                <td>Phương thức thanh toán <br>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true" value="cash" checked="checked">
                                        <label for="payment_method"><i class="fa fa-money-bill" text-success></i> Tiền mặt </label>
                                    </span>

                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true" value="bank-transfer">
                                        <label for="payment_method"><i class="fa fa-university" text-danger></i> Thẻ ngân hàng </label>
                                    </span>

                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true" value="credit card"">
                                        <label for="payment_method"><i class="fa fa-credit-card" text-info></i> Thẻ tín dụng </label>
                                    </span>
                            </td>
                            </div>
                            <td>
                                Thanh toán
                                <input type="number" wire:modal="pay_money" name="paid_amount" id="paid_amount" class="form-control paid_amount">
                            </td>

                            <td>
                                Tiền thừa
                                <input type="number" wire:modal="balance" readonly name="balance" id="balance" class="form-control balance">
                            </td>

                            <td>
                                <button class="btn-primary btn-lg btn-block mt-5">Lưu</button>
                            </td>

                            <td>
                                <button class="btn-danger btn-lg btn-block mt-2">Tính tiền</button>
                            </td>
                        </div>

                    </div>
                </form>
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
            </form>
      </div>
    </div>
  </div>
</div>
