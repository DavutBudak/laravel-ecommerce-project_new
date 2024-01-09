@extends("backend.shared.backend_theme")
 @section("title", "Kategori Modülü")
@section("subtitle", "Kategoriler")
 @section("btn_url", url("/categories/create"))
@section("btn_label","Yeni Ekle")
    @section("content")
            <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sıra No</th>
              <th>Adı</th>
              <th>Slug</th>
              <th>Durum</th>
             <th>İşlemler </th>
            </tr>
          </thead>
          <tbody>
          @if(count($categories) > 0)
              @foreach($categories as $category)
            <tr id="{{$category->category_id}}">

                <td>{{$loop->iteration}}</td>
              <td>{{$category->name}}</td>
              <td>{{$category->slug}}</td>
              <td>
                  @if($category->is_active== 1)
                      <span class="badge bg-success">Aktif</span>
                  @else
                                        <span class="badge bg-danger">Pasif</span>

                      @endif
                 </td>
              <td>
                  <ul class="nav float-start">
                      <li class="nav-item">
                          <a class="nav-link text-black" href="{{url("/categories/$category->category_id/edit")}}">
                              <span data-feather="edit"></span>
                              Güncelle
                          </a>
                      </li>

                          <li class="nav-item">
                          <a class="nav-link list-item-delete text-black" href="{{url("/categories/$category->category_id")}}" >
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
                <td colspan="7"><p class="text-center">Herhangi Bir Kategori Bulunamadı</p></td>

            </tr>
          @endif
          </tbody>
        </table>

@endsection



