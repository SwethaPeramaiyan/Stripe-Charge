@include('layouts.header')
<body>    
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif    
        <h2 class="text-primary text-center" style="margin-top: revert">Products List</h2>
        <div class="row">
            @foreach ($products as $product)            
                <div class="col-3 mt-4">
                    <div class="card shadow-lg p-2">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">₹ {{$product->price}}</p>
                            <a href="{{URL::to('/')}}/view/product/{{$product->id}}" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>                 
            @endforeach               
        </div>
    </div>
</body>

@include('layouts.footer')