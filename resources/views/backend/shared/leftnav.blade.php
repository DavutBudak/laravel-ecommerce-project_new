  <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="#">
              <span data-feather="home"></span>
              Yönetim Paneli
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Str::of(url()->current())->contains("/users") ? "active" : ""}} " href="/users">
              <span data-feather="users"></span>
              Kullanıcılar
            </a>
          </li>

       <li class="nav-item">
            <a class="nav-link {{Str::of(url()->current())->contains("/categories") ? "active" : ""}} " href="/categories">
              <span data-feather="align-justify"></span>
              Kategoriler
            </a>
          </li>

       <li class="nav-item">
            <a class="nav-link {{Str::of(url()->current())->contains("/products") ? "active" : ""}} " href="/products">
              <span data-feather="align-justify"></span>
              Ürünler
            </a>
          </li>

        </ul>
