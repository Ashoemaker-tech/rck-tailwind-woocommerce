
<?php $__env->startSection('content'); ?>
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
        <p class="text-sm text-gray-500">Showing <?php echo e(wp_count_posts('product')->publish); ?> products</p>
      </div>

      <div>
        <label for="orderby"><?php echo e(__('Sort by:', 'woocommerce')); ?></label>
            <select name="orderby" class="orderby">
                <?php $__currentLoopData = $catalog_orderby_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value); ?>" <?php echo e(selected($orderby, $value)); ?>><?php echo e($label); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
      </div>
    </div>
    <ul class="grid gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-4"> 
        <?php if($products): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e(get_permalink($product->get_id())); ?>" class="relative block overflow-hidden group">
                    <?php if($product->is_on_sale()): ?>
                        <span
                        class="absolute end-2 top-2 z-10 bg-yellow-400 px-3 py-1.5 text-xs font-medium"
                        >
                        Sale
                        </span>
                    <?php endif; ?>
                    <?php echo $product->get_image(); ?>

                    <div class="relative p-6 bg-white border border-gray-100 shadow">
                        
                        <h3 class="mt-4 text-lg font-medium text-gray-900"><?php echo e($product->get_name()); ?></h3>
                        <?php if($product->is_on_sale()): ?>
                        <span class="mt-1.5 text-sm text-gray-700">$<s><?php echo e($product->get_regular_price()); ?></s></span>
                        <span class="mt-1.5 text-sm text-gray-700">$<?php echo e($product->get_sale_price()); ?></span>
                        <?php else: ?>
                        <p class="mt-1.5 text-sm text-gray-700">$<?php echo e($product->get_regular_price()); ?></p>
                        <?php endif; ?>
                        <form class="mt-4">
                            <?php if($product->is_type('simple')): ?>
                                <button
                            class="block w-full p-4 text-sm font-medium transition bg-yellow-400 rounded add-to-cart-button hover:scale-105"
                        >
                            <?php elseif($product->is_type('variable')): ?>
                                <a href="<?php echo e(get_permalink($product->get_id())); ?>" class="block w-full p-4 text-sm font-medium transition bg-yellow-400 rounded view-cart-button hover:scale-105">View Product</a>
                            <?php endif; ?>
                        
                            Add to Cart
                        </button>
                        </form>
                    </div>
                    </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo $__env->make('partials.not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </ul>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Andrew\Local Sites\river-city-kreations\app\public\wp-content\themes\rivercitykreations\resources\views/shop.blade.php ENDPATH**/ ?>