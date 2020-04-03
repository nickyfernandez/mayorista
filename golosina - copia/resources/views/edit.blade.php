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
        				{{-- <h3>{{$detalle->name}}</h3> --}}
                <div class="col-md-12">
                  <div class="form-group">
                      <input type="text" class="form-control" value="{{$detalle->name}}" id="title" name="title" placeholder="Titulo">
                      <p></p>
                  </div>
                </div>
        				<div class="rating d-flex">
    							<p class="text-left mr-4">
    								<a href="#" class="mr-2">5.0</a>
    								<a href="#"><span class="ion-ios-star-outline"></span></a>
    								<a href="#"><span class="ion-ios-star-outline"></span></a>
    								<a href="#"><span class="ion-ios-star-outline"></span></a>
    								<a href="#"><span class="ion-ios-star-outline"></span></a>
    								<a href="#"><span class="ion-ios-star-outline"></span></a>
    							</p>
    							<p class="text-left mr-4">
    								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
    							</p>
    							<p class="text-left">
    								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
    							</p>
    						</div>
        				<p class="price"><spans>{{$detalle->price}}</span></p>
        				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until.
    						</p>
    						<div class="row mt-4">
    							<div class="col-md-6">
    								<div class="form-group d-flex">
    		              <div class="select-wrap">
    	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
    	                  <select name="" id="" class="form-control">
    	                  	<option value="">Small</option>
    	                    <option value="">Medium</option>
    	                    <option value="">Large</option>
    	                    <option value="">Extra Large</option>
    	                  </select>
    	                </div>
    		            </div>
    							</div>
    							<div class="w-100"></div>
    							<div class="input-group col-md-6 d-flex mb-3">
    	             	<span class="input-group-btn mr-2">
    	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
    	                   <i class="ion-ios-remove"></i>
    	                	</button>
    	            		</span>
    	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
    	             	<span class="input-group-btn ml-2">
    	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
    	                     <i class="ion-ios-add"></i>
    	                 </button>
    	             	</span>
    	          	</div>
    	          	<div class="w-100"></div>
    	          	<div class="col-md-12">
    	          		<p style="color: #000;">600 kg available</p>
    	          	</div>
              	</div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary full-width" name="button">Editar</button>
                </div>

        			</div>
        		</div>
        	</div>
      </form>
    </section>



@endsection