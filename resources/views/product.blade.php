@extends('layout.app')
@section('content')

<!-- Products Start -->
    <div class="container-fluid py-5">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Products</h6>
                <h1 class="display-5 text-uppercase mb-0">Products For Your Best Hygine</h1>
            </div>
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-0">Daily Product</h1>
            </div>
            <div class="owl-carousel product-carousel">
            @php 

            $datas=App\Models\Product::where('type','food')->get();
            @endphp
            @if(!empty($datas))
                @foreach($datas as $product)
                    <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">

                        <img class="img-fluid mb-4" style="height: 250px; width=100px;" src="/productimage/{{$product->image}}"  alt="">
                        <h6 class="text-uppercase">{{$product->title}}</h6>
                        <h5 class="text-primary mb-0">Rs{{$product->price}}</h5>
                        <p>{{$product->description}}</p>

                        <div class="btn-action d-flex justify-content-center">
                            <form action="{{route('addcart',$product->id)}}" method="post">
                                @csrf
                                <input type="number" value="1" min="1" class="form-control" style="width: 100px" name="quantity"><br>
                                <button class="btn btn-primary py-2 px-3" type="submit" value="Add Cart"><i class="bi bi-cart"></i></button>
                                <!-- <button class="btn btn-primary py-2 px-3" href=""><i class="bi bi-eye"></i></button> -->
                            </form>                          
                        </div>
                    </div>
                </div>

                @endforeach
            @endif
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-0">Bread Items</h1>
            </div>
            <div class="owl-carousel product-carousel">
            @php 

            $datas=App\Models\Product::where('type','toy')->get();
            @endphp
            
                @foreach($datas as $product)
                    <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">

                        <img class="img-fluid mb-4" style="height: 250px; width=100px;" src="/productimage/{{$product->image}}"  alt="">
                        <h6 class="text-uppercase">{{$product->title}}</h6>
                        <h5 class="text-primary mb-0">Rs{{$product->price}}</h5>
                        <p>{{$product->description}}</p>

                        <div class="btn-action d-flex justify-content-center">
                            <form action="{{route('addcart',$product->id)}}" method="post">
                                @csrf
                                <input type="number" value="1" min="1" class="form-control" style="width: 100px" name="quantity"><br>
                                <button class="btn btn-primary py-2 px-3" type="submit" value="Add Cart"><i class="bi bi-cart"></i></button>
                                <!-- <button class="btn btn-primary py-2 px-3" href=""><i class="bi bi-eye"></i></button> -->
                            </form>                          
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-0">Featured Products</h1>
            </div>
            <div class="owl-carousel product-carousel">
            @php 

                $datas=App\Models\Product::where('type','accessory')->get();
            @endphp

         @foreach($datas as $product)
        <div class="pb-5">
        <div class="product-item position-relative bg-light d-flex flex-column text-center">

            <img class="img-fluid mb-4" style="height: 250px; width=100px;" src="/productimage/{{$product->image}}"  alt="">
            <h6 class="text-uppercase">{{$product->title}}</h6>
            <h5 class="text-primary mb-0">Rs{{$product->price}}</h5>
            <p>{{$product->description}}</p>

            <div class="btn-action d-flex justify-content-center">
                <form action="{{route('addcart',$product->id)}}" method="post">
                    @csrf
                    <input type="number" value="1" min="1" class="form-control" style="width: 100px" name="quantity"><br>
                    <button class="btn btn-primary py-2 px-3" type="submit" value="Add Cart"><i class="bi bi-cart"></i></button>
                    <!-- <button class="btn btn-primary py-2 px-3" href=""><i class="bi bi-eye"></i></button> -->
                </form>                          
            </div>
        </div>
        </div>

            @endforeach
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-start">
                <div class="col-lg-7">
                    <div class="border-start border-5 border-dark ps-5 mb-5">
                        <h6 class="text-dark text-uppercase">Special Products</h6>
                        <h1 class="display-5 text-uppercase text-white mb-0">Best quality food & dairy products</h1>
                    </div>
                    <p class="text-white mb-4">Buy fresh Dairy product & share with Family who will bring joy and love into your home.</p>
                    <a href="{{route('contact')}}" class="btn btn-light py-md-3 px-md-5 me-3">Contact Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

@endsection