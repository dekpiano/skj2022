var AboutKey = $("#AboutKey").val();

$(window).on("load", function() {
   // console.log(AboutKey);
    $.post("../../../Admin/AboutSchool/Edit/"+AboutKey, {
            AboutKey: AboutKey
            }, function(data, status) {
                //console.log(data.about_detail);
                const delta = EditeAbout.clipboard.convert(data.about_detail)
                EditeAbout.setContents(delta, 'silent');
        
            }, 'json');
});

$(document).on("submit", "#form-AboutSchool", function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append("About_content", EditeAbout.root.innerHTML);
    $.ajax({
        url: $(this).attr('action'),
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
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
            }
            
        }
    });
});