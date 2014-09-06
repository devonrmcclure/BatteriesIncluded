<div class="col-md-9 content">
  <div class="col-md-12">
      @if(count($categories) == 1 && count($subCategories) != 1)
        @foreach($categories as $category)
          <h2>All {{ $category->category_name }}</h2>
          <ol class="breadcrumb">
            <li><a href="{{ $_ENV['URL'] }}/catalog">Catalog Home</a></li>
            <li>{{ $category->category_name }}</li>
          </ol>
        @endforeach
      @elseif(count($categories) == 1 && count($subCategories) == 1)
        @foreach($subCategories as $subCategory)
          <h2>{{ $subCategory->subcategory_name }}</h2>
          <ol class="breadcrumb">
            <li><a href="{{ $_ENV['URL'] }}/catalog">Catalog Home</a></li>
            <li>@foreach($categories as $category)<a href="{{ $_ENV['URL'] }}/catalog/{{ $category->category_name }}">{{ $category->category_name }}</a>
              @endforeach
            </li>
            <li>{{ $subCategory->subcategory_name }}</li>
          </ol>
        @endforeach
      @else
        <h2>Newest Items</h2>
      @endif
  </div>