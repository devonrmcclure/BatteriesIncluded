    <div class="col-md-3">
    <h2>
      {{-- If there's more than one category, display all of them, otherwise show the only one available. --}}
      @if(count($categories) > 1 && count($subCategories) == 0)
        Categories
      @else
        @foreach($categories as $category)
          {{ $category->category_name }}
        @endforeach
      @endif
    </h2>
    <div class="col-md-12">
      <ul class="catalog-categories list-group">
      @if(count($categories) > 1 && count($subCategories) == 0)
        @foreach($categories as $category)
          <li class="list-group-item">
            <span class="badge">
              {{ count(Product::wherecategory_id($category->id)->get()); }}
           </span>
            <a href="{{ $_ENV['URL'] }}/catalog/{{ $category->category_name }}">{{ $category->category_name }} </a>
          </li>
        @endforeach
      @else
        @foreach($subCategoryLinks as $subCat)
          <li class="list-group-item">
          <span class="badge">
              {{ count(Product::wheresubcategory_id($subCat->id)->get()); }}
          </span><a href="{{ $_ENV['URL'] }}/catalog/{{ $subCat->subcategory_name }}">{{ $subCat->subcategory_name }}</a></li>
        @endforeach
      @endif

      </ul>
    </div>
  </div>