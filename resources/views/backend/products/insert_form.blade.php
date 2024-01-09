@extends("backend.shared.backend_theme")
 @section("title", "Ürün  Modülü")
@section("subtitle", "Yeni Ürün Ekle")
@section("btn_url", url("/products"))
 @section("btn_label","Geri Dön")
@section("content")
          <form action="{{url("/products")}}" method="POST">
              @csrf

              <div class="row">


                     <div class="col-lg-6">
                         <div class="mt-2">
<x-input label="Ürün Adı" placeholder="Ürün Adı Giriniz"  field="name"> </x-input>
</div>
                    </div>



                     <div class="col-lg-6">
                                                  <div class="mt-2">
                                                      <label class="form-label" for="category_id">Kategori Seçiniz</label>

                                                      <select name="category_id" id="category_id" class="form-control">
                                                          <option >Seçiniz</option>
                                                          @foreach($categories as $category)
                                                          <option value="{{$category->category_id}}">{{$category->name}}</option>

                                                          @endforeach
                                                      </select>
                                                          @error("category_id")
                         <span class="text-danger"> {{$message}} </span>
                         @enderror



                                                  </div>
                    </div>

              </div>





                         <div class="row">


                     <div class="col-lg-6">
                         <div class="mt-2">
<x-input label="Ürün Fiyatı" placeholder="Fiyat Giriniz"  field="price" > </x-input>
</div>
                    </div>
 <div class="col-lg-6">
                         <div class="mt-2">
<x-input label="Eski Ürün Fiyatı" placeholder="Eski Ürün Fiyatı Giriniz"  field="old_price" > </x-input>
</div>
                    </div>




              </div>









                         <div class="row">


                     <div class="col-lg-12">
                         <div class="mt-2">
<x-input label="Kısa Açıklama " placeholder="Kısa Açıklama Giriniz"  field="lead" > </x-input>
</div>
                    </div>





              </div>



                         <div class="row">


                     <div class="col-lg-12">
                         <div class="mt-2">
<x-textarea label="Detaylı Açıklama" placeholder="Detaylı Açıklama Giriniz" field="description" />
                         </div>
                    </div>





              </div>









                         <div class="row">


                     <div class="col-lg-12">
                         <div class="mt-2">
<x-checkbox field="is_active" label="Aktif Ürün" />
                         </div>
                    </div>





              </div>





<div class="row mt-5">
    <div class="col-12 ">
        <button  type="submit" class=" w-100  btn btn-success">Kaydet</button>
    </div>
</div>
          </form>

    @endsection
