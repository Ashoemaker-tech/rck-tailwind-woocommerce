@extends('layouts.app')
@section('content')
    <!--
  This component uses @tailwindcss/forms and @tailwindcss/typography

  yarn add @tailwindcss/forms @tailwindcss/typography
  npm install @tailwindcss/forms @tailwindcss/typography

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]

  @layer components {
    .no-spinner {
      -moz-appearance: textfield;
    }

    .no-spinner::-webkit-outer-spin-button,
    .no-spinner::-webkit-inner-spin-button {
      margin: 0;
      -webkit-appearance: none;
    }
  }
-->

<section>
  <div class="relative max-w-screen-xl px-4 py-8 mx-auto">
    <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-2">
      <div class="grid grid-cols-2 gap-4 md:grid-cols-1" 
      @php
            $gallery_image_ids = $product->get_gallery_image_ids();
            $mainImageId = $product->get_image_id();
            $mainImageUrl = wp_get_attachment_image_src($mainImageId, 'large')[0];
        @endphp
      x-data="{ 
        defaultImage: '{{ $mainImageUrl }}', 
        mainImage: '{{ $mainImageUrl }}',
        images: [@php $gallery_image_ids @endphp ],
        getImageUrl(imageId) {
            url = `{{ wp_get_attachment_image_url('', 'large') }}${imageId}`;
            console.log(this.mainImage)
        }
        }">
        <img
            src="{{ wp_get_attachment_image_url($image_id, 'large') }}"
            alt="{{ get_post_meta($product->get_image_id(), '_wp_attachment_image_alt', true) }}"
            x-bind:src="mainImage"
        >
            
            @if (!empty($gallery_image_ids))
                <ul class="flex gap-1 mt-1">
                    <template x-if="mainImage !== defaultImage">
                        <li class="w-20 h-20">
                            <img
                            x-bind:src="defaultImage"
                            alt="{{ get_post_meta($image_id, '_wp_attachment_image_alt', true) }}"
                            class="cursor-pointer"
                            @click="mainImage = '{{ $mainImageUrl }}'" />
                        </li>
                    </template>
                @foreach ($gallery_image_ids as $image_id)
                <li class="w-20 h-20">
                    @php
                       $current_image = wp_get_attachment_image_url($image_id, 'large');       
                    @endphp
                    <img
                    src="{{ $current_image }}"
                    alt="{{ get_post_meta($image_id, '_wp_attachment_image_alt', true) }}"
                    class="cursor-pointer"
                    @click="mainImage = '{{ $current_image }}'" />
                </li>
                @endforeach
                </ul>

            @endif
      </div>

      <div class="sticky top-0">
        <strong
          class="rounded-full border border-blue-600 bg-gray-100 px-3 py-0.5 text-xs font-medium tracking-wide text-blue-600"
        >
          Pre Order
        </strong>

        <div class="flex justify-between mt-8">
          <div class="max-w-[35ch] space-y-2">
            <h1 class="text-xl font-bold sm:text-2xl">
              Fun Product That Does Something Cool
            </h1>

            <p class="text-sm">Highest Rated Product</p>

            <div class="-ms-0.5 flex">
              <svg
                class="w-5 h-5 text-yellow-400"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>

              <svg
                class="w-5 h-5 text-yellow-400"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>

              <svg
                class="w-5 h-5 text-yellow-400"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>

              <svg
                class="w-5 h-5 text-yellow-400"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>

              <svg
                class="w-5 h-5 text-gray-200"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
            </div>
          </div>

          <p class="text-lg font-bold">$119.99</p>
        </div>

        <div class="mt-4">
          <div class="prose max-w-none">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa
              veniam dicta beatae eos ex error culpa delectus rem tenetur,
              architecto quam nesciunt, dolor veritatis nisi minus inventore,
              rerum at recusandae?
            </p>
          </div>

          <button class="mt-2 text-sm font-medium underline">Read More</button>
        </div>

        <form class="mt-8">
          <fieldset>
            <legend class="mb-1 text-sm font-medium">Color</legend>

            <div class="flex flex-wrap gap-1">
              <label for="color_tt" class="cursor-pointer">
                <input
                  type="radio"
                  name="color"
                  id="color_tt"
                  class="sr-only peer"
                />

                <span
                  class="inline-block px-3 py-1 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white"
                >
                  Texas Tea
                </span>
              </label>

              <label for="color_fr" class="cursor-pointer">
                <input
                  type="radio"
                  name="color"
                  id="color_fr"
                  class="sr-only peer"
                />

                <span
                  class="inline-block px-3 py-1 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white"
                >
                  Fiesta Red
                </span>
              </label>

              <label for="color_cb" class="cursor-pointer">
                <input
                  type="radio"
                  name="color"
                  id="color_cb"
                  class="sr-only peer"
                />

                <span
                  class="inline-block px-3 py-1 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white"
                >
                  Cobalt Blue
                </span>
              </label>
            </div>
          </fieldset>

          <fieldset class="mt-4">
            <legend class="mb-1 text-sm font-medium">Size</legend>

            <div class="flex flex-wrap gap-1">
              <label for="size_xs" class="cursor-pointer">
                <input
                  type="radio"
                  name="size"
                  id="size_xs"
                  class="sr-only peer"
                />

                <span
                  class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white"
                >
                  XS
                </span>
              </label>

              <label for="size_s" class="cursor-pointer">
                <input
                  type="radio"
                  name="size"
                  id="size_s"
                  class="sr-only peer"
                />

                <span
                  class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white"
                >
                  S
                </span>
              </label>

              <label for="size_m" class="cursor-pointer">
                <input
                  type="radio"
                  name="size"
                  id="size_m"
                  class="sr-only peer"
                />

                <span
                  class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white"
                >
                  M
                </span>
              </label>

              <label for="size_l" class="cursor-pointer">
                <input
                  type="radio"
                  name="size"
                  id="size_l"
                  class="sr-only peer"
                />

                <span
                  class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white"
                >
                  L
                </span>
              </label>

              <label for="size_xl" class="cursor-pointer">
                <input
                  type="radio"
                  name="size"
                  id="size_xl"
                  class="sr-only peer"
                />

                <span
                  class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white"
                >
                  XL
                </span>
              </label>
            </div>
          </fieldset>

          <div class="flex gap-4 mt-8">
            <div>
              <label for="quantity" class="sr-only">Qty</label>

              <input
                type="number"
                id="quantity"
                min="1"
                value="1"
                class="w-12 rounded border-gray-200 py-3 text-center text-xs [-moz-appearance:_textfield] [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none"
              />
            </div>

            <button
              type="submit"
              class="block px-5 py-3 text-xs font-medium text-white bg-green-600 rounded hover:bg-green-500"
            >
              Add to Cart
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection