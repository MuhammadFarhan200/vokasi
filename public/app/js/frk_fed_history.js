$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content")
    }
});

$(document).ready(() => {
    $(document).on('click', '.page-link.teaching-history', function(event) {
        event.preventDefault();
        $(".page-link.teaching-history").removeClass("active");
        $(event.currentTarget).parent(".page-link.teaching-history").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_teaching_history(page);
    });
    $(document).on('click', '.page-link.fpa-history', function(event) {
        event.preventDefault();
        $(".page-link.fpa-history").removeClass("active");
        $(event.currentTarget).parent(".page-link.fpa-history").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_fpa_history(page);
    });
    $(document).on('click', '.page-link.fpt-history', function(event) {
        event.preventDefault();
        $(".page-link.fpt-history").removeClass("active");
        $(event.currentTarget).parent(".page-link.fpt-history").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_fpt_history(page);
    });
    $(document).on('click', '.page-link.research-history', function(event) {
        event.preventDefault();
        $(".page-link.research-history").removeClass("active");
        $(event.currentTarget).parent(".page-link.research-history").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_research_history(page);
    });
    $(document).on('click', '.page-link.sf-history', function(event) {
        event.preventDefault();
        $(".page-link.sf-history").removeClass("active");
        $(event.currentTarget).parent(".page-link.sf-history").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_sf_history(page);
    });
    $(document).on('click', '.page-link.rd-history', function(event) {
        event.preventDefault();
        $(".page-link.rd-history").removeClass("active");
        $(event.currentTarget).parent(".page-link.rd-history").addClass("active");
        const page = $(event.currentTarget).data("halaman").split("page=")[1];
        load_rd_history(page);
    });
});

function load_teaching_history(page){
    $.get('/office/frk/teaching-history?page=' + page, function(result) {
        $('#list_teaching_history').html(result);
    }, "html");
}
function load_fpa_history(page){
    $.get('/office/frk/final-project-advisor-history?page=' + page, function(result) {
        $('#list_fpa_history').html(result);
    }, "html");
}
function load_fpt_history(page){
    $.get('/office/frk/final-project-tester-history?page=' + page, function(result) {
        $('#list_fpt_history').html(result);
    }, "html");
}
function load_sf_history(page){
    $.get('/office/frk/scientific-work-history?page=' + page, function(result) {
        $('#list_sf_history').html(result);
    }, "html");
}
function load_research_history(page){
    $.get('/office/frk/research-result-history?page=' + page, function(result) {
        $('#list_research_history').html(result);
    }, "html");
}
function load_rd_history(page){
    $.get('/office/frk/result-dev-history?page=' + page, function(result) {
        $('#list_rd_history').html(result);
    }, "html");
}
