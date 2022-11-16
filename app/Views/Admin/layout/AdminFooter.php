<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/popper/popper.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/js/bootstrap.js"></script>
<script src="<?=base_url()?>/assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="<?=base_url()?>/assets/admin/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

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
<script src="<?=base_url()?>/assets/admin/assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?=base_url()?>/assets/admin/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<?php if($uri->getSegment(2) == 'News') : ?>
<script src="<?=base_url()?>/assets/admin/assets/js/news/JsNews.js"></script>
<?php endif; ?>

</body>

<!-- Initialize Quill editor -->
<script>
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

$(document).ready(function() {
    $('#myTable').DataTable({
        "columnDefs": [{
            "width": "20%",
            "targets": 0
        }]
    });
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

var quill = new Quill('#editor', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});
</script>

</html>