@extends("backend.shared.backend_theme")
 @section("title", "Kullanıcı Modülü")
@section("subtitle", "Yeni Kullanıcı Ekle")
@section("btn_url", url("/users"))
 @section("btn_label","Geri Dön")
@section("content")

          <form action="{{url("/users")}}" method="POST">
              @csrf
              <div class="row">


                     <div class="col-lg-6">
                         <x-input label="Ad Soyad" placeholder="Ad Soyad Giriniz" type="text" field="name"> </x-input>
                    </div>



                     <div class="col-lg-6">
       <x-input label="E-posta" placeholder="E-posta Giriniz" field="email"  type="email"> </x-input>
                    </div>

              </div>


                  <div class="row mt-5">
                     <div class="col-lg-6">
                         <x-input label="Şifre" placeholder="Şifre Giriniz" field="password"  type="password"> </x-input>
                    </div>



                     <div class="col-lg-6">
                         <x-input label="Şifre Tekrarı" placeholder="Şifre Tekrarı Giriniz" field="password_confirmation"  type="password"> </x-input>
                    </div>

              </div>




                     <div class="row mt-5">
                     <div class="col-lg-6">
           <x-checkbox field="is_admin" label="Yetkili Kullanıcı"></x-checkbox>

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
