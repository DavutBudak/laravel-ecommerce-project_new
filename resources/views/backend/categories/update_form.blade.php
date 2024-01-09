@extends("backend.shared.backend_theme")
 @section("title", "Kategori Modülü")
@section("subtitle", "Kategori Güncelle")
 @section("btn_url", url("/categories"))
@section("btn_label","Geri Dön")
    @section("content")

          <form action="{{url("/categories/$category->category_id")}}" method="POST" autocomplete="off">
              @csrf
              @method("PUT")
              <input type="hidden" name="category_id" value="{{$category->category_id}}">

              <div class="row">


                     <div class="col-lg-6">

<div class="mt-2">
                         <x-input label="Kategori Adı" placeholder="Kategori Adı Giriniz"  field="name" value="{{$category->name}}"> </x-input>
</div>


                    </div>



                     <div class="col-lg-6">
<div class="mt-2">

                         <x-input label="Slug" placeholder="Slug Giriniz"  field="slug" value="{{$category->slug}}"> </x-input>
</div>


              </div>

              </div>












                     <div class="row">

                     <div class="col-lg-6">
<div class="mt-2">

                      <x-checkbox checked="{{ $category->is_active == 1}}" field="is_active" label="Aktif Kategori" />
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
