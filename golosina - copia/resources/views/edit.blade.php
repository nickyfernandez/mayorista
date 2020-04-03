@extends('layouts/cuadro')

@section('main')

    <section class="ftco-section">
      <form class="row" action="" method="post" enctype="multipart/form-data">
        @csrf
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-6 mb-5 ftco-animate">
                @if ($detalle->avatar)
                  <img class="img-fluid" src="/storage/{{$detalle->avatar}}" alt="Colorlib Template">
                  <div class="col-md-12">
                      <div class="form-group">
                        <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="avatar" name="avatar" >
                        <label class="custom-file-label" for="proavatar">Seleccione una imagen (opcional)</label>
                        <div class="invalid-feedback">@error('avatar')
                            {{$message}}
                        @enderror</div>
                      </div>
                  </div>

                @else
                  <img class="img-fluid" src="/images/defaut.jpg" alt="Colorlib Template">
                  <div class="col-md-12">
                      <div class="form-group">
                        <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                        <label class="custom-file-label" for="proavatar">Seleccione una imagen (opcional)</label>
                        <div class="invalid-feedback">@error('avatar')
                            {{$message}}
                        @enderror</div>
                      </div>
                  </div>

                @endif
                {{-- <a href="images/product-1.jpg" class="image-popup"><img src="images/product-1.jpg" class="img-fluid" alt="Colorlib Template"></a> --}}
        			</div>
              <div class="col-lg-6 product-details pl-md-5 ftco-animate">
        				<h2><input type="text" class="form-control" value="{{$detalle->name}}" id="title" name="title" placeholder="Titulo"></h2>
        				<div class="rating d-flex">
    							<p class="text-left mr-4">
    								<h4>Precio :</h4>
    							</p>
    							<p class="text-left mr-4">
                    <input type="text" class="form-control" value="{{$detalle->price}}" id="title" name="price" placeholder="price">
    							</p>
    						</div>
                <div class="rating d-flex">
    							<p class="text-left mr-4">
    								<h5>Stock :</h5>
    							</p>
    							<p class="text-left mr-4">
                    <input type="text" class="form-control" value="{{$detalle->stock}}" id="title" name="stock" placeholder="stock">
    							</p>
    						</div>

                <div class="rating d-flex">
    							<p class="text-left mr-4">
    								<h5>Categoria :</h5>
    							</p>
    							<p class="text-left mr-4">
                    <div class="form-group">
                        <select class="form-control" name="category_id" id="categorie_id" placeholder="Categoria">
                            <option value="{{$detalle->id_category}}"><h5>{{$detalle->getCategorieName()}}</h5></option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id_category}}">{{$categoria->name}}</option>
                    @endforeach
                        </select>
                    </div>

    							</p>
    						</div>
                <div class="rating d-flex">
    							<p class="text-left mr-4">
    								<h5>Categoria :</h5>
    							</p>
    							<p class="text-left mr-4">
                    <div class="form-group">
                        <select class="form-control" name="local_id" id="categorie_id" placeholder="Categoria">
                            <option value="{{$detalle->id_local}}"><h5>{{$detalle->getLocalName()}}</h5></option>
                          @foreach ($locales as $local)
                            <option value="{{$local->id_local}}">{{$local->local}}</option>
                          @endforeach
                        </select>
                    </div>

    							</p>
    						</div>

                @if ($detalle->descripcion)
                  <p id="prodescripcion">{{$detalle->descripcion}}</p>
                @else
          				<p id="prodescripcion">No tiene! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                @endif

                <div class="col-md-12">
                  <div class="d-flex justify-content-around">
                    {{-- <button type="submit" class="btn  full-width btn btn-danger" name="button">Editar</button> --}}
                    <a href="/productos/{{$detalle->id}}" class="btn btn-black py-3 px-5">Atras</a>
                    <input class="btn btn-primary py-3 px-5" type="submit" value="Editar">
                    {{-- <p><a href="/editar/{{$detalle->id}}" class="btn btn-black py-3 px-5">Editar</a></p> --}}
                    {{-- <button type="submit" class="btn btn-primary full-width" name="button">{{ __('') }}Ingresar</button> --}}
                  </div>
                </div>

        			</div>
        		</div>
        	</div>
      </form>
    </section>



@endsection
