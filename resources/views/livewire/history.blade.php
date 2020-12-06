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
                    <li class="breadcrumb-item active" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tanggal Pesan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>
                            <td><strong>Total Harga</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->kode_order }}</td>
                            <td>
                                <?php $order_details = \App\OrderDetail::where('order_id', $order->id)->get(); ?>
                                <!-- foreach nested -->
                                @foreach ($order_details as $order_detail)
                                <img src="{{ url('assets/jersey') }}/{{ $order_detail->product->gambar }}" class="img-fluid" width="50">
                                {{ $order_detail->product->nama }}
                                <br>
                                @endforeach
                            </td>
                            <td>
                                @if($order->status == 1)
                                Belum Lunas
                                @else
                                Lunas
                                @endif
                            </td>
                            <td><strong>Rp. {{ number_format($order->total_harga) }}</strong></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini : </p>
                    <div class="media">
                        <img class="mr-3" src="{{ url('assets/bca.png') }}" alt="Bank BCA" width="60">
                        <div class="media-body">
                            <h5 class="mt-0">BANK BCA</h5>
                            No. Rekening 000000-123-000 atas nama <strong>Ricky Chandra</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>