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

$(document).on("click",".CountReadNews",function() {
    $.post("CountReadNews", {
        Data_View :$(this).attr('data_view'),
        NewsID: $(this).attr('news_id')
    }, function(data, status) {
        console.log(data);

    });
});


let currentPage = 1;
function fetchData(page) {
    $.ajax({
        url: 'News/loadMoreNews', // แก้ไขชื่อ Controller ให้ถูกต้อง
        type: 'GET',
        data: { page: page },
        dataType: 'json',
        success: function(data) {
            const grid = $('#grid');
            data.items.forEach(item => {
                const gridItem = `
                    <div class="grid-item col-lg-4 col-md-4 col-6 grid-item wow fadeInUp" data-wow-delay="0.1s">
                         <div class="blog-item">
                         <img class="img-fluid" src="uploads/news/${item.news_img}" alt="">
                            <div class="blog-text">
                                <a class="h4 mb-0 CountReadNews" data_view="${item.news_view}"
                                    news_id="${item.news_id}"
                                    href="News/Detail/${item.news_id}">${item.news_topic}</a>
                                <div class="breadcrumb">
                                    <a class="breadcrumb-item small" href="#"><i class="fa fa-user me-2"></i>Admin</a>
                                    <a class="breadcrumb-item small" href="#"><i class="fa fa-calendar-alt me-2"></i>
                                        ${item.news_date}
                                    </a>
                                    <a class="breadcrumb-item small" href="#"><i
                                            class="fa fa-eye me-2"></i> ${item.news_view}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                grid.append(gridItem);
            });

            // เริ่ม Masonry ใหม่หลังจากเพิ่มข้อมูล
            grid.masonry('appended', $(gridItem));
        }
    });
}

// const grid = $('#grid').masonry({
//     itemSelector: '.grid-item',
//     columnWidth: '.grid-item',
//     gutter: 10, // ระยะห่างระหว่าง item
//     percentPosition: true // เปิดใช้งานการใช้เปอร์เซ็นต์
// });

fetchData(currentPage); // เรียกข้อมูลครั้งแรก

$('#load-more').on('click', function() {
    currentPage++;
    fetchData(currentPage); // เรียกข้อมูลหน้าถัดไป
});