<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @foreach ($themes->stylesheet->where('is_active',true) as $item)
        {!!$item->file!!}
    @endforeach
    <link rel="stylesheet" href="{{ asset('owl-carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/myCss.css') }}">
    <title>{{config('app.name') . ': ' .$title ?? config('app.name')}}</title>
    <style>
        .cms_web {
            opacity: 1;
            transition-duration: 0.3s;
        }

        html.is-animating .cms_web {
            opacity: 0;
        }
    </style>
</head>
