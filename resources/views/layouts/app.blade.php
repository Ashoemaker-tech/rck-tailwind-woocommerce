<!DOCTYPE html>
<html @php language_attributes();  @endphp >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @head
    <!-- ALpineJs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body <?php body_class('flex flex-col h-screen') ?>>
<?php wp_body_open(); ?>

    <header class="px-4 border shadow-md flex-0 bg-slate-100">
        <div class="max-w-screen-lg mx-auto flex justify-between items-center min-h-[40px]">
            <div class="">
                <a href="<?= home_url() ?>">Logo</a>
            </div>
            <div>
                @menu([
                    'menu' => 'primary',
                    'container' => '',
                    'items_wrap' => '<ul class="flex gap-4">%3$s</ul>',
                ])
            </div>
        </div>
    </header>

    <main class="px-4">
        @yield('content')
    </main>

    <footer class="px-4 py-2 flex-0 bg-slate-100">
        <div class="container mx-auto text-center">
            <p class="text-xs">Currently in <strong><?php echo (IS_VITE_DEVELOPMENT) ? "development" : "production" ?></strong> mode.</p>
        </div>
    </footer>

@footer
@stack('scripts')
</body>
</html>