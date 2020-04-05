@extends('layouts/cuadro')

@section('main')

  <?php $total = 0; $subtotal = 0 ; $count = 0 ; ?>

    {{-- <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="">
      <h3>Carrito de {{Auth::user()->name}}</h3>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Producto</th>
						        <th>Precio</th>
						        <th>Cantidad</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
                  @foreach ($productos as $producto)
                    <form class="row" action="" method="post" enctype="multipart/form-data">
                      @csrf
                        @if ($producto->id_user == (Auth::user()->id))
                          @if ($producto->deleteit == 1)
                            @continue
                          @endif
                          @if ($producto->buyit == 1)
                            @continue
                          @endif
                          <?php $count = $count + 1 ; ?>
        						      <tr class="text-center">
        						        <td class="product-remove"><a href="/carrito/{{$producto->id_cart}}"><span class="ion-ios-close"></span></a></td>
                            {{-- eliminar --}}

                            @if ($producto->avatar)
                              <td class="image-prod"><div class=""><img class="cart-img" src="/storage/{{$producto->avatar}}" alt="Colorlib Template">
                              </div></td>
                            @else
                              <td class="image-prod"><div class=""><img class="cart-img" src="/images/defaut.jpg" alt="Colorlib Template">
                              </div></td>
                            @endif

        						        <td class="product-name">
        						        	<h3>{{$producto->getProductName()}}</h3>
        						        	{{-- <p>{{$producto->getProductDescripcion()}}</p> --}}
        						        </td>

        						        <td class="price">${{$producto->price}}</td>

        						        <td class="quantity">
        						        	<div class="input-group mb-3">
        					             	<input type="text" name="quantity" class="quantity form-control input-number" value="{{$producto->quantity}}" min="1" max="100" readonly>
        					          	</div>
        					          </td>

                            <?php $subtotal = ($producto->quantity*$producto->price); ?>
                            <?php $total = $subtotal + $total; ?>

        						        <td class="total">${{$subtotal}}</td>
        						      </tr><!-- END TR-->
                        @endif
                    </form>
                  @endforeach
                  @if ($count >= 1)
                  @else
                    <td class="image-prod">
                      <div class="row justify-content-around">
                        <h1>No tiene productos en su carrito</h1>
                        <h3>Comprar productos:</h3>
                        <a href="/productos" class="btn btn-black py-3 px-5 ">Productos</a>
                      </div>
                    </td>
                  @endif
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
        @if ($count >= 1)
      		<div class="row justify-content-around ">
      			<div class="col-lg-4 mt-5 cart-wrap ftco-animate ">
      				<div class="cart-total mb-3 ">
                <a href="" class="btn btn-black py-5 px-5 w-100 h-100">Comprar</a>
      			  </div>
      		  </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate ">
      				<div class="cart-total mb-3 ">
                <h2>Total :  $  {{$total}}</h2>
      			  </div>
      		  </div>
  			  </div>
        @endif
		</section>





  @endsection
