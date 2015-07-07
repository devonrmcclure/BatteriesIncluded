<div class="col-md-4">
    <h2>
        Categories
    </h2>
    <!-- Search -->
    <div class="search-products">
        {{ Form::open(array('url' => $_ENV['URL'] . '/search', 'class' => 'search', 'id' => 'search-form', 'role' => 'form', 'method' => 'GET')) }}
        <div class="group">
            {{ Form::text('search', '', array('class' => '', 'id' => 'search', 'required')) }}
            <span class="highlight"></span>
            <span class="bar"></span>
            {{ Form::label('search', 'Search') }}
        </div>

        {{ Form::close() }}
    </div>
    <!-- End Search -->
    <div class="col-md-10">
        <ul class="nav nav-list catalog-categories ">
        {{ $menu }}
        </ul>
    </div>
</div>

<div class="col-md-8 content">
    <div class="col-md-12">
        <h2>{{{ isset($category) ? $category[0]->category_name : 'Newest Products' }}}</h2>
        @if(isset($breadcrumbs))
        <ol class="breadcrumb">
            @if(isset($category))
                <li><a href=" {{ $_ENV['URL'] }}/catalog">Catalog Home</a></li>
                @for($i = count($breadcrumbs)-1; $i >= 0; $i--)
                    {{ $breadcrumbs[$i] }}
                @endfor
            @endif
        </ol>
        @endif
        @include('layouts.catalog-items.catalogProducts')
    </div>
</div>