@guest
    @foreach ($themes->javascript->where("is_active",true)->where("is_guest",true) as $item)
        @if($item->is_editable == 1)
            <script type="text/javascript">
                {!!$item->file!!}
            </script>
        @else
            {!!$item->file!!}
        @endif
    @endforeach
@endguest
@auth
    @foreach ($themes->javascript->where("is_active",true)->where("is_auth",true) as $item)
        @if($item->is_editable == 1)
            <script type="text/javascript">
                {!!$item->file!!}
            </script>
        @else
            {!!$item->file!!}
        @endif
    @endforeach
@endauth

<script src="{{ asset("web/js/jquery.js") }}"></script>
<script src="{{ asset("web/js/plugins.js") }}"></script>
<script src="{{ asset("web/js/functions.js") }}"></script>
<script src="{{ asset("web/js/methods.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
<script src="{{ asset("owl-carousel/dist/owl.carousel.min.js") }}"></script>
<script>
    document.addEventListener("swup:contentReplaced", () => {
        $(".menu-item").each(function() {
            let menuLink = $(this).children("a").attr("href");
            let currentUrl = window.location.href;
            let regex = new RegExp(menuLink);
            if (regex.test(currentUrl)) {
                $(this).addClass("current");
            } else {
                $(this).removeClass("current");
            }
        });
        const previousFunction = document.querySelector('script[src="{{ asset("web/js/functions.js") }}"]');
        previousFunction.remove();
        const functionScript = document.createElement('script');
        functionScript.src = "{{ asset('web/js/functions.js') }}";
        document.body.appendChild(functionScript);

        const previousPlugin = document.querySelector('script[src="{{ asset("web/js/plugins.js") }}"]');
        previousPlugin.remove();
        const pluginScript = document.createElement('script');
        pluginScript.src = "{{ asset('web/js/plugins.js') }}";
        document.body.appendChild(pluginScript);
    });

    document.querySelectorAll('#color-white-important *').forEach(function(node) {
        node.style.color = 'white';
    });
    document.querySelectorAll('#color-black-important *').forEach(function(node) {
        node.style.color = 'black';
    });

    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 3,
            loop: false,
            autoplay: true,
            autoplayTimeout: 10000,
            autoplaySpeed: 800,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                700: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content")
        }
    });
    document.getElementById("submit-comment").addEventListener("click", function(event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route("web.send-comment") }}",
            type: "POST",
            data: {
                body: $("input[name=body]").val(),
            },
            success: function(response) {
                if (response.alert == "success") {
                    $("#comment-form").trigger("reset");
                    window.location.reload();
                } else {
                    $("#comment-form").trigger("reset");
                    window.location.reload();
                }
            },
        });
    });

</script>
