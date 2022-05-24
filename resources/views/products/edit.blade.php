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
                            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="product_name" id="" value="{{$product->product_name}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Mã sản phẩm</label>
                                    <input type="text" name="product_code" id="" value="{{$product->product_code}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Thương hiệu</label>
                                    <input type="text" name="brand" id="" value="{{$product->brand}}" class="form-control">
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

                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea name="description" id="" cols="30" rows="2" class="form-control">{{$product->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Hình ảnh</label>
                                    <img src="{{ asset('product/images/' .$product->product_image) }}" alt="" width="100px">
                                    <br>
                                    <br>
                                    <input width="40" type="file"name="product_image" id="" class="form-control">
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
