@extends('layouts/cuadro')

@section('main')


    {{-- <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div> --}}

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
            @if ($detalle->avatar)
              <img class="img-fluid" src="/storage/{{$detalle->avatar}}" alt="Colorlib Template">

            @else
              <img class="img-fluid" src="/images/defaut.jpg" alt="Colorlib Template">

            @endif
            {{-- <a href="images/product-1.jpg" class="image-popup"><img src="images/product-1.jpg" class="img-fluid" alt="Colorlib Template"></a> --}}
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h2>{{$detalle->name}}</h2>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<h4>Precio :</h4>
							</p>
							<p class="text-left mr-4">
                <h4>$ {{$detalle->price}}</h4>
							</p>
						</div>
            <div class="rating d-flex">
							<p class="text-left mr-4">
								<h5>Stock :</h5>
							</p>
							<p class="text-left mr-4">
                <h5>{{$detalle->stock}}</h5>
							</p>
						</div>
            <div class="rating d-flex">
							<p class="text-left mr-4">
								<h5>Categoria :</h5>
							</p>
							<p class="text-left mr-4">
                <h5>{{$detalle->getCategorieName()}}</h5>
							</p>
						</div>
            <div class="rating d-flex">
							<p class="text-left mr-4">
								<h5>Categoria :</h5>
							</p>
							<p class="text-left mr-4">
                <h5>{{$detalle->getLocalName()}}</h5>
							</p>
						</div>
            @if ($detalle->descripcion)
              <p id="prodescripcion">{{$detalle->descripcion}}</p>
            @else
      				<p id="prodescripcion">No tiene! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            @endif

            
          	<p><a href="" class="btn btn-black py-3 px-5">Comprar</a></p>
            <p><a href="/" class="btn btn-black py-3 px-5">Atras</a></p>
            {{-- <p><a href="/productos" class="btn btn-black py-3 px-5">Atras</a></p> --}}
            <p><a href="/editar/{{$detalle->id}}" class="btn btn-black py-3 px-5">Editar</a></p>
    			</div>
    		</div>
    	</div>
    </section>



@endsection
