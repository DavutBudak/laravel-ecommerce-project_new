@extends("backend.shared.backend_theme")
 @section("title", "Kullanıcı Modülü")
@section("subtitle", "Kullanıcı Güncelle")
 @section("btn_url", url("/users"))
@section("btn_label","Geri Dön")
    @section("content")

          <form action="{{url("/users/$user->user_id")}}" method="POST" autocomplete="off">
              @csrf
              @method("PUT")
              <input type="hidden" name="user_id" value="{{$user->user_id}}">
              <div class="row">


                     <div class="col-lg-6">
                         <x-input label="Ad Soyad" placeholder="Ad Soyad Giriniz" type="text" field="name" value="{{$user->name}}"> </x-input>
                    </div>



                     <div class="col-lg-6">

                   <x-input label="E-posta" placeholder="E-posta Giriniz" type="email" field="email" value="{{$user->email}}"> </x-input>



                    </div>

              </div>






                     <div class="row mt-5">
                     <div class="col-lg-6">
                         <x-checkbox checked="{{ $user->is_admin == 1}}" field="is_admin" label="Yetkili Kullanıcı" />

                    </div>


   <div class="col-lg-6">

    <x-checkbox checked="{{ $user->is_active == 1}}" field="is_active" label=" Aktif Kullanıcı" />




                    </div>

              </div>


<div class="row mt-5">
    <div class="col-12 ">
        <button  type="submit" class=" w-100  btn btn-success">Kaydet</button>
    </div>
</div>
          </form>
    @endsection
