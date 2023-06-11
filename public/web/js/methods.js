const options = {
    containers: [".cms_web"],
    doScrollingRightAway: true,
    animateHistoryBrowsing: true,
    animationSelector: "[class=cms_web]",
    linkSelector: ".menu-link:not([data-no-swup]), .menu-item:not([data-no-swup]), .nav-link:not([data-no-swup])",
};
const swup = new Swup(options);
document.addEventListener("swup:contentReplaced", () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
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
            url: "/send-comment",
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

    $(`#filter-category`).change(function() {
        category = $(this).val();
        var dosen_id = $(`#dosen_id`).val();
        var card = $(`#card-teaching-mentoring`);
        card.empty();
        filterTeachingMentoring(category, dosen_id);
    });

    function filterTeachingMentoring(category, dosen_id) {
        var x = $("#card-pengajaran");
        var xHieght = x.outerHeight();
        $.ajax({
            url: "/teaching-mentoring-filter",
            method: `GET`,
            data: {
                category: category,
                dosen_id: dosen_id
            },
            dataType: `json`,
            success: function(response) {
                if (response.status === `success`) {
                    $(`#card-teaching-mentoring .card`).remove();
                    response.data.forEach(function(item, index) {
                        var cardHtml = `<div class="card rounded-6 my-shadow border-0 mt-3 ` + (index === response.data.length - 1 ? `mb-3` : ``) + `">` +
                            `<div class="card-body">` +
                            `<span class="text-uppercase fw-light" style="font-size: 12px">` + item.category + `</span>` +
                            `<div class="fw-semibold" style="font-size: 17px; text-transform: capitalize">` + item.title + `</div>` +
                            `<div class="text-muted">` + item.year + `</div>` +
                            `<div class="text-muted">` + (item.student_name ? `Mahasiswa: ` + item.student_name : ``) + `</div>` +
                            `</div>` +
                            `</div>`;

                        $(`#card-teaching-mentoring`).append(cardHtml);
                    });
                    var xNewHeight = x.outerHeight();
                    x.css(`height`, xHieght);
                    x.animate({
                        height: xNewHeight
                    }, 300, function() {
                        x.css(`height`, `auto`);
                    });
                } else {
                    var message = `<span class="text-muted fw-light">Belum ada pengajaran dan pembimbingan yang ditambahkan</span>`;
                    $(`#card-teaching-mentoring`).append(message);
                    var xNewHeight = x.outerHeight();
                    x.css(`height`, xHieght);
                    x.animate({
                        height: xNewHeight
                    }, 300, function() {
                        x.css(`height`, `auto`);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
});
