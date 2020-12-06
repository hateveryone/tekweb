<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    //tanpa reload page banyak
    use WithPagination;

    //search
    public $search;

    protected $QueryString = ['search'];

    //reset search apabila page banyak
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //------
    public function render()
    {
        if($this->search) {
            $products = Product::where('nama', 'like', '%'.$this->search.'%')->paginate(8);
        }else {
            $products = Product::paginate(8);
        }
        
        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'List Jersey'
        ])
        ->extends('layouts.app') // the default is layout('layouts.app')
        ->section('content');
    }
}
