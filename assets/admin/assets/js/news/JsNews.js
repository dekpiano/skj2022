$('#myTable').DataTable({
    "columnDefs": [{
        "width": "20%",
        "targets": 0
    }],
    order: [
        [3, 'desc']
    ],
    autoWidth: false,
    columns: [
        { width: '5px' },
        { width: '300px' },
        { width: '50px' },
        { width: '50px' }
    ]
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

$(document).on("click", "#AddFacebook", function() {
    var myModal = new bootstrap.Modal(document.getElementById("ModalAddNewsFromFacebook"), {});
    myModal.show();
    
    $.post('../Admin/News/View/Facebook',function(data){
        data = JSON.parse( data );

        $.each(data['data'], function (i, item) {
            if(item.message){
                $('#sel_NewsFromFacebook').append($('<option>', { 
                    value: item.id,
                    text : item.message.substr(0, 50)
                }));
            }
            
        });
            
    },'json');
});

$(document).on("change", "#sel_NewsFromFacebook", function() {

    $.post('../Admin/News/Select/Facebook',{KeyNewsFB:$(this).val()},function(data){
        data = JSON.parse( data );
        var formattedDateTime = convertISOToDateTimeInput(data.created_time);
        $('#news_topic_facebook').val(data.message.substr(0, 100));
        $('#news_date_facebook').val(formattedDateTime);
        $('#blah_facebook').attr('src',data.full_picture)
        const delta = quill.clipboard.convert(data.message);
        quillFacebook.setContents(delta, 'silent');

       // console.log(data);

    },'json');
});

$(document).on("submit", "#form-news-feacbook", function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append("news_content_facebook", quillFacebook.root.innerHTML);
    formData.append("news_img_facebook", $('#blah_facebook').attr('src'));

     // ปุ่ม submit
    const $btn = $('#btn-submit-news-facebook');
    $btn.prop('disabled', true);
    $btn.find('.spinner-border').removeClass('d-none');
    $btn.find('.btn-text').text('กำลังบันทึก...');

    $.ajax({
        url: $('#form-news-feacbook').attr('action'),
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
            console.log(data);
            $('#ModalAddNewsFromFacebook').hide();
            $('.modal-backdrop').remove();
            if (data) {
                // คืนปุ่มเป็นปกติ
            $btn.prop('disabled', false);
            $btn.find('.spinner-border').addClass('d-none');
            $btn.find('.btn-text').text('บันทึก');

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
                    (data && data.message) ? data.message : 'บันทึกข้อมูลไม่สำเร็จ!',
                    'error'
                );
            }
        },
        error: function (jqXHR, exception) {
            $btn.prop('disabled', false);
            $btn.find('.spinner-border').addClass('d-none');
            $btn.find('.btn-text').text('บันทึก');

            Swal.fire(
                'เกิดข้อผิดพลาด!',
                jqXHR.responseText || 'ไม่สามารถเชื่อมต่อกับเซิร์ฟเวอร์ได้',
                'error'
            );
        }
    });
});


function convertISOToDateTimeInput(isoDate) {
    var date = new Date(isoDate);

    // ดึงค่า ปี, เดือน, วัน
    var year = date.getFullYear();
    var month = date.getMonth() + 1; // เดือนใน JavaScript เริ่มจาก 0
    var day = date.getDate();

    // ดึงค่า ชั่วโมง และ นาที
    var hours = date.getHours();
    var minutes = date.getMinutes();

    // ตรวจสอบให้เดือน, วัน, ชั่วโมง, นาทีมี 2 หลักเสมอ
    if (month < 10) month = '0' + month;
    if (day < 10) day = '0' + day;
    if (hours < 10) hours = '0' + hours;
    if (minutes < 10) minutes = '0' + minutes;

    // คืนค่าที่เป็น 'ปี-เดือน-วันTHH:MM'
    return year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
}
