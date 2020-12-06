<div class="container">
    <!-- auto refresh -->
    <script type='text/javascript'>
        (function() {
            if (window.localStorage) {
                if (!localStorage.getItem('firstLoad')) {
                    localStorage['firstLoad'] = true;
                    window.location.reload();
                } else
                    localStorage.removeItem('firstLoad');
            }
        })();
    </script>

    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td>Name Set</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td><strong>Total Harga</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($order_details as $order_detail)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ url('assets/jersey') }}/{{ $order_detail->product->gambar }}" class="img-fluid" width="200">
                            </td>

                            <td>
                                {{ $order_detail->product->nama }}
                            </td>
                            <td>
                                @if($order_detail->namaset)
                                Nama : {{ $order_detail->nama }} <br>
                                Nomor : {{ $order_detail->nomor }}
                                @else
                                -
                                @endif
                            </td>
                            <td>{{ $order_detail->jumlah_order }}</td>
                            <td>Rp. {{ number_format($order_detail->product->harga) }}</td>
                            <td><strong>Rp. {{ number_format($order_detail->total_harga) }}</strong></td>

                            <!-- button trash -->
                            <td>
                                <i wire:click="destroy({{ $order_detail->id }})" class="fas fa-trash text-danger"></i>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse

                        <!-- Totalharga + kode unik + total pembayaran -->
                        @if(!empty($order))
                        <tr>
                            <td colspan="6" align="right"><strong>Total Harga : </strong></td>
                            <td align="right"><strong>Rp. {{ number_format($order->total_harga) }}</strong> </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right"><strong>Kode Unik : </strong></td>
                            <td align="right"><strong>Rp. {{ number_format($order->kode_unik) }}</strong> </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right"><strong>Total Yang Harus dibayarkan : </strong></td>
                            <td align="right"><strong>Rp. {{ number_format($order->total_harga+$order->kode_unik) }}</strong> </td>
                            <td></td>
                        </tr>
                        <!-- tombol checkout -->
                        <tr>
                            <td colspan="6"></td>
                            <td colspan="2">
                                <a href="{{ route('checkout') }}" class="btn btn-success btn-blok">
                                    <i class="fas fa-arrow-right"></i> Check Out
                                </a>
                            </td>
                        </tr>

                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>