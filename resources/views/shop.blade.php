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
                    <p class="text-sm text-gray-500">Showing {{ wp_count_posts('product')->publish }} products</p>
                </div>

                <div>
                  <form 
                  x-data="{ 
                    orderby: '{{ $orderby }}',
                    handleSubmit() {
                        const form = document.querySelector('.woocommerce-ordering-form');
                        const orderby = form.elements.orderby.value;
                        const url = new URL(window.location.href);
                        const searchParams = new URLSearchParams(url.search);

                        searchParams.set('orderby', orderby);
                        searchParams.set('paged', '1');
                        url.search = searchParams.toString();
                        
                        window.location.href = url.href;
                    } 
                    }"
                   class="woocommerce-ordering-form"  x-on:change="handleSubmit">
                        <label for="orderby">{{ __('Sort by:', 'woocommerce') }}</label>
                        <select name="orderby" class="orderby" x-model="orderby">
                            @foreach ($catalog_orderby_options as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="paged" value="1" />
                        {{ wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')) }}
                    </form>
                </div>
            </div>
            <ul class="grid gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-4">
                @if ($products)
                    @foreach ($products as $product)
                        <li>
                            <a href="{{ get_permalink($product->get_id()) }}" class="relative block overflow-hidden group">
                                @if ($product->is_on_sale())
                                    <span class="absolute end-2 top-2 z-10 bg-yellow-400 px-3 py-1.5 text-xs font-medium">
                                        Sale
                                    </span>
                                @endif
                                {!! $product->get_image() !!}
                                <div class="relative p-6 bg-white border border-gray-100 shadow">
                                    <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $product->get_name() }}</h3>
                                    @include('partials.product-price') 
                                    @if ($product->is_type('simple'))
                                      <form class="mt-4"  method="post" action="{{ esc_url( wc_get_cart_url() ) }}">
                                        @php wp_nonce_field( 'add_to_cart', 'woocommerce_add_to_cart_nonce' ); @endphp
                                        <input type="hidden" name="add-to-cart" value="{{ $product->get_id() }}">
                                        <button
                                            class="block w-full p-4 text-sm font-medium transition bg-yellow-400 rounded add-to-cart-button hover:scale-105">
                                            Add to Cart
                                        </button>
                                      </form>
                                    @else
                                        <a href="{{ get_permalink($product->get_id()) }}"
                                            class="block w-full p-4 mt-4 text-sm font-medium text-center transition bg-yellow-400 rounded view-cart-button hover:scale-105">
                                            View Product
                                        </a>
                                    @endif
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