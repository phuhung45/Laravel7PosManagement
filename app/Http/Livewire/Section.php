<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Section as SectionModal;
use Illuminate\Http\Request;

class Section extends Component
{
    public $addMore = [1];
    public $count = 0;
    public $section_name, $section_status;

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

    public function store(Request $request){
        dump($request->all());
        foreach ($this->section_name as $key => $section){
            SectionModal::create([
                    'section_name' => $this->section_name[$key],
                    'status' => $this->section_status[$key] ?? 0

                ]);
                //như vậy đang chưa lưu đc status r, vâng đúng rồi a nó ko nhận checkbox đó
                // dd($this->section_status);
        }
    }

    public function render()
    {
        return view('livewire.section');
    }
}
