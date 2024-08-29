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

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-lg-12 mb-4 order-0">
                            <div class="card p-3">
                                <div class="d-flex justify-content-between align-content-center">

                                    <button class="btn btn-primary" id="AddBanner">+ เพิ่มเกี่ยวกับโรงเรียน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="">เกี่ยวกับโรงเรียน</h5>
                    <div class="card">
                        <input type="hidden" id="AboutKey" value="<?=$uri->getSegment(4);?>">
                        <form id="form-AboutSchool" action="<?=base_url('Admin/AboutSchool/Update/'.$uri->getSegment(4))?>" method="post">
                        <div class="card-body">
                            <div id="editor_AboutSchool" class="mb-3">
                               
                            </div>
                            <button type="submit" class="btn btn-primary w-100">บันทึก</button>
                        </div>     
                        </form>                   
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
                            placeholder="ใส่ลิ้งก์เชื่อมโยงแบนเนอร์ Ex.https://academic.skj.ac.th/LearningOnline"
                            aria-describedby="floatingInputHelp">
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
                        <input class="form-control" type="file" name="banner_img" id="banner_img">
                        <img src="" alt="" id="blah" class="img-fluid">
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