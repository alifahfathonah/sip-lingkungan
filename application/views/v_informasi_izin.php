<!-- Page Title -->
<section class="page-title" style="background-image:url(<?=base_url('assets/website/');?>images/banner3.png)">
    <div class="auto-container">
        <div class="content-box">
            <h1>SILAHKAN PILIH JENIS USAHA</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="<?=base_url();?>"><span class="fa fa-home"></span></a></li>
                <li>INFORMASI IZIN</li>
            </ul>
        </div>
    </div>
</section>

<!-- Causes Section -->
<section class="causes-section style-two">
    <div class="auto-container">
        <div class="cause-carousel-wrapper">
            <div class="cause-carousel owl-theme owl-carousel owl-dot-style-one owl-nav-none">
                <!-- Cause Block One -->
                <?php foreach(list_jenis_usaha() as $row): ?>
                <div class="cause-block-one">
                    <div class="inner-box">
                        <div class="image"><a
                                href="<?=base_url('welcome/view/'.encrypt_url($row['idjenis_usaha']));?>"><img
                                    src="<?=base_url('assets/');?>img/data.jpeg" alt=""></a></div>
                        <div class="lower-content">
                            <!-- <h4><a href="<?=base_url('welcome/view/'.encrypt_url($row['idjenis_usaha']));?>">Help nigerian girls education</a></h4> -->
                            <div class="bottom-content text-center">
                                <div class="link-btn"><a
                                        href="<?=base_url('welcome/view/'.encrypt_url($row['idjenis_usaha']));?>"
                                        class="theme-btn btn-style-one donate-box-btn"><span><?= strtoupper($row['jenis_usaha']); ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>