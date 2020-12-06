<div class="container">

   <!-- Banner -->
   <div class="banner">
      <img src="{{ url('assets/slider/slide.png') }}" alt="">
   </div>

   <!-- Select Liga -->
   <section class="pilih-liga mt-4">
    <h3><strong>JERSEY BERDASARKAN SERVER </strong></h3>
      <div class="row mt-4">
        @foreach($ligas as $liga)
        <div class="col">
            <a href="{{ route('products.liga',$liga->id) }}">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="{{ url('assets/server') }}/{{ $liga->gambar }}" class="img-fluid">
                    <div class="row mt-2 ">
                        <div class="col-md-12">
                            <h5><strong>{{$liga->nama}} </strong></h5>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        @endforeach
      </div>
   </section>


    <!-- Best seller -->
   <section class="products mt-5 mb-5">
    <h3>
        <strong>BEST PRODUCTS</strong> 
        <a href="{{ route('products') }}" class="btn btn-dark float-right"><i class="fas fa-eye"></i> Show All</a>
    </h3>
      <div class="row mt-4">
        @foreach($products as $product)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ url('assets/jersey') }}/{{ $product->gambar }}" class="img-fluid">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <h5><strong>{{$product->nama}}</strong></h5>
                            <h5>Rp. {{ number_format($product->harga) }} </h5>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                        <a href="{{ route('products.detail', $product->id) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
      </div>
   </section>

</div>