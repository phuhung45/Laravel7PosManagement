<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Section as SectionModal;
use Illuminate\Http\Request;

class Section extends Component
{
    public $addMore = [1];
    public $count = 0;
    public $section_name, $section_status, $edit_id;
    public $checked = [], $selectAll = false;

// add more

    public function AddMore(){
        $countable = $this->count++;
        if ($countable < 4) {
            $this->addMore[] = count($this->addMore) +1;
        }
    }

// remove more

    public function Remove($index){
        // dd($index);
        $this->count--;
        unset($this->addMore[$index]);
    }

    protected $listeners = ['RecordDeleted'];

    public function store(Request $request){
        // dump($request->all());
        foreach ($this->section_name as $key => $section){
            SectionModal::create([
                    'section_name' => $this->section_name[$key],
                    'status' => $this->section_status[$key] ?? 0

                ]);
                // dd($this->section_status);
        }

        $this->FormReset();
        $this->SwalMessageDialog('Thêm danh mục thành công');

    }

    public function editSection($section_id)
    {
        $this->edit_id = $section_id;
        $section = SectionModal::findOrFail($section_id);
        $this->section_name = $section->section_name;
        $this->section_status = $section->status;
        // dd($section);
    }

    public function update($section_id){
        // dump($request->all());
            SectionModal::updateOrCreate(['id' => $this->edit_id], [
                    'section_name' => $this->section_name,
                    'status' => $this->section_status ?? 0

                ]);
                // dd($this->section_status);

        $this->FormReset();
        $this->SwalMessageDialog('Cập nhật danh mục thành công');

    }

    public function isChecked($section_id){
        return $this->checked && $this->selectAll ? in_array($section_id, $this->checked) : in_array($section_id, $this->checked);
    }

    public function updatedSelectAll($value_in_array){
        $value_in_array ? $this->checked = SectionModal::pluck('id') : $this->checked = [];
    }

    public function confirmBulkDelete(){
        $this->dispatchBrowserEvent('Swal:DeletedRecord', [
            'title' => "Bạn có chắc muốn xóa tất cả danh mục?",
            'id' => $this->checked
        ]);
    }


    //delete dialog show

    public function ConfirmDelete($section_id, $section_name){
        $this->dispatchBrowserEvent('Swal:DeletedRecord', [
            'title' => "Bạn có chắc muốn xóa danh mục <span class='text-danger'> $section_name</span> ?",
            'id' => $section_id
        ]);
    }

    // Delete section

    public function RecordDeleted($section_id){
        if($this->checked){
            SectionModal::whereIn('id', $this->checked)->delete();
            $this->checked = []; $this->selectAll = false;
        } else {
            $section = SectionModal::find($section_id);
            $section->delete();
        }
    }

    public function FormReset(){
        $this->section_name ='';
        $this->section_status ='';
        $this->addMore =[1];

        $this->dispatchBrowserEvent('closeModel');
    }

    public function SwalMessageDialog($message){
        $this->dispatchBrowserEvent('MSGSuccessfull', [
            'title' => $message,
        ]);
    }

    public function render()
    {
        return view('livewire.section', ['sections' => sectionModal::all()]);
    }
}
