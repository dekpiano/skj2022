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
                                    <h5 class="">ตารางข่าวประชาสัมพันธ์</h5>
                                    <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">+ เพิ่มข่าว</a>
                                </div>


                                <div class="table-responsive text-nowrap">
                                    <table
                                        class="datatables-basic table border-top dataTable no-footer dtr-column collapsed"
                                        id="myTable">
                                        <thead>
                                            <tr>
                                                <th>หัวข้อ</th>
                                                <th>ประเภทข่าว</th>
                                                <th>วันที่สร้าง</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php foreach ($news as $key => $v_news) : ?>
                                            <tr>
                                                <td>
                                                    <strong><?=$v_news->news_topic?></strong>
                                                </td>
                                                <td><?=$v_news->news_category?></td>
                                                <td><?=$v_news->news_date?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="bx bx-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
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



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">เพิ่มข่าว</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-news" method="post" action="<?=base_url('Admin/News/AddNews')?>"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="news_topic" class="form-label">หัวห้อข่าว</label>
                        <input type="text" class="form-control mb-3" name="news_topic" id="news_topic"
                            placeholder="ใส่หัวข้อข่าว..." aria-describedby="floatingInputHelp" required>
                        <div class="invalid-feedback">
                            ใส่หัวข้อข่าว
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="news_category" class="form-label">ประเภทข่าว</label>
                        <select id="largeSelect" class="form-select form-select" name="news_category" id="news_category"
                            required>
                            <option value="ข่าวประชาสัมพันธ์">ประชาสัมพันธ์</option>
                            <option value="ข่าวกิจกรรม">กิจกรรม</option>
                        </select>
                        <div class="invalid-feedback">
                            เลือกประเภทข่าว
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">วันที่ลง</label>
                        <input class="form-control" type="date" value="<?=date('Y-m-d')?>" id="news_date"
                            name="news_date" required>
                            <div class="invalid-feedback">
                            เลือกวันที่ลง
                        </div>
                    </div>

                    <!-- Create the editor container -->
                    <div id="editor" class="mb-3">
                        <p>ใส่เนื้อหาข่าวที่นี่....</p>
                    </div>
                    <div class="mb-3">
                        <label for="news_img" class="form-label">รูปภาหน้าปก</label>
                        <input class="form-control" type="file" name="news_img" id="news_img">
                        <img src="" alt="" id="blah" class="img-fluid">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>

            </form>

        </div>