
<?php $__env->startSection('content'); ?>
    <div class="flex items-center h-full max-w-screen-lg mx-auto place-content-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-black">Hello World!</h1>
            <h2 class="text-xl font-bold text-black">Wordpress Theme rapid development using Vite & Tailwindcss</h2>
            <div class="mt-4 text-md">
                <a class="inline-block px-4 py-1 my-1 text-white bg-purple-700 rounded-lg hover:opacity-90" href="https://vitejs.dev/" target="_blank">ViteJS</a>
                <a class="inline-block px-4 py-1 my-1 text-white bg-green-600 rounded-lg hover:opacity-90" href="https://tailwindcss.com/" target="_blank">TailwindCSS</a>
            </div>
            <?php echo e($message); ?>

            <?php
                echo '<br>'.'Hello from php laravel tags';     
            ?>

            <p class="mt-4 text-sm">To test browser sync in development mode ensure the following:</p>
            <code class="inline-block px-4 py-1 mt-1 text-xs text-left text-gray-200 bg-slate-800">
                <p class="my-2">
                    <span class="block text-gray-500">// define IS_VITE_DEVELOPMENT in functions or wp-config.php</span>
                    define('IS_VITE_DEVELOPMENT', TRUE);
                </p>
                <p class="my-2">
                    <span class="block text-gray-500">// run first time in your <strong>theme folder</strong> (node.js required)</span>
                    npm install
                </p>
                <p class="my-2">
                    <span class="block text-gray-500">// start development & refresh your browser</span>
                    npm run dev
                </p>
            </code>

            <p class="mt-1 text-xs"><a class="hover:underline" href="https://github.com/blonestar/wp-theme-vite-tailwind" target="_blank">More instructions here</a>.</p>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Andrew\Local Sites\river-city-kreations\app\public\wp-content\themes\rivercitykreations\resources\views/front-page.blade.php ENDPATH**/ ?>