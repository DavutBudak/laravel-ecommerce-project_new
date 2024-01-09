@extends("backend.shared.backend_theme")
 @section("title", "z Modülü")
@section("subtitle", "Kullanıcı Güncelle")
 @section("btn_url", url("/products"))
@section("btn_label","Geri Dön")
    @section("content")

          <form action="{{url("/products/$product->product_id/images/$image->image_id")}}" method="POST" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method("PUT")
            <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <input type="hidden" name="address_id" value="{{$image->image_id}}">
              <div class="row">


                     <div class="col-lg-6">
<x-input label="Dosya Yükle" placeholder="" type="file" field="image_url"> </x-input>
              <img src="{{asset("storage/products/".$image->image_url)}}" alt="{{$image->alt}}" width="100px">

                    </div>


                     <div class="col-lg-6">
<x-input label="Açıklama" placeholder="Kısa Açıklama Giriniz" type="text" field="alt" value="{{$image->alt}}"> </x-input>

                    </div>

              </div>

                            <div class="row">


                     <div class="col-lg-6">

<x-input label="Sıra No" placeholder="Sıra No" field="seq" value="{{$image->seq}}" > </x-input>
                    </div>



                     <div class="col-lg-6">
<x-checkbox field="is_active" label="Aktif"  checked="{{$image->is_active == 1}}"></x-checkbox>
</div>

              </div>





<div class="row mt-5">
    <div class="col-12 ">
        <button  type="submit" class=" w-100  btn btn-success">Kaydet</button>
    </div>
</div>
          </form>
    @endsection
