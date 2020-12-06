<?php

namespace App\Http\Livewire;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $nama ,$jumlah_order, $nomor;

    public function mount($id)
    {
        $productDetail = Product::find($id);

        if($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function masukanKeranjang()
    {
        // dd("masuk");
        $this->validate([
            'jumlah_order' => 'required'
        ]);

        //If belum login
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        //hitung harga
        if(!empty($this->nama)) {
            $total_harga = $this->jumlah_order*$this->product->harga + $this->product->harga_namaset;
        }else {
            $total_harga = $this->jumlah_order*$this->product->harga;
        }

        //Ngecek Apakah user punya data pesanan utama yg status nya 0
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Menyimpan / Update Data Pesanan Utama
        if(empty($order))
        {
            Order::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);

            $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
            $order->kode_order = 'DS-'.$order->id;
            $order->update();

        }else {
            $order->total_harga = $order->total_harga + $total_harga;
            $order->update();
        }

        //Meyimpanan Pesanan Detail
        OrderDetail::create([
            'product_id' => $this->product->id,
            'order_id' => $order->id,
            'jumlah_order' => $this->jumlah_order,
            'namaset' => $this->nama ? true : false,
            'nama' => $this->nama,
            'nomor' => $this->nomor,
            'total_harga'=> $total_harga
        ]);

        $this->emit('masukKeranjang');

        session()->flash('message', 'Sukses Masuk Keranjang');

        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.product-detail')
    
        ->extends('layouts.app') // the default is layout('layouts.app')
        ->section('content');
    }
}
