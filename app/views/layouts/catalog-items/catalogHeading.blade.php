@if($category == "")
<div class="col-md-9 content">
  <div class="col-md-12">
    <h2>Newest Items</h2>
  </div>
@else
<div class="col-md-9 content">
  <div class="col-md-12">
    <h2>{{ $category }}</h2>
  </div>
@endif