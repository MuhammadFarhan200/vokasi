$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content")
    }
});
$(document).ready(() => {
    $(document).on("click", ".page-link.default", (event) => {
        event.preventDefault();
        $(".page-link.default").removeClass("active");
        $(event.currentTarget).parent(".page-link.default").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_list(page);
    });
    $(document).on('click', '.page-link.teaching-frk', function(event) {
        event.preventDefault();
        $(".page-link.teaching").removeClass("active");
        $(event.currentTarget).parent(".page-link.teaching").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_teaching_frk(page);
    });
    $(document).on('click', '.page-link.fpa-frk', function(event) {
        event.preventDefault();
        $(".page-link.fpa").removeClass("active");
        $(event.currentTarget).parent(".page-link.fpa").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_fpa_frk(page);
    });
    $(document).on('click', '.page-link.fpt-frk', function(event) {
        event.preventDefault();
        $(".page-link.fpt").removeClass("active");
        $(event.currentTarget).parent(".page-link.fpt").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_fpt_frk(page);
    });
    $(document).on('click', '.page-link.clp-frk', function(event) {
        event.preventDefault();
        $(".page-link.clp").removeClass("active");
        $(event.currentTarget).parent(".page-link.clp").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_clp_frk(page);
    });
});

function load_teaching_frk(page){
    $.get('/office/frk/teaching?page=' + page, function(result) {
        $('#list_teaching_frk').html(result);
    }, "html");
}
function load_fpa_frk(page){
    $.get('/office/frk/final-project-advisor?page=' + page, function(result) {
        $('#list_fpa_frk').html(result);
    }, "html");
}
function load_fpt_frk(page){
    $.get('/office/frk/final-project-tester?page=' + page, function(result) {
        $('#list_fpt_frk').html(result);
    }, "html");
}
function load_clp_frk(page){
    $.get('/office/frk/college-leadership-position?page=' + page, function(result) {
        $('#list_clp_frk').html(result);
    }, "html");
}
