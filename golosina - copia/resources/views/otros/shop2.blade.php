@extends('layouts/cuadro')

@section('main')

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>
{{-- --------------------------------- --}}
    <br>
    <div class="container">
      <div class="d-flex justify-content-around">

          <nav class="content-center">
            <a href="/producto/new" class="btn btn-primary">Cargar nuevo</a>
          </nav>

      </div>
    </div>
    <br>
    <div class="container">
      <div class="d-flex justify-content-around">

          <nav class="content-center">
            {{$productos->links()}}
          </nav>

      </div>
    </div>


    <section class="ftco-section">
    	<div class="container">
    		<div class="row">

          @foreach ($productos as $producto)

            			<div class="col-md-6 col-lg-3 ftco-animate">
            				<div class="product">

                      @if ($producto->avatar)
                        <a href="#" class="img-prod"><img class="img-fluid" src="/storage/{{$producto->avatar}}" alt="Colorlib Template">
              						{{-- <span class="status">30%</span> --}}
                          {{-- descuento --}}
              						<div class="overlay"></div>
                          {{-- mantener tamaño --}}
              					</a>
                      @else
              					<a href="#" class="img-prod"><img class="img-fluid" src="/images/defaut.jpg" alt="Colorlib Template">
              						{{-- <span class="status">30%</span> --}}
                          {{-- descuento --}}
              						<div class="overlay"></div>
                          {{-- mantener tamaño --}}
              					</a>
                      @endif
            					<div class="text py-3 pb-4 px-3 text-center">
            						<h3><a href="#">{{$producto->name}}</a></h3>
            						<div class="d-flex">
            							<div class="pricing">
        		    						<p class="price"><span class="mr-2 price-dc">{{$producto->price}}</span><span class="price-sale">{{$producto->price}}</span></p>
        		    					</div>
        	    					</div>
                      <form class="row" action="" method="post">
                        @csrf
                        @if (Auth::user())
                          <input type="hidden" value="{{Auth::user()->id}}" name="usuario" >
                        @else
                          <input type="hidden" value="0" name="usuario" >
                        @endif
        	    					<div class="bottom-area d-flex px-3">
        	    						<div class="m-auto d-flex ">
        	    							<a href="/productos/{{$producto->id}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
        	    								{{-- <span><i class="ion-ios-menu"></i></span> --}}
                              <span><i class="ion-ios-search"></i></span>
        	    							</a>
        	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
        	    								<span><i class="ion-ios-cart"></i></span>
        	    							</a>
        	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
        	    								<span><i class="ion-ios-heart"></i></span>
        	    							</a>
                            <a href="/eliminar/{{$producto->id}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
        	    								<span><i class="ion-ios-trash"></i></span>
        	    							</a>
            							</div>
            						</div>
                      </form>
                        {{-- botones --}}
            					</div>
            				</div>
            			</div>


          @endforeach

    	</div>
    </section>

{{-- --------------------------------------------- --}}
    <div class="container">
      <div class="d-flex justify-content-around">

          <nav class="content-center">
            {{$productos->links()}}
          </nav>

      </div>
    </div>
    <br>

  @endsection
