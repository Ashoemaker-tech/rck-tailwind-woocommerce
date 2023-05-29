@extends('layouts.app')
@section('content')
<section>
  <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
    <header>
      <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
        Product Collection
      </h2>

      <p class="max-w-md mt-4 text-gray-500">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque
        praesentium cumque iure dicta incidunt est ipsam, officia dolor fugit
        natus?
      </p>
    </header>

    <div class="flex items-center justify-between mt-8">
      <div class="mt-8">
        <p class="text-sm text-gray-500">Showing {{ wp_count_posts('product')->publish; }} products</p>
      </div>

      <div>
        <label for="orderby">{{ __('Sort by:', 'woocommerce') }}</label>
            <select name="orderby" class="orderby">
                @foreach ($catalog_orderby_options as $value => $label)
                    <option value="{{ $value }}" {{ selected($orderby, $value) }}>{{ $label }}</option>
                @endforeach
            </select>
      </div>
    </div>
    <ul class="grid gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-4"> 
        @if ($products)
            @foreach($products as $product)
            <li>
                <a href="{{ get_permalink($product->get_id()) }}" class="relative block overflow-hidden group">
                    @if ($product->is_on_sale())
                        <span
                        class="absolute end-2 top-2 z-10 bg-yellow-400 px-3 py-1.5 text-xs font-medium"
                        >
                        Sale
                        </span>
                    @endif
                    {!! $product->get_image() !!}
                    <div class="relative p-6 bg-white border border-gray-100 shadow">
                        
                        <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $product->get_name() }}</h3>
                        @if ($product->is_on_sale())
                        <span class="mt-1.5 text-sm text-gray-700">$<s>{{ $product->get_regular_price() }}</s></span>
                        <span class="mt-1.5 text-sm text-gray-700">${{ $product->get_sale_price() }}</span>
                        @else
                        <p class="mt-1.5 text-sm text-gray-700">${{ $product->get_regular_price() }}</p>
                        @endif
                        <form class="mt-4">
                            @if ($product->is_type('simple'))
                                <button
                            class="block w-full p-4 text-sm font-medium transition bg-yellow-400 rounded add-to-cart-button hover:scale-105"
                        >
                            @elseif ($product->is_type('variable'))
                                <a href="{{ get_permalink($product->get_id()) }}" class="block w-full p-4 text-sm font-medium transition bg-yellow-400 rounded view-cart-button hover:scale-105">View Product</a>
                            @endif
                        
                            Add to Cart
                        </button>
                        </form>
                    </div>
                    </a>
            </li>
            @endforeach
        @else
            @include('partials.not-found')
        @endif
    </ul>
  </div>
</section>
@endsection