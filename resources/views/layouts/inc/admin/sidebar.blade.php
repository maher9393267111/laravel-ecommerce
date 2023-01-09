<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{Request::is('admin/dashboard') ? 'active' :''}} ">
        <a class="nav-link" href="{{url('admin/dashboard')}} ">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/orders') ? 'active' :''}}">
        <a class="nav-link" href=" {{url('admin/orders')}} ">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Orders</span>
        </a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-category"aria-expanded="{{Request::is('admin/category*') ? 'true' :'false'}}" aria-controls="ui-basic-category">
          <i class="mdi mdi-view-list menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{Request::is('admin/  *') ? 'show' :'false'}}" id="ui-basic-category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{Request::is('admin/category') ? 'active' :''}}"> <a class="nav-link" href=" {{url('admin/category/create')}} ">Add Category</a></li>
            <li class="nav-item {{Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active' :''}}"> <a class="nav-link" href=" {{url('admin/category')}} ">View Category</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item" >
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-brand" aria-expanded="{{Request::is('admin/brand*') ? 'true' :'false'}}" aria-controls="ui-basic-brand">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Brands</span>
          <i class="menu-arrow"></i>
          </a>
        <div class="collapse" id="ui-basic-brand">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{Request::is('admin/brand') ? 'active' :''}}"> <a class="nav-link" href=" {{url('admin/brand/create')}} ">Add Brand</a></li>
            <li class="nav-item {{Request::is('admin/brand') ? 'active' :''}}"> <a class="nav-link" href=" {{url('admin/brand')}} ">View Brand</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-product" aria-expanded="{{Request::is('admin/products*') ? 'true' :'false'}}" aria-controls="ui-basic-product">
          <i class="mdi mdi-plus-circle menu-icon"></i>
          <span class="menu-title">Product</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic-product">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{Request::is('admin/products') ? 'active' :''}}"> <a class="nav-link" href=" {{url('admin/products/create')}} ">Add Product</a></li>
            <li class="nav-item {{Request::is('admin/products') ? 'active' :''}}"> <a class="nav-link" href=" {{url('admin/products')}} ">View Products</a></li>
          </ul>
        </div>

        <li class="nav-item ">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-color" aria-expanded="{{Request::is('admin/colors*') ? 'true' :'false'}}" aria-controls="ui-basic-color">
            <i class="mdi mdi-plus-circle menu-icon"></i>
            <span class="menu-title">Colors</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic-color">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item {{Request::is('admin/colors') ? 'active' :''}}"> <a class="nav-link" href=" {{url('admin/colors/create')}} ">Add Color</a></li>
              <li class="nav-item {{Request::is('admin/colors') ? 'active' :''}}"> <a class="nav-link" href=" {{url('admin/colors')}} ">View Color</a></li>
            </ul>
          </div>
        </li>



      </li>
      <li class="nav-item {{Request::is('admin/users') ? 'active' :''}}">
        <a class="nav-link" href=" {{url('admin/users')}} ">
          <i class="mdi mdi-account-multiple menu-icon"></i>
          <span class="menu-title">User</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('admin/sliders') ? 'active' :''}}">
        <a class="nav-link" href=" {{url('admin/sliders')}} ">
          <i class="mdi mdi-account-multiple menu-icon"></i>
          <span class="menu-title">Home Slider</span>
        </a>
      </li>


      <li class="nav-item {{Request::is('admin/settings') ? 'active' :''}}">
        <a class="nav-link" href=" {{url('admin/settings')}} ">
          <i class="mdi  mdi-settings menu-icon"></i>
          <span class="menu-title">Setting</span>
        </a>
      </li>
    </ul>
  </nav>