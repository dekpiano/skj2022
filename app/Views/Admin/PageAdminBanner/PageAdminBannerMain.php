<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <?= $this->include('Admin/layout/AdminMenu');?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <?= $this->include('Admin/layout/AdminNavbar');?>
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <style>
                table td {
                    word-break: break-word;
                    vertical-align: top;
                    white-space: normal !important;
                }

                table.dataTable .form-check-input {
                    width: 30px;
                    height: 18px;
                }
                </style>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-lg-12 mb-4 order-0">
                            <div class="card p-3">
                                <div class="d-flex justify-content-between align-content-center">
                                    <h5 class="">ตารางแบนเนอร์ประชาสัมพันธ์</h5>
                                    <button class="btn btn-primary" id="AddBanner">+ เพิ่มแบนเนอร์</button>
                                </div>

                                <div class="table-responsive text-nowrap">
                                    <table
                                        class="datatables-basic table border-top dataTable no-footer dtr-column collapsed"
                                        id="myTable">
                                        <thead>
                                            <tr>
                                                <th>คำสั่ง</th>
                                                <th>แสดงหน้าเว็บ</th>
                                                <th>หัวข้อ</th>
                                                <th>ตัวอย่าง</th>
                                                <th>วันที่สร้าง</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php foreach ($banner as $key => $v_banner) : ?>
                                            <tr id="<?=$v_banner->banner_id?>">
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item Editbanner"
                                                                href="javascript:void(0);"
                                                                key-bannerid="<?=$v_banner->banner_id?>"><i
                                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item Deletebanner"
                                                                href="javascript:void(0);"
                                                                key-bannerid="<?=$v_banner->banner_id?>"><i
                                                                    class="bx bx-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>                                                   
                                                    <div class="form-check form-switch mb-2">
                                                        <input class="form-check-input" type="checkbox" status-key="<?=$v_banner->banner_id?>"
                                                            id="flexSwitchCheckChecked" <?=$v_banner->banner_status == "on"?"checked":""?> >  
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong><?=$v_banner->banner_name?></strong>
                                                </td>
                                                <td>
                                                    <img src="<?=base_url('uploads/banner/all/'.$v_banner->banner_img)?>"
                                                        class="img-fluid" alt="<?=$v_banner->banner_name?>" srcset="">

                                                </td>
                                                <td><?=$v_banner->banner_date?></td>

                                            </tr>
                                            <?php endforeach; ?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <!-- / Content -->




            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->


<style>
#bannerDropzone {
    min-height: 240px;
    border: 2px dashed #007bff;
    border-radius: 12px;
    background: #f8fafc;
    position: relative;
    overflow: hidden;
}
#bannerDropzone .dz-preview {
    width: 100% !important;
    margin: 0 !important;
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
#bannerDropzone .dz-preview .dz-image {
    width: 100% !important;
    height: 100% !important;
    min-height: 220px !important;
    max-width: 100% !important;
    border-radius: 12px;
    overflow: hidden;
    margin: 0;
    box-shadow: none;
    display: flex;
    align-items: center;
    justify-content: center;
}
#bannerDropzone .dz-preview .dz-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    border-radius: 12px;
}
#bannerDropzone .dz-message {
    font-size: 1.2rem;
    color: #888;
    padding: 2rem 1rem;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0; left: 0;
}

</style>

<!-- Modal เพิ่มแบนเนอร์ -->
<div class="modal fade" id="ModalAddBanner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-99"
    aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">เพิ่มแบนเนอร์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-banner" method="post" action="<?=base_url('Admin/banner/Addbanner')?>"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="banner_name" class="form-label">หัวห้อแบนเนอร์</label>
                        <input type="text" class="form-control mb-3" name="banner_name" id="banner_name"
                            placeholder="ใส่หัวข้อแบนเนอร์..." aria-describedby="floatingInputHelp" required>
                        <div class="invalid-feedback">
                            ใส่หัวข้อแบนเนอร์
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="banner_linkweb" class="form-label">ลิ้งก์เชื่อมโยงแบนเนอร์</label>
                        <input type="text" class="form-control mb-3" name="banner_linkweb" id="banner_linkweb"
                            placeholder="ใส่ลิ้งก์เชื่อมโยงแบนเนอร์ Ex.https://academic.skj.ac.th/LearningOnline" aria-describedby="floatingInputHelp" >
                        <div class="invalid-feedback">
                            ลิ้งก์เชื่อมโยง
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="banner_date" class="form-label">วันที่ลง</label>
                        <input class="form-control" type="datetime-local" value="<?=date('Y-m-d H:i:s')?>"
                            id="banner_date" name="banner_date" required>
                        <div class="invalid-feedback">
                            เลือกวันที่ลง
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="banner_img" class="form-label">รูปภาหน้าปก</label>
                        <!-- <input class="form-control" type="file" name="banner_img" id="banner_img">
                        <img src="" alt="" id="blah" class="img-fluid"> -->
                         <div id="bannerDropzone" class="dropzone"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- Modal แก้ไขแบนเนอร์ -->
<div class="modal fade" id="ModalEditbanner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-99"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">แก้ไขแบนเนอร์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-update-banner" method="post" action="<?=base_url('Admin/banner/Updatebanner')?>"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                <input type="text" name="edit_banner_id" id="edit_banner_id" value="" style="display:none;">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_banner_topic" class="form-label">หัวห้อแบนเนอร์</label>
                        <input type="text" class="form-control mb-3" name="edit_banner_topic" id="edit_banner_topic"
                            placeholder="ใส่หัวข้อแบนเนอร์..." aria-describedby="floatingInputHelp" required>
                        <div class="invalid-feedback">
                            ใส่หัวข้อแบนเนอร์
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_banner_category" class="form-label">ประเภทแบนเนอร์</label>
                        <select id="largeSelect" class="form-select form-select" name="edit_banner_category"
                            id="edit_banner_category" required>
                            <option value="แบนเนอร์ประชาสัมพันธ์">ประชาสัมพันธ์</option>
                            <option value="แบนเนอร์กิจกรรม">กิจกรรม</option>
                        </select>
                        <div class="invalid-feedback">
                            เลือกประเภทแบนเนอร์
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_banner_date" class="form-label">วันที่ลง</label>
                        <input class="form-control" type="date" value="" id="edit_banner_date" name="edit_banner_date">
                        <div class="invalid-feedback">
                            เลือกวันที่ลง
                        </div>
                    </div>

                    <!-- Create the editor container -->
                    <div id="editor_update" class="mb-3">
                        <p>ใส่เนื้อหาแบนเนอร์ที่นี่....</p>
                    </div>
                    <div class="mb-3">
                        <label for="edit_banner_img" class="form-label">รูปภาหน้าปก</label>
                        <input class="form-control" type="file" name="edit_banner_img" id="edit_banner_img">
                        <img src="" alt="" id="edit_blah" class="img-fluid">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>

            </form>

        </div>
    </div>
</div>