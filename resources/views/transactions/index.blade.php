<table class="table table-bordered table-left">
                    <div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã hóa đơn</th>
                                    <th>Khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Tiền thừa</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($getAllTrans as $key => $trans)
                            <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $trans->order_id }}</td>
                                    <td style="cursor: pointer;" data-toggle="tooltip" data-placement="right" title="click để show thông tin sản phẩm" wire:click="ProductsDetails({{ $trans->order_id }})">{{ $trans->name }}</td>
                                    <td>{{ $trans->phone }}</td>
                                    <td>{{ $trans->product_name }}</th>
                                    <td>{{ $trans->amount }}</th>
                                    <td>{{ $trans->unitprice }}</th>
                                    <td>{{ $trans->paid_amount - $trans->balance }}</th>
                                    <td>{{ $trans->paid_amount }}</th>
                                    <td>{{ $trans->balance }}</th>
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editproduct{{ $trans->order_id }}"><i class="fa fa-edit"></i>Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProduct{{ $trans->order_id }}"><i class="fa fa-trash"></i>Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            </div>
                                <!-- Model sửa thông tin sp -->
                                  <!-- model -->

                                {{-- @include('products.edit') --}}

                        <!-- Model xóa thông tin người dùng -->
                                  <!-- model -->

                    {{-- @include('products.delete') --}}

                                @endforeach

                                {{-- {{ $products->links() }} --}}

                            </tbody>
                    </table>
