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