@extends('layouts/cuadro')

@section('main')


    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 margintop-sm">


                </div>
                <div class="col-md-4 margintop-sm">
                  <div class="row">
                  <form class="row" action="" method="post" enctype="multipart/form-data">
                    @csrf

                      <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="title" name="name" placeholder="Titulo">
                              @error ('name')
                                <div class="invalid-feedback">{{$message}}</div>
                              @enderror
                            <p></p>
                        </div>
                      </div>

                      <div class="col-md-12">
                          <div class="form-group">
                              <input type="text" class="form-control @error('price') is-invalid @enderror"  value="{{old('price')}}" id="price"  name="price" placeholder="Precio">
                              @error ('price')
                                <div class="invalid-feedback">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <input type="text" class="form-control @error('stock') is-invalid @enderror" value="{{old('stock')}}" id="stock" name="stock"   placeholder="Stock">
                                @error ('stock')
                                  <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                          </div>
                      </div>

                      <div class="col-md-12">
                          <div class="form-group">
                              <select class="form-control" name="category_id" id="categorie_id" placeholder="Categoria">
                                  <option value="0">Selecciona una Categoria</option>
                          @foreach ($categorias as $categoria)
                              <option value="{{$categoria->id_category}}">{{$categoria->name}}</option>
                          @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <select class="form-control" name="local_id" id="categorie_id" placeholder="Local">
                                  <option value="0">Selecciona un local</option>
                          @foreach ($locales as $local)
                              <option value="{{$local->id_local}}">{{$local->local}}</option>
                          @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                            <label class="custom-file-label" for="proavatar">Seleccione una imagen (opcional)</label>
                            <div class="invalid-feedback">@error('avatar')
                                {{$message}}
                            @enderror</div>
                          </div>
                      </div>


                      <div class="col-md-12">
                        <div class="d-flex justify-content-around">
                          <button type="submit" class="btn btn-primary full-width py-3 px-5" name="button">Registrar</button>
                          <a href="/productos" class="btn btn-black py-3 px-5">Atras</a>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
                <div class="col-md-4 margintop-sm">

                </div>
            </div>
        </div>
    </section>

    @endsection
