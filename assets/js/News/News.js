var page = 1;
var isDataLoading = true;
var isLoading = false;
$(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
        if (isLoading == false) {
            isLoading = true;
            page++;
            if (isDataLoading) {
                load_more(page);
                $('#loader').show();
            }
        }

    }
});

function load_more(page) {
    $.ajax({
        url: "News/loadMoreNews?page=" + page,
        type: "GET",
        dataType: "html",
    }).done(function(data) {
        isLoading = false;
        if (data.length == 0) {
            isDataLoading = false;
            $('#loader').hide();
            return;
        }
        $('#loader').hide();
        $('#main').append(data).show('slow');
    }).fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR.responseText);
    });
}