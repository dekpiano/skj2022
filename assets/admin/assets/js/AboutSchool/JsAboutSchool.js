$(document).ready(function() {
    // Register the image resize module
    Quill.register('modules/imageResize', ImageResize.default);

    const toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{ 'header': 1 }, { 'header': 2 }],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'script': 'sub' }, { 'script': 'super' }],
        [{ 'indent': '-1' }, { 'indent': '+1' }],
        [{ 'direction': 'rtl' }],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'font': [] }],
        [{ 'align': [] }],
        ['clean'],
        ['link', 'image']
    ];

    // Define the modules configuration with image resize
    const editorModules = {
        toolbar: toolbarOptions,
        imageResize: {
            modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
        }
    };

    // Ensure the editor divs exist before initializing
    if ($('#editor_AboutSchool').length && $('#editor_add_about').length) {
        // Editor for the Update form
        const updateEditor = new Quill('#editor_AboutSchool', {
            modules: editorModules,
            theme: 'snow'
        });

        // Editor for the Add modal
        const addEditor = new Quill('#editor_add_about', {
            modules: editorModules,
            theme: 'snow'
        });

        // Fetch and load data for the update form
        const AboutKey = $("#AboutKey").val();
        if (AboutKey) {
            $.post(BASE_URL + "/Admin/AboutSchool/Edit/" + AboutKey, {}, function(data, status) {
                if (data) {
                    $('#update_about_menu').val(data.about_menu);
                    if (data.about_detail) {
                        const delta = updateEditor.clipboard.convert(data.about_detail);
                        updateEditor.setContents(delta, 'silent');
                    }
                }
            }, 'json');
        }

        // Handle Update Form Submission
        $(document).on("submit", "#form-AboutSchool", function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const editorContent = $('#editor_AboutSchool .ql-editor').html();
            formData.set("About_content", editorContent);
            
            $.ajax({
                url: $(this).attr('action'),
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data == 1) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'บันทึกข้อมูลสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'อัปเดตข้อมูลไม่สำเร็จ',
                            text: 'เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง',
                        });
                    }
                }
            });
        });

        // Handle Add Form Submission
        $(document).on("submit", "#form-add-about-school", function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            // Use .set() to ensure there is only one 'About_content' field
            formData.set("About_content", addEditor.root.innerHTML);

            // Also check if the title is empty
            if (!formData.get('about_menu').trim()) {
                Swal.fire({
                    icon: 'error',
                    title: 'ผิดพลาด',
                    text: 'กรุณาใส่หัวข้อ',
                });
                return; // Stop submission
            }

            $.ajax({
                url: $(this).attr('action'),
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'เพิ่มข้อมูลสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            window.location.href = BASE_URL + '/Admin/AboutSchool/Detail/' + data;
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'เพิ่มข้อมูลไม่สำเร็จ',
                            text: 'เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง',
                        });
                    }
                }
            });
        });
    }
});