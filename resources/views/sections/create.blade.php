<div class="modal fade" id="addSection" wire:ignore.self data-backdrop="static">
    <div class="modal-dialog right-crud modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="title">Thêm danh mục mới</h3>
                    <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form wire:submit.prevent="store" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @forelse ($addMore as $more)

                <div class="form-row">
                    <div class="col">
                        <label for="">Tên danh mục</label>
                        <input type="text" wire:model="section_name.{{ $more }}" class="form-control" autocomplete="off">
                        @error('section_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-1" data-toggle="tooltip" data-placement="top" title="status">
                        <label class="switch" style="margin-top: 2.2em !important;">
                            <input type="checkbox" wire:model="section_status.{{ $more }}">
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="col-sm-1">
                        <button class="btn btn-success btn-sm" style="margin-top: 35px !important" wire:ignore wire:click.prevent="AddMore">
                        <i class="fa fa-plus"></i>
                        </button>

                        @if($loop->index > 0)

                        <button class="btn btn-danger btn-sm" wire:ignore wire:click.prevent="Remove({{ $loop->index }})">
                        <i class="fa fa-minus"></i>
                        </button>

                        @endif
                    </div>
                </div>

                @empty

                @endforelse
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Thêm danh mục</button>
                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Đóng</button>

                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<style>
    .switch{
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider{
        position:absolute;
        cursor: pointer;
        top: 0;
        left: -25px;
        right: 25px;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        margin-right: -30px;
        margin-left: 25px;
    }

    .slider::before{
        position: absolute;
        content: '';
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: #fff;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider{
        background-color: #2196F3;
    }

    input:focus+.slider{
        box-shadow: 0 01px #2196F3;
    }

    input:checked+.slider:before{
        -webkit-transform: translateX(26px);
        -ms-transform: translate(26px);
        transform: translate(26px);
    }

    .slider.round{
        border-radius:34px;
    }

    .slider.round::before{
        border-radius:50%;
    }

    input#section_name {
    width: 90%;
    }

    button.btn-danger.btn-sm {
        height: 30px;
        margin-top: 35px;
        margin-left: 2px;
    }

    .modal-content {
        width: 150%;
        margin-left: -26%;
    }

    input#section_name {
        width: 87%;
    }

    .col-sm-1 {
        display: flex;
        margin-right: 15px;
    }

    button.btn-success.btn-sm {
        height: 30px;
    }


</style>
