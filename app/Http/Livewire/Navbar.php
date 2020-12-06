<?php

namespace App\Http\Livewire;

use App\Liga;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $jumlah = 0;

    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang'
    ];

    public function updateKeranjang()
    {
        if(Auth::user()) {
            $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
            if($order) {
                $this->jumlah = OrderDetail::where('order_id', $order->id)->count();
            }else {
                $this->jumlah = 0;
            }
        }
    }


    public function mount()
    {
        if(Auth::user()) {
            $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
            if($order) {
                $this->jumlah = OrderDetail::where('order_id', $order->id)->count();
            }else {
                $this->jumlah = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            'ligas' => Liga::all(),
            'jumlah_order' => $this->jumlah, 
        ]);
    }
}
