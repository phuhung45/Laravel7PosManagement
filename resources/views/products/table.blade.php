<table class="table table-bordered table-left">
                    <div>
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
                                    <td style="cursor: pointer;" data-toggle="tooltip" data-placement="right" title="click để show thông tin sản phẩm" wire:click="ProductsDetails({{ $product->id }})">{{ $product->product_name }}</td>
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
                            </div>
                                <!-- Model sửa thông tin sp -->
                                  <!-- model -->

                                @include('products.edit')

                        <!-- Model xóa thông tin người dùng -->
                                  <!-- model -->

                    @include('products.delete')

                                @endforeach

                                {{-- {{ $products->links() }} --}}

                            </tbody>
                    </table>
