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
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
