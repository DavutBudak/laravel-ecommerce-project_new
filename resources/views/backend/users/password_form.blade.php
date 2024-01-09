@extends("backend.shared.backend_theme")
 @section("title", "Kullanıcı Modülü")
@section("subtitle", "Şifre Değiştir")
 @section("btn_url", url("/users"))
@section("btn_label","Geri Dön")
    @section("content")

          <form action="{{url("/users/$user->user_id/change-password")}}" method="POST">
              @csrf

         <div class="row mt-5">
                     <div class="col-lg-6">
                         <x-input label="Şifre" placeholder="Şifre Giriniz" field="password"  type="password"> </x-input>
                    </div>



                     <div class="col-lg-6">
                         <x-input label="Şifre Tekrarı" placeholder="Şifre Tekrarı Giriniz" field="password_confirmation"  type="password"> </x-input>
                    </div>

              </div>

<div class="row mt-5">
    <div class="col-12 ">
        <button  type="submit" class=" w-100  btn btn-success">Kaydet</button>
    </div>
</div>
          </form>

    @endsection
