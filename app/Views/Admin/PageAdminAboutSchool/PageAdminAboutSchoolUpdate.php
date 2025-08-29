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
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddAboutSchool">+ เพิ่มเกี่ยวกับโรงเรียน</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="">แก้ไขข้อมูลเกี่ยวกับโรงเรียน</h5>
                    <div class="card">
                        <input type="hidden" id="AboutKey" value="<?=$uri->getSegment(4);?>">
                        <form id="form-AboutSchool" action="<?=base_url('Admin/AboutSchool/Update/'.$uri->getSegment(4))?>" method="post">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="update_about_menu" class="form-label">หัวข้อ</label>
                                <input type="text" class="form-control" id="update_about_menu" name="about_menu" placeholder="ใส่หัวข้อ..." required>
                            </div>
                            <label class="form-label">เนื้อหา</label>
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


<!-- Modal เพิ่มเกี่ยวกับโรงเรียน -->
<div class="modal fade" id="ModalAddAboutSchool" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalAddAboutSchoolLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAddAboutSchoolLabel">เพิ่มข้อมูลเกี่ยวกับโรงเรียน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-add-about-school" method="post" action="<?=base_url('Admin/AboutSchool/Add')?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="about_menu" class="form-label">หัวข้อ</label>
                        <input type="text" class="form-control mb-3" name="about_menu" id="about_menu" placeholder="ใส่หัวข้อ..." required>
                    </div>

                    <label class="form-label">เนื้อหา</label>
                    <div id="editor_add_about" class="mb-3">
                        <!-- Editor will be initialized here -->
                    </div>
                    <!-- Hidden input that will be populated by the editor's content -->
                    <input type="hidden" name="About_content" id="add_about_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>