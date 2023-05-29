@php
    $is_on_sale = $product->is_on_sale();
    $product_type = $product->get_type();
@endphp
@if ($is_on_sale && ($product_type === 'variable' || $product_type === 'grouped'))
    @php
        if ($product_type === 'variable') {
            $variations = $product->get_available_variations();
            $min_price = min(array_column($variations, 'display_price'));
            $max_price = max(array_column($variations, 'display_price'));
            $price_range = '$' . $min_price . ' - ' . '$' . $max_price;
        } else {
            $child_products = $product->get_children();
            $prices = [];
        
            foreach ($child_products as $child_id) {
                $child_product = wc_get_product($child_id);
                $prices[] = $child_product->get_price();
            }
        
            $min_price = min($prices);
            $max_price = max($prices);
            $price_range = '$' . $min_price . ' - ' . '$' . $max_price;
        }
    @endphp
    <span class="mt-1.5 text-sm text-gray-700">{{ $price_range }}</span>
@elseif($is_on_sale)
    <span class="mt-1.5 text-sm text-gray-400">$<s>{{ $product->get_regular_price() }}</s></span>
    <span class="mt-1.5 text-sm text-gray-700">${{ $product->get_sale_price() }}</span>
@else
    @switch($product_type)
        @case('variable')
            @php
                $variations = $product->get_available_variations();
                $min_price = min(array_column($variations, 'display_price'));
                $max_price = max(array_column($variations, 'display_price'));
            @endphp
            <span class="mt-1.5 text-sm text-gray-700">${{ $min_price }} - ${{ $max_price }}</span>
        @break

        @case('grouped')
            @php
                $child_products = $product->get_children();
                $prices = [];
                
                foreach ($child_products as $child_id) {
                    $child_product = wc_get_product($child_id);
                    $prices[] = $child_product->get_price();
                }
                
                $min_price = min($prices);
                $max_price = max($prices);
            @endphp
            <span class="mt-1.5 text-sm text-gray-700">{{ $min_price }} -
                {{ $max_price }}</span>
        @break

        @case('simple')
            <p class="mt-1.5 text-sm text-gray-700">${{ $product->get_price() }}</p>
        @break

        @default
            <p class="mt-1.5 text-sm text-gray-700">${{ $product->get_price() }}</p>
    @endswitch
@endif

