document.addEventListener('DOMContentLoaded', function() {

    // Toggle Sidebar
    $('[data-toggle="sidebar"]').click(function(event) {
        event.preventDefault();
        $('.app').toggleClass('sidenav-toggled');
    });

    //Activate bootstrip tooltips
    $("[data-toggle='tooltip']").tooltip();

    $(".metismenu").metisMenu();

    $(".app-sidebar a").each(function() {
        var pageUrl = window.location.href.split(/[?#]/)[0];
        if (this.href == pageUrl) {
            $(this).addClass("active");
            $(this).parent().addClass("active"); // add active to li of the current link                 
            $(this).parent().parent().addClass("in");
            $(this).parent().parent().addClass("mm-show");
            $(this).parent().parent().parent().addClass("mm-active");
            $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
            $(this).parent().parent().parent().addClass("active");
            $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link                
            $(this).parent().parent().parent().parent().parent().addClass("mm-active");
            var menu = $(this).closest('.main-icon-menu-pane').attr('id');
            $("a[href='#" + menu + "']").addClass('active');

        }
    });

    function initFeatherIcon() {
        feather.replace()
    }

    function init() {
        initFeatherIcon();
    }

    init();


});