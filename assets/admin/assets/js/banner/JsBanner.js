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
        { width: '5px' },
        { width: '200px' },
        { width: '300px' },
        { width: '50px' }
    ]
});

$(document).on("click", "#AddBanner", function() {
    var myModal = new bootstrap.Modal(document.getElementById("ModalAddBanner"), {});
    myModal.show();
});

$(document).on("click", 'input[type="checkbox"]', function() {
    var status;
    if ($(this).is(":checked")) {
        status = "on";
    } else if ($(this).is(":not(:checked)")) {
        status = "off";
    }

    $.ajax({
        type: "POST",
        url: "../Admin/Banner/BannerOnoff",
        data: {
            Onoffstatus: status,
            Keystatus: $(this).attr('status-key')
        },
        success: function(msg) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'เปลี่ยนแปลงข้อมูลเรียบร้อย',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.responseText);
        }
    });

});


$(document).on("submit", "#form-banner", function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    //formData.append("news_content", quill.root.innerHTML);
    $.ajax({
        url: $(this).attr('action'),
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
            console.log(data);
            // $('#ModalAddNews').hide();
            // $('.modal-backdrop').remove();
            // if (data == 1) {
            //     Swal.fire({
            //         position: 'top-end',
            //         icon: 'success',
            //         title: 'บันทึกข้อมูลสำเร็จ',
            //         showConfirmButton: false,
            //         timer: 3000
            //     }).then((result) => {
            //         if (result.dismiss === Swal.DismissReason.timer) {
            //             window.location.reload();
            //         }
            //     })
            // } else {
            //     Swal.fire(
            //         'แจ้งเตือน!',
            //         data + '!',
            //         'error'
            //     )
            // }
        }
    });
});