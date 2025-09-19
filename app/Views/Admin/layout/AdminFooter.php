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
(function() { // เพิ่ม IIFE
    const BASE_URL = "<?= base_url() ?>";
    // Expose BASE_URL to global scope if needed by other scripts
    window.BASE_URL = BASE_URL; // ทำให้ BASE_URL เข้าถึงได้จากภายนอก IIFE
})(); // ปิด IIFE
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
(function() { // เพิ่ม IIFE
const uploadedImageUrls = new Map(); // เพิ่ม Map เพื่อเก็บ URL ของรูปภาพที่ถูกอัปโหลดสำหรับแต่ละ Quill instance

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

            const quillInstance = this.quill; // Quill instance ปัจจุบัน

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

                    // เก็บ URL ของรูปภาพที่อัปโหลด
                    if (!uploadedImageUrls.has(quillInstance)) {
                        uploadedImageUrls.set(quillInstance, new Set());
                    }
                    uploadedImageUrls.get(quillInstance).add(result.url);
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

var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],
    ['blockquote', 'code-block'],

    [{
        'header': 1
    }, {
        'header': 2
    }],
    [{
        'list': 'ordered'
    }, {
        'list': 'bullet'
    }],
    [{
        'script': 'sub'
    }, {
        'script': 'super'
    }],
    [{
        'indent': '-1'
    }, {
        'indent': '+1'
    }],
    [{
        'direction': 'rtl'
    }],

    [{
        'size': ['small', false, 'large', 'huge']
    }],
    [{
        'header': [1, 2, 3, 4, 5, 6, false]
    }],

    [{
        'color': []
    }, {
        'background': []
    }],
    [{
        'font': []
    }],
    [{
        'align': []
    }],

    ['clean'],
    ['link', 'image']
];

// ฟังก์ชันสำหรับเพิ่ม Event Listener ให้กับ Quill instance
function addQuillDeleteListener(quillInstance) {
    quillInstance.on('text-change', (delta, oldDelta, source) => {
        if (source === 'user') {
            const currentContent = quillInstance.getContents();
            const currentImageUrls = new Set();
            currentContent.ops.forEach(op => {
                if (op.insert && op.insert.image) {
                    currentImageUrls.add(op.insert.image);
                }
            });

            const uploadedUrlsForThisQuill = uploadedImageUrls.get(quillInstance) || new Set();

            uploadedUrlsForThisQuill.forEach(url => {
                if (!currentImageUrls.has(url)) {
                    console.log('Image deleted from editor:', url);
                    fetch(`${BASE_URL}/Admin/News/deleteImage`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ imageUrl: url }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Image deleted from server:', url);
                            uploadedUrlsForThisQuill.delete(url);
                        } else {
                            console.error('Failed to delete image from server:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting image from server:', error);
                    });
                }
            });
        }
    });
}

// เพิ่มฟังก์ชัน handleImageClick
function handleImageClick(event) {
    const img = event.target;
    const quill = Quill.find(img); // หา Quill instance จากรูปภาพที่ถูกคลิก

    if (quill && img.tagName === 'IMG' && img.classList.contains('ql-image')) {
        const range = quill.getSelection();
        if (range && range.length === 0) { // ถ้าไม่มีการเลือกข้อความ
            const blot = Quill.find(img);
            const index = quill.getIndex(blot);
            quill.setSelection(index, 1); // เลือกรูปภาพ
        }

        // สร้างปุ่มลบ
        let deleteButton = document.querySelector('.ql-image-delete-button');
        if (!deleteButton) {
            deleteButton = document.createElement('button');
            deleteButton.className = 'ql-image-delete-button';
            deleteButton.innerHTML = 'X'; // หรือไอคอนถังขยะ
            deleteButton.style.position = 'absolute';
            deleteButton.style.background = 'red';
            deleteButton.style.color = 'white';
            deleteButton.style.border = 'none';
            deleteButton.style.borderRadius = '50%';
            deleteButton.style.width = '20px';
            deleteButton.style.height = '20px';
            deleteButton.style.cursor = 'pointer';
            deleteButton.style.zIndex = '1000';
            deleteButton.style.display = 'none'; // ซ่อนไว้ก่อน
            document.body.appendChild(deleteButton);

            deleteButton.onclick = () => {
                const selectedBlot = quill.getSelection();
                if (selectedBlot && selectedBlot.length === 1 && quill.getFormat(selectedBlot.index, 1).image) {
                    quill.deleteText(selectedBlot.index, 1); // ลบรูปภาพ
                    deleteButton.style.display = 'none'; // ซ่อนปุ่ม
                }
            };
        }

        // แสดงปุ่มลบใกล้รูปภาพ
        const imgRect = img.getBoundingClientRect();
        deleteButton.style.top = `${imgRect.top + window.scrollY}px`;
        deleteButton.style.left = `${imgRect.right + window.scrollX - 20}px`; // วางไว้มุมขวาบนของรูป
        deleteButton.style.display = 'block';

        // ซ่อนปุ่มเมื่อคลิกที่อื่น
        document.addEventListener('click', (e) => {
            if (e.target !== img && e.target !== deleteButton) {
                deleteButton.style.display = 'none';
            }
        }, { once: true });
    }
}


