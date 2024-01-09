<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Eticaret Projemiz</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

      <link rel="stylesheet" href="{{asset("css/app.css")}}">


            <link rel="stylesheet" href="{{asset("css/dashboard.css")}}">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
  </head>
  <body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">PROJE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Anasayfa</a>
                            </li>
                            @auth()
                                <li class="nav-item">
                                    <a class="nav-link" href="/sepetim">Sepetim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/cikis">Çıkış</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/giris">Giriş Yap</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/uye-ol">Üye ol</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 pt-4">
            <h5>Kategoriler</h5>
            <div class="list-group">
                <a href="/"
                   class="list-group-item list-group-item-action">Hepsi</a>
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <a href="/kategori/{{$category->slug}}"
                           class="list-group-item list-group-item-action">{{$category->name}}</a>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-sm-9 pt-4">
            <h5>Ürünler</h5>
            @if(count($products) > 0)
                <div class="card-group">
                    @foreach($products as $product)
                        <div class="card" style="width: 18rem;">


@if(isset($product->images) && count($product->images) > 0)
    <img src="{{ asset("/storage/products/".$product->images[0]->image_url) }}" class="card-img-top" alt="{{ $product->images[0]->alt }}">
@else
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg" class="card-img-top" alt="Fotoğraf bulunamadı">
@endif                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <h6 class="card-title">Fiyat: {{$product->price}}TL</h6>
                                <p class="card-text">{{$product->lead}}</p>
                                <a href="/sepetim/ekle/{{$product->product_id}}" class="btn btn-primary">Sepete Ekle</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

  </body>
 <script type="text/javascript" src="{{asset("js/app.js")}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.1/feather.min.js"></script>
    <script type="text/javascript" src="{{asset("js/dashboard.js")}}"></script>
      <script type="text/javascript" src="{{asset("js/panel-list-item-delete.js")}}"></script>

</html>
