@extends("backend.shared.backend_theme")
 @section("title", "Ürün Modülü")
@section("subtitle", "Yeni Fotoğraf Ekle")
@section("btn_url", url("/products"))
 @section("btn_label","Geri Dön")
@section("content")
          <form action="{{url("/products/$product->product_id/images")}}" enctype="multipart/form-data" method="POST">
              @csrf

              <input type="hidden" name="product_id" value="{{$product->product_id}}">
              <div class="row">


                     <div class="col-lg-6">
<x-input label="Dosya Yükle" placeholder="" type="file" field="image_url"> </x-input>

                    </div>


                     <div class="col-lg-6">
<x-input label="Açıklama" placeholder="Kısa Açıklama Giriniz" type="text" field="alt"> </x-input>

                    </div>

              </div>

                            <div class="row">


                     <div class="col-lg-6">

<x-input label="Sıra No" placeholder="Sıra No" field="seq"> </x-input>
                    </div>



                     <div class="col-lg-6">
<x-checkbox field="is_active" label="Aktif"></x-checkbox>
</div>

              </div>












<div class="row mt-5">
    <div class="col-12 ">
        <button  type="submit" class=" w-100  btn btn-success">Kaydet</button>
    </div>
</div>
          </form>

    @endsection