// สร้าง Quill instance สำหรับ news_content_editor
if (document.getElementById('news_content_editor') && !Quill.find(document.getElementById('news_content_editor'))) {
    window.quill = new Quill('#news_content_editor', {
        modules: {
            toolbar: {
                container: toolbarOptions,
                handlers: {
                    'image': imageHandler
                }
            },
            imageResize: {
                modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
            }
        },
        theme: 'snow'
    });
    addQuillDeleteListener(window.quill);
    window.quill.root.addEventListener('click', handleImageClick); // เพิ่ม listener
}

// สร้าง Quill instance สำหรับ edit_news_content_editor
if (document.getElementById('edit_news_content_editor') && !Quill.find(document.getElementById('edit_news_content_editor'))) {
    window.Editquill = new Quill('#edit_news_content_editor', {
        modules: {
            toolbar: {
                container: toolbarOptions,
                handlers: {
                    'image': imageHandler
                }
            },
            imageResize: {
                modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
            }
        },
        theme: 'snow'
    });
    addQuillDeleteListener(window.Editquill);
    window.Editquill.root.addEventListener('click', handleImageClick); // เพิ่ม listener
}

// สร้าง Quill instance สำหรับ editor_facebook
if (document.getElementById('editor_facebook') && !Quill.find(document.getElementById('editor_facebook'))) {
    var quillFacebook = new Quill('#editor_facebook', {
        modules: {
            toolbar: toolbarOptions,
            imageResize: {
                modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
            }
        },
        theme: 'snow'
    });
    addQuillDeleteListener(quillFacebook);
    quillFacebook.root.addEventListener('click', handleImageClick); // เพิ่ม listener
}

// สร้าง Quill instance สำหรับ editor_AboutSchool (จาก PageAdminAboutSchoolUpdate.php) รหัสเดิมคือ var Editquill
if (document.getElementById('editor_AboutSchool') && !Quill.find(document.getElementById('editor_AboutSchool'))) {
    var aboutSchoolEditQuill = new Quill('#editor_AboutSchool', {
        modules: {
            toolbar: toolbarOptions,
            imageResize: {
                modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
            }
        },
        theme: 'snow'
    });
    addQuillDeleteListener(aboutSchoolEditQuill);
    aboutSchoolEditQuill.root.addEventListener('click', handleImageClick); // เพิ่ม listener
}

// สร้าง Quill instance สำหรับ editor_add_about (จาก PageAdminAboutSchoolUpdate.php) รหัสเดิมคือ var quill
if (document.getElementById('editor_add_about') && !Quill.find(document.getElementById('editor_add_about'))) {
    var aboutSchoolAddQuill = new Quill('#editor_add_about', {
        modules: {
            toolbar: toolbarOptions,
            imageResize: {
                modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
            }
        },
        theme: 'snow'
    });
    addQuillDeleteListener(aboutSchoolAddQuill);
    aboutSchoolAddQuill.root.addEventListener('click', handleImageClick); // เพิ่ม listener
}
})(); // ปิด IIFE
</script>

<?= $this->renderSection('scripts') ?>
</body>
</html>