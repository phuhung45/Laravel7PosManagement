<div class="col-md-4 col-sm-4">
    @if (count($checked) >= 1)
        <a href="#" class="btn btn-outline btn-sm" wire:click.prevent="confirmBulkDelete">
        (<b>{{count($checked)}}</b> mục đã chọn để <b>XÓA</b>)
        </a>
    @endif
</div>

<table class="table text-left" width="100%">
    <thead>
        <tr>
            <th><input class="h-5 w-5" type="checkbox" wire:model="selectAll"></th>
            <th>Tên danh mục</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($sections as $section)
            <tr class="">
                <td><input value="{{ $section->id }}" wire:model="checked" class="h-5 w-5" type="checkbox"></td>
                <td>{{ $section->section_name }}</td>
                <td>{{ $section->status == 1 ? 'Hoạt động' : 'Vô hiệu hóa' }}</td>
                <td>
                    <div class="btn-group">
                        <a href="#editSection" data-toggle="modal" wire:click.prevent="editSection({{ $section->id }})" class="btn btn-outline-info btn-rounder"><i class="fa fa-edit"></i></a>
                        @if (count($checked) <2)
                        <a href="#" wire:click.prevent="ConfirmDelete({{ $section->id }}, '{{ $section->section_name }}')" class="btn btn-outline-danger btn-rounder"><i class="fa fa-trash"></i></a>
                        @endif
                    </div>
                </td>
            </tr>
            @include('sections.edit')
        @empty

        @endforelse

    </tbody>
</table>
