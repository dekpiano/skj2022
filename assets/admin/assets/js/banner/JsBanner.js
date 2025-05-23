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

$(document).on("click", ".Editbanner", function() {
    var myModal = new bootstrap.Modal(document.getElementById("ModalEditbanner"), {});
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


// $(document).on("submit", "#form-banner", function(e) {
//     e.preventDefault();
//     const formData = new FormData(this);
//     //formData.append("news_content", quill.root.innerHTML);
//     $.ajax({
//         url: $(this).attr('action'),
//         type: "post",
//         data: formData,
//         processData: false,
//         contentType: false,
//         cache: false,
//         async: false,
//         success: function(data) {
//             console.log(data);
//             $('#ModalAddBanner').hide();
//             $('.modal-backdrop').remove();
//             if (data == 1) {
//                 Swal.fire({
//                     position: 'top-end',
//                     icon: 'success',
//                     title: 'บันทึกข้อมูลสำเร็จ',
//                     showConfirmButton: false,
//                     timer: 3000
//                 }).then((result) => {
//                     if (result.dismiss === Swal.DismissReason.timer) {
//                         window.location.reload();
//                     }
//                 })
//             } else {
//                 Swal.fire(
//                     'แจ้งเตือน!',
//                     data + '!',
//                     'error'
//                 )
//             }
//         }
//     });
// });

$(document).on("click", ".Deletebanner", function() {
    let bannerID = $(this).attr('key-bannerid');
    Swal.fire({
        title: 'คุณต้องการลบข้อมูลหรือไม่?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ลบเลย!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../Admin/banner/DeleteBanner', {
                    KeyBannerid: bannerID
                },
                function(data) {
                    $('#myTable tr#' + bannerID).remove();
                    if (data == 1) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'ลบรูปภาพสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            );

        }
    })


});

Dropzone.autoDiscover = false; // สำคัญ! ป้องกันซ้อน

const myBannerDropzone = new Dropzone("#bannerDropzone", {
    url: "../Admin/banner/Addbanner",
    paramName: "banner_img", // ชื่อ field ฝั่ง backend
    maxFiles: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    dictDefaultMessage: "ลากรูปภาพมาวาง หรือคลิกเลือกไฟล์",
    autoProcessQueue: false, // รอ trigger ด้วย JS (จะได้ submit ข้อมูลอื่นไปด้วย)
    thumbnailWidth: 900,     // ขนาดใหญ่ตาม zone ที่ต้องการ
    thumbnailHeight: 360,
    thumbnailMethod: "contain",
    init: function() {
        const dz = this;
        // ดัก submit ของ modal ฟอร์ม
        $('#form-banner').on('submit', function(e) {
            e.preventDefault();
             if (!$('#banner_name').val().trim() || !$('#banner_date').val().trim() || dz.getQueuedFiles().length === 0) {
                alert('กรุณากรอกข้อมูลให้ครบ');
                return;
            }
            dz.processQueue(); // เริ่ม upload!
        });

        dz.on("sending", function(file, xhr, formData) {
            // ดึงข้อมูล input อื่น ๆ จาก modal ส่งไปพร้อมไฟล์
            formData.append('banner_name', $('#banner_name').val());
            formData.append('banner_linkweb', $('#banner_linkweb').val());
            formData.append('banner_date', $('#banner_date').val());
        });

        dz.on("success", function(file, response) {
            if (response.status) {
                // รีเซ็ตฟอร์มและ Dropzone
                $('#form-banner')[0].reset();
                dz.removeAllFiles();
                $('#ModalAddBanner').modal('hide');
                Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'บันทึกรูปภาพสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500); // รอ 2 วินาทีแล้ว reload
                // reload table/banner list ถ้ามี
            } else {
                alert('บันทึกไม่สำเร็จ: ' + response.message);
            }
        });

        $('#bannerDropzone .dz-message').html(`
          <svg width="48" height="48" fill="#007bff" viewBox="0 0 24 24" style="margin-bottom:8px;">
            <path d="M12 16a1 1 0 0 1-1-1V7.83l-2.59 2.58a1 1 0 0 1-1.42-1.42l4.3-4.29a1 1 0 0 1 1.42 0l4.3 4.29a1 1 0 0 1-1.42 1.42L13 7.83V15a1 1 0 0 1-1 1zm-7 2a1 1 0 1 1 0-2h14a1 1 0 1 1 0 2H5z"/>
          </svg>
          <br>
          <span>ลากรูปภาพมาวาง หรือคลิกเพื่อเลือกรูป</span>
        `);

        dz.on("error", function(file, errorMessage, xhr) {
            alert('เกิดข้อผิดพลาด: ' + errorMessage);
        });

        // ปิด modal แล้ว reset Dropzone ด้วย
        $('#ModalAddBanner').on('hidden.bs.modal', function () {
            dz.removeAllFiles();
        });
    }
});