<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Transaction;

class transactions extends Component
{
    public $transactions_details = [];
    public function count(){

    }

    public function TransactionsDetails($id){
          $this->transactions_details = Transaction::where('id', $id)->get();
    //    dd($count);
    }

    public function render()
    {
        return view('livewire.transactions', ['transactions'=> Transactions::all()]);
    }
}
