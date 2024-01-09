@extends("backend.shared.backend_theme")
 @section("title", "Kullanıcı Adres Modülü")
@section("subtitle", "Yeni Adres Ekle")
@section("btn_url", url("/users"))
 @section("btn_label","Geri Dön")
@section("content")
          <form action="{{url("/users/$user->user_id/addresses")}}" method="POST">
              @csrf

              <input type="hidden" name="user_id" value="{{$user->user_id}}">
              <div class="row">


                     <div class="col-lg-6">
<x-input label="Şehir" placeholder="Şehir Giriniz" type="text" field="city"> </x-input>

                    </div>



                     <div class="col-lg-6">
  <x-input label="İlçe" placeholder="İlçe Giriniz" type="text" field="district"> </x-input>

                    </div>

              </div>


                  <div class="row mt-5">
                     <div class="col-lg-6">
                           <x-input label="Posta Kodu" placeholder="Posta Kodu Giriniz"  field="zipcode"> </x-input>

                    </div>



                  <div class="col-lg-6">

<x-checkbox field="is_default" label="Varsayılan"></x-checkbox>
</div>

              </div>
</div>



<div class="row mt-5">


   <div class="col-lg-12">


<x-textarea  label="Açık Adres" placeholder="Adres Giriniz"  field="address"> </x-textarea>


                                          </div>


              </div>



<div class="row mt-5">
    <div class="col-12 ">
        <button  type="submit" class=" w-100  btn btn-success">Kaydet</button>
    </div>
</div>
          </form>

    @endsection
