<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/popper/popper.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/js/bootstrap.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="<?=base_url()?>/assets/admin/assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Vendors JS -->
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/datatables/datatables-bootstrap5.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/datatables/datatables.responsive.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/datatables/responsive.bootstrap5.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/datatables/datatables.checkboxes.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/datatables/datatables-buttons.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/datatables/buttons.bootstrap5.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/datatables/buttons.html5.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/datatables/buttons.print.js"></script>
<!-- Main JS -->
<script>
    const BASE_URL = "<?= base_url() ?>";
</script>
<script src="<?=base_url()?>/assets/admin/assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?=base_url()?>/assets/admin/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://unpkg.com/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);
</script>

<!-- Initialize Quill editor -->
<script>
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{'header': 1}, {'header': 2}],
        [{'list': 'ordered'}, {'list': 'bullet'}],
        [{'script': 'sub'}, {'script': 'super'}],
        [{'indent': '-1'}, {'indent': '+1'}],
        [{'direction': 'rtl'}],
        [{'size': ['small', false, 'large', 'huge']}],
        [{'header': [1, 2, 3, 4, 5, 6, false]}],
        [{'color': []}, {'background': []}],
        [{'font': []}],
        [{'align': []}],
        ['clean'],
        ['link', 'image']
    ];

    var quill = new Quill('#editor', {
        modules: { toolbar: toolbarOptions },
        theme: 'snow'
    });

    var quillFacebook = new Quill('#editor_facebook', {
        modules: { toolbar: toolbarOptions },
        theme: 'snow'
    });

    var Editquill = new Quill('#editor_update', {
        modules: { toolbar: toolbarOptions },
        theme: 'snow'
    });

</script>

<?php if($uri->getSegment(2) == 'News') : ?>
<script src="<?=base_url()?>/assets/admin/assets/js/news/JsNews.js?v=20"></script>
<?php endif; ?>
<?php if($uri->getSegment(2) == 'Banner') : ?>
<script src="<?=base_url()?>/assets/admin/assets/js/banner/JsBanner.js?v=5"></script>
<?php endif; ?>
<?php if($uri->getSegment(2) == 'AboutSchool') : ?>
<script src="<?=base_url()?>/assets/admin/assets/js/AboutSchool/JsAboutSchool.js?v=4"></script>
<?php endif; ?>

</body>

<!-- Initialize Quill editor -->
<script>
    


(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
$("#news_img").change(function() {
    readURL(this);
});
$("#banner_img").change(function() {
    readURL(this);
});

function edit_readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#edit_blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
$("#edit_news_img").change(function() {
    edit_readURL(this);
});



var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'], // toggled buttons
    ['blockquote', 'code-block'],

    [{
        'header': 1
    }, {
        'header': 2
    }], // custom button values
    [{
        'list': 'ordered'
    }, {
        'list': 'bullet'
    }],
    [{
        'script': 'sub'
    }, {
        'script': 'super'
    }], // superscript/subscript
    [{
        'indent': '-1'
    }, {
        'indent': '+1'
    }], // outdent/indent
    [{
        'direction': 'rtl'
    }], // text direction

    [{
        'size': ['small', false, 'large', 'huge']
    }], // custom dropdown
    [{
        'header': [1, 2, 3, 4, 5, 6, false]
    }],

    [{
        'color': []
    }, {
        'background': []
    }], // dropdown with defaults from theme
    [{
        'font': []
    }],
    [{
        'align': []
    }],

    ['clean'],
    ['link', 'image'] // remove formatting button
];

function imageHandler() {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.click();

    input.onchange = () => {
        const file = input.files[0];
        if (/^image\//.test(file.type)) {
            const formData = new FormData();
            formData.append('image', file);

            // Get the correct editor instance
            const quillInstance = this.quill;

            fetch(`${BASE_URL}/Admin/News/uploadImage`, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(result => {
                if (result.url) {
                    const range = quillInstance.getSelection();
                    quillInstance.insertEmbed(range.index, 'image', result.url);
                }
            })
            .catch(error => {
                console.error('Error uploading image:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'อัปโหลดรูปภาพไม่สำเร็จ',
                    text: 'เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ: ' + error.message,
                });
            });
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'ไฟล์ไม่ถูกต้อง',
                text: 'กรุณาเลือกไฟล์รูปภาพเท่านั้น',
            });
        }
    };
}

    window.quill = new Quill('#news_content_editor', {
        modules: {
            toolbar: {
                container: toolbarOptions,
                handlers: {
                    'image': imageHandler
                }
            }
        },
        theme: 'snow'
    });

    window.Editquill = new Quill('#edit_news_content_editor', {
        modules: {
            toolbar: {
                container: toolbarOptions,
                handlers: {
                    'image': imageHandler
                }
            }
        },
        theme: 'snow'
    });
</script>

</html>