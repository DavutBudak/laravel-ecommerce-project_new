@extends("backend.shared.backend_theme")
 @section("title", "z Modülü")
@section("subtitle", "Kullanıcı Güncelle")
 @section("btn_url", url("/users"))
@section("btn_label","Geri Dön")
    @section("content")

          <form action="{{url("/users/$user->user_id/addresses/$addr->address_id")}}" method="POST" autocomplete="off">
              @csrf
              @method("PUT")
              <input type="hidden" name="user_id" value="{{$user->user_id}}">
              <input type="hidden" name="address_id" value="{{$addr->address_id}}">

              <div class="row">


                     <div class="col-lg-6">


                         <x-input label="Şehir" placeholder="Şehir Giriniz" type="text" field="city" value="{{$addr->city}}"> </x-input>



                    </div>



                     <div class="col-lg-6">

                           <x-input label="İlçe" placeholder="İlçe Giriniz" type="text" field="district" value="{{$addr->district}}"> </x-input>

                    </div>

              </div>




                    <div class="row">


                     <div class="col-lg-6">
 <x-input label="Posta Kodu" placeholder="Posta Kodu Giriniz"  field="zipcode" value="{{$addr->zipcode}}"> </x-input>

                    </div>


                  <div class="col-lg-6">

                      <x-checkbox checked="{{ $addr->is_default == 1}}" field="is_default" label="Varsayılan" />


              </div>


              </div>





<div class="row mt-5">


   <div class="col-lg-12">


<x-textarea  label="Açık Adres" placeholder="Adres Giriniz"  field="address" value="{{$addr->address}}"> </x-textarea>

                                          </div>


              </div>

<div class="row mt-5">
    <div class="col-12 ">
        <button  type="submit" class=" w-100  btn btn-success">Kaydet</button>
    </div>
</div>
          </form>
    @endsection
