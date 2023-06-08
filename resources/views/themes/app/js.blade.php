@guest
    @foreach ($themes->javascript->where('is_active',true)->where('is_guest',true) as $item)
        @if($item->is_editable == 1)
            <script type="text/javascript">
                {!!$item->file!!}
            </script>
        @else
            {!!$item->file!!}
        @endif
    @endforeach
    <script src="{{ asset('app/js/frk_fed_history.js') }}"></script>
@endguest
@auth
    @foreach ($themes->javascript->where('is_active',true)->where('is_auth',true) as $item)
        @if($item->is_editable == 1)
            <script type="text/javascript">
                {!!$item->file!!}
            </script>
        @else
            {!!$item->file!!}
        @endif
    @endforeach
    <script src="{{ asset('app/js/frk_fed_history.js') }}"></script>
@endauth
<script src="{{ asset('app/js/myScript.js') }}"></script>
<script src="{{ asset('app/js/frk_methods.js') }}"></script>
