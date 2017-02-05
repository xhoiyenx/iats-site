<ul class="nav nav-pills nav-stacked nav-quirk">
  <li class="{!! is_active(['blog.index', 'blog.create'], 'active') !!}">
    <a href="{{ route('blog.index') }}"><i class="fa fa-list"></i> <span>Blog</span></a>
  </li>
  <li>
    <a href="{{ route('post::index') }}"><i class="fa fa-list"></i> <span>Post</span></a>
  </li>
  <li class="{!! is_active(['catalog.product', 'catalog.product.media', 'catalog.article', 'catalog.brand', 'catalog.color'], 'active ') !!}nav-parent">
    <a href="#"><i class="fa fa-tags"></i> <span>Catalog</span></a>
    <ul class="children">
      <li class="{!! is_active(['catalog.product'], 'active ') !!}">
        <a href="{{ route('catalog.product') }}">Products</a>
      </li>
      <li class="{!! is_active(['catalog.brand'], 'active ') !!}">
        <a href="{{ route('catalog.brand') }}">Brands</a>
      </li>
      <li class="{!! is_active(['catalog.article'], 'active ') !!}">
        <a href="{{ route('catalog.article') }}">Articles</a>
      </li>
      <li class="{!! is_active(['catalog.color'], 'active ') !!}">
        <a href="{{ route('catalog.color') }}">Colors</a>
      </li>
    </ul>
  </li>
  <li class="{!! is_active(['manager.index', 'member::index', 'member::update'], 'active ') !!}nav-parent">
    <a href="#"><i class="fa fa-users"></i> <span>Users</span></a>
    <ul class="children">
      <li class="{!! is_active(['manager.index'], 'active ') !!}">
        <a href="{{ route('manager.index') }}">Administrator</a>
      </li>
      <li class="{!! is_active(['member::index', 'member::update'], 'active ') !!}">
        <a href="{{ route('member::index') }}">Member</a>
      </li>
    </ul>
  </li>
</ul>