<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)),url(uploads/background/bg-news.jpg), center no-repeat; background-size: cover;background-position: bottom;">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white  slideInDown mb-3">สกจ. ประชาสัมพันธ์</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">สกจ. ประชาสัมพันธ์</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">

        <form method='get' action="<?=base_url('News')?>" id="searchForm">
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg" type='text' name='search' value='<?= $search ?>'
                    placeholder="ค้นหาข่าวที่นี่...">
                <button type="submit" class="input-group-text btn-success"><i class="bi bi-search me-2"></i>
                    ค้นหา</button>
            </div>
        </form>


        <style>
         body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            padding-bottom: 50px; /* เพิ่มพื้นที่ด้านล่างเพื่อให้ footer ไม่ชน */
            flex: 1; /* ให้ grid ขยายเต็มพื้นที่ */
        }

        .grid-item {
            width: 30%;
            margin: 10px; 
        }

        .load-more {
            cursor: pointer;
            margin: 20px 0;
            padding: 10px;
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>

            <h2>Data List</h2>
                <div class="grid row" id="grid"></div>

                <div class="load-more" id="load-more">Load More</div>

            </div>
</div>