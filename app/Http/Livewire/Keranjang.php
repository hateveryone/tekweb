<?php

namespace App\Http\Livewire;

use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Keranjang extends Component
{
    protected $order;
    protected $order_details = [];

    // hapus item
    public function destroy($id)
    {
        $order_detail = OrderDetail::find($id);
        if(!empty($order_detail)) {
            
            $order = Order::where('id', $order_detail->order_id)->first();
            $jumlah_order_detail = OrderDetail::where('order_id', $order->id)->count();
            if($jumlah_order_detail == 1) 
            {
                $order->delete();
            }else {
                $order->total_harga = $order->total_harga-$order_detail->total_harga;
                $order->update();
            }
 
            $order_detail->delete();
        }
        
        //update angka kerjangan
        $this->emit('masukKeranjang');
 
        session()->flash('message', 'Pesanan Dihapus');
    }


    public function render()
    {
        if(Auth::user()) {
            $this->order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
            if($this->order)
            {
                $this->order_details = OrderDetail::where('order_id', $this->order->id)->get();
            }
        }

        return view('livewire.keranjang',[
            'order' => $this->order,
            'order_details' => $this->order_details
        ])
        ->extends('layouts.app') // the default is layout('layouts.app')
        ->section('content');
    }
}