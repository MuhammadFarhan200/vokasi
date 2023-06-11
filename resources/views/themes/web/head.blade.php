<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @foreach ($themes->stylesheet->where('is_active',true) as $item)
        {!!$item->file!!}
    @endforeach
    <link rel="stylesheet" href="{{ asset('owl-carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/myCss.css') }}">
    <title>{{config('app.name') . ': ' .$title ?? config('app.name')}}</title>
</head>
