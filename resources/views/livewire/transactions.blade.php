<div class="container">
    <div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
           <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header"><h4 style="float:left">Danh sách hóa đơn</h4><a href="#" style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus"></i> Thêm sản phẩm mới</a> --}}
                        <div class="card-body">
                            @include('transactions.index')
                        </div>
                    </div>
                </div>
            </div>
           <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Chi tiết sản phẩm</h4>
                    </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

