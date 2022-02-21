<style>
  .card-main {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    margin: 3px;
  }

  .card-main:hover {
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  }
</style>

<!-- page header -->
<section class="page-header">
  <div class="container-xl">
    <div class="text-center">
      <h1 class="mt-0 mb-2">Galeri Kegiatan</h1>
      <div class="d-flex justify-content-center align-items-center">
        <a href="<?= base_url() ?>" class="me-1">Home</a> > Galeri
      </div>
    </div>
  </div>
</section>

<!-- section main content -->
<section class="main-content mt-4">
  <div class="container-xl">
    <form class="d-flex search-form pt-3">
      <input class="form-control me-2" type="search" name="search" placeholder="Masukan kata Kunci dan tekan enter ..." aria-label="Search" value="<?= is_null($search) ? '' : $search ?>">
      <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
    </form>
  </div>
</section>

<section class="main-conten mt-2">
  <div class="container-xl">
    <div class="row">
      <?php foreach ($galeris as $galeri) : ?>
        <div class="col-md-6 col-lg-4">
          <a href="<?= base_url("galeri/detail/$galeri->slug") ?>">
            <div class="card m-2 card-main">
              <img src="<?= $galeri->foto_id_gdrive ? "https://drive.google.com/uc?export=view&id={$galeri->foto_id_gdrive}" : base_url("files/galeri/{$galeri->foto}") ?>" class="card-img-top" alt="<?= $galeri->nama ?>" style="max-width: 100%; height: auto; max-height: 200px; object-fit: cover; object-position: center;">
              <div class="card-body">
                <h5 class="card-title"><?= $galeri->nama ?></h5>
                <p class="card-text text-dark"><?= $galeri->keterangan ?></p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if (!$galeris) : ?>
      <div class="d-flex justify-content-center align-items-center">
        <h6>Data Tidak Tersedia</h6>
      </div>
    <?php endif ?>
  </div>
</section>

<?= $pagination; ?>