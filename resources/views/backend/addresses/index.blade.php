@extends("backend.shared.backend_theme")
 @section("title", "Kullanıcı Modülü")
@section("subtitle", "Kullanıcılar")
 @section("btn_url", url("/users/$user->user_id/addresses/create"))
@section("btn_label","Yeni Ekle")
    @section("content")
            <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sıra No</th>
              <th>Şehir</th>
              <th>İlçe</th>
              <th>Posta Kodu</th>
              <th>Açık Adres</th>
               <th>Varsayılan</th>
             <th>İşlemler </th>
            </tr>
          </thead>
          <tbody>
          @if(count($addrs) > 0)
              @foreach($addrs as $addr)
            <tr id="{{$addr->address_id}}">

                <td>{{$loop->iteration}}</td>
              <td>{{$addr->city}}</td>
              <td>{{$addr->district}}</td>
                              <td>{{$addr->zipcode}}</td>
                                              <td>{{$addr->address}}</td>


              <td>
                  @if($addr->is_default== 1)
                      <span class="badge bg-success">Evet</span>
                  @else
                                        <span class="badge bg-danger">Hayır</span>

                      @endif
                 </td>
              <td>
                  <ul class="nav float-start">
                      <li class="nav-item">
                          <a class="nav-link text-black" href="{{url("/users/$user->user_id/addresses/$addr->address_id/edit")}}">
                              <span data-feather="edit"></span>
                              Güncelle
                          </a>
                      </li>

                          <li class="nav-item">
                          <a class="nav-link list-item-delete text-black" href="{{url("/users/$user->user_id/addresses/$addr->address_id")}}" >
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
                <td colspan="7"><p class="text-center">Herhangi Bir Adres Bulunamadı</p></td>

            </tr>
          @endif
          </tbody>
        </table>

@endsection



