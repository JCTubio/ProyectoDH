<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>DigitalMarket</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/products.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>

  <body>
    @include('layouts.header')

    <nav class="product-filter">
		<h1>Productos</h1>

		<div class="sort">
			<div class="collection-sort">
				<label>Filter by:</label>
				<select>
          <option value="/">All</option>
          @foreach ($categories as $category)
            <option value="{{$category->name}}">{{$category->name}}</option>
          @endforeach
          </select>

			</div>

			<div class="collection-sort">
				<label>Sort by:</label>
				<select>
		      <option value="/">Featured</option>
		      <option value="/">Best Selling</option>
		      <option value="/">Alphabetically, A-Z</option>
		      <option value="/">Alphabetically, Z-A</option>
		      <option value="/">Price, low to high</option>
		      <option value="/">Price, high to low</option>
		      <option value="/">Date, new to old</option>
		      <option value="/">Date, old to new</option>
		    </select>
			</div>
		</div>
	</nav>

  <section class="products">

    @foreach ($products as $product)
      <a href="/productos/{{$product->id}}" class="product-card">
        <div class="product-image">
          @if (@isset($product->fotopath))
            <img src="{{ asset('storage/productos/' . $product->fotopath) }}" alt="">
          @else
          <img src="\img\miss-img.jpg" alt="">
        @endif
        </div>
        <div class="product-info">
          <h5>{{$product->name}}</h5>
          <h6>${{$product->cost}}</h6>
        </div>
      </a>
    @endforeach

	</section>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  </body>

</html>
