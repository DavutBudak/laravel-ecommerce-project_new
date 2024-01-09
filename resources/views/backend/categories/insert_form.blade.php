@extends("backend.shared.backend_theme")
 @section("title", "Kategori  Modülü")
@section("subtitle", "Yeni Kategori Ekle")
@section("btn_url", url("/categories"))
 @section("btn_label","Geri Dön")
@section("content")
          <form action="{{url("/categories")}}" method="POST">
              @csrf

              <div class="row">


                     <div class="col-lg-6">
                         <div class="mt-2">
<x-input label="Kategori Adı" placeholder="Kategori Adı Giriniz"  field="name"> </x-input>
</div>
                    </div>



                     <div class="col-lg-6">
                                                  <div class="mt-2">

<x-checkbox field="is_active" label="Aktif Kategori"></x-checkbox>
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
