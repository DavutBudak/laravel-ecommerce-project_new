@extends("backend.shared.backend_theme")
 @section("title", "Ürünler Modülü")
@section("subtitle", "Fotoğraflar")
 @section("btn_url", url("/products/$product->product_id/images/create"))
@section("btn_label","Yeni Ekle")
    @section("content")
            <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sıra No</th>
              <th>Fotoğraf</th>
              <th>Açıklama</th>
               <th>Durum</th>
             <th>İşlemler </th>
            </tr>
          </thead>
          <tbody>
          @if(count($product->images) > 0)
              @foreach($product->images as $image)
            <tr id="{{$image->image_id}}">

                <td>{{$image->seq}}</td>
              <td>{{$image->image_url}}</td>
              <td>{{$image->alt}}</td>

              <td>
                  @if($image->is_active== 1)
                      <span class="badge bg-success">Aktif</span>
                  @else
                                        <span class="badge bg-danger">Pasif</span>

                      @endif
                 </td>
              <td>
                  <ul class="nav float-start">
                      <li class="nav-item">
                          <a class="nav-link text-black" href="{{url("/products/$product->product_id/images/$image->image_id/edit")}}">
                              <span data-feather="edit"></span>
                              Güncelle
                          </a>
                      </li>

                          <li class="nav-item">
                          <a class="nav-link list-item-delete text-black" href="{{url("/products/$product->product_id/images/$image->image_id")}}" >
                              <span data-feather="trash-2"></span>
                              Sil
                          </a>
                      </li>



                  </ul>
              </td>


            </tr>
              @endforeach
          @else
                <tr>
                <td colspan="5"><p class="text-center">Herhangi Bir Kayıt Bulunamadı</p></td>

            </tr>
          @endif
          </tbody>
        </table>

@endsection



