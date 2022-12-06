$('#myTable').DataTable({
    "columnDefs": [{
        "width": "20%",
        "targets": 0
    }],
    order: [
        [3, 'desc']
    ],
});
$(document).on("click", "#AddNews", function() {
    var myModal = new bootstrap.Modal(document.getElementById("ModalAddNews"), {});
    myModal.show();
});

$(document).on("click", ".EditNews", function() {
    var myModal = new bootstrap.Modal(document.getElementById("ModalEditNews"), {});
    myModal.show();


    $.post("../Admin/News/EditNews", {
        KeyNewsid: $(this).attr('key-newsid')
    }, function(data, status) {
        console.log(data[0].news_topic);
        $('#edit_news_id').val(data[0].news_id);
        $('#edit_news_topic').val(data[0].news_topic);
        $('#edit_news_date').val(data[0].news_dateNews);
        $('#edit_news_category').val(data[0].news_category);
        $('#edit_blah').attr('src', '../uploads/news/' + data[0].news_img);
        const delta = quill.clipboard.convert(data[0].news_content)
        Editquill.setContents(delta, 'silent');

    }, 'json');
});


$(document).on("submit", "#form-news", function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append("news_content", quill.root.innerHTML);
    $.ajax({
        url: $('#form-news').attr('action'),
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
            console.log(data);
            $('#ModalAddNews').hide();
            $('.modal-backdrop').remove();
            if (data == 1) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'บันทึกข้อมูลสำเร็จ',
                    showConfirmButton: false,
                    timer: 3000
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.reload();
                    }
                })
            } else {
                Swal.fire(
                    'แจ้งเตือน!',
                    data + '!',
                    'error'
                )
            }
        }
    });
});

$(document).on("submit", "#form-update-news", function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append("edit_news_content", Editquill.root.innerHTML);
    $.ajax({
        url: $('#form-update-news').attr('action'),
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
            //console.log(data);
            $('#ModalEditNews').hide();
            $('.modal-backdrop').remove();
            if (data == 1) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'บันทึกข้อมูลสำเร็จ',
                    showConfirmButton: false,
                    timer: 3000
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        //  window.location.reload();

                    }
                })
            }
        }
    });
});

$(document).on("click", ".DeleteNews", function() {
    let newsid = $(this).attr('key-newsid');
    Swal.fire({
        title: 'แจ้งเตือน?',
        text: "ต้องการลบข้อมูลข่าวหรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../Admin/News/DeleteNews", {
                KeyNewsid: $(this).attr('key-newsid')
            }, function(data, status) {
                console.log(data);
                if (data == 1) {
                    $('#' + newsid).remove();
                }
            });
        }
    })

});