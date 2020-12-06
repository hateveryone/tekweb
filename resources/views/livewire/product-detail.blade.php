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
               <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Jersey</a></li>
               <li class="breadcrumb-item active" aria-current="page">Jersey Detail</li>
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

   <div class="row mt">
      <div class="col-md-6">
         <div class="card gambar-product">
            <div class="card-body">
               <img src="{{ url('assets/jersey') }}/{{ $product->gambar }}" class="img-fluid">
            </div>
         </div>

      </div>
      <div class="col-md-6">
         <h2>
            <strong>{{ $product->nama }} </strong>
         </h2>
         <h4>
            Rp. {{ number_format($product->harga) }}
            @if($product->is_ready == 1)
            <span class="badge badge-success"> <i class="fas fa-check"></i>Ready</span>
            @else
            <span class="badge badge-danger"> <i class="fas fa-times"></i> Stock Habis</span>
            @endif
         </h4>


         <div class="row">
            <div class="col">
               <form wire:submit.prevent="masukanKeranjang">
                  <table class="table" style="border-top : hidden">
                     <tr>
                        <td>Server</td>
                        <td>:</td>
                        <td>
                           <img src="{{ url('assets/server') }}/{{ $product->liga->gambar }}" class="img-fluid" width="50">
                        </td>
                     </tr>

                     <tr>
                        <td>Jenis</td>
                        <td>:</td>
                        <td>{{ $product->jenis }}</td>
                     </tr>

                     <tr>
                        <td>Berat</td>
                        <td>:</td>
                        <td>{{ $product->berat }}</td>
                     </tr>

                     <tr>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td>
                           <input id="jumlah_order" type="number" class="form-control @error('jumlah_order') is-invalid @enderror" wire:model="jumlah_order" value="{{ old('jumlah_order') }}" required autocomplete="name" autofocus>

                           @error('jumlah_order')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </td>
                     </tr>

                     <!-- IF PESANAN BANYAK -->
                     @if($jumlah_order > 1)
                     @else
                     <tr>
                        <td colspan="3"><strong>Name Set (*optional untuk menambah nameset)</strong></td>
                     </tr>
                     <!-- ================== -->
                     <tr>
                        <td>Harga Nameset</td>
                        <td>:</td>
                        <td>{{ number_format($product->harga_namaset) }}</td>
                     </tr>
                     <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                           <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" value="{{ old('nama') }}" autocomplete="name" autofocus>

                           @error('nama')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </td>
                     </tr>
                     <!-- ================== -->
                     <tr>
                        <td>Angka</td>
                        <td>:</td>
                        <td>
                           <input id="nomor" type="number" class="form-control @error('nomor') is-invalid @enderror" wire:model="nomor" value="{{ old('nomor') }}" autocomplete="name" autofocus>

                           @error('nomor')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </td>
                     </tr>
                     @endif

                     <!-- SUBMIT BUTTON -->
                     <tr>
                        <td colspan="3">
                           <button type="submit" class="btn btn-dark btn-block" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i> Masukan Keranjang</button>
                        </td>
                     </tr>

                  </table>
               </form>
            </div>
         </div>
      </div>
   </div>

</div>