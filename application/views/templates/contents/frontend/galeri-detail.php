<!-- page header -->
<section class="page-header">
  <div class="container-xl">
    <div class="text-center">
      <h1 class="mt-0 mb-2"><?= isset($galeri->nama) ? $galeri->nama : ''; ?></h1>
      <div class="d-flex justify-content-center align-items-center">
        <a href="<?= base_url() ?>" class="me-1">Home</a> > <a href="<?= base_url('galeri') ?>" class="mx-1">Galeri</a> > Detail
      </div>
    </div>
  </div>
</section>
<div class="spacer" data-height="50"></div>
<section class="main-conten mt-2">
  <div class="container-xl">
    <iframe src="https://drive.google.com/embeddedfolderview?id=<?= isset($galeri->id_gdrive) ? $galeri->id_gdrive : ''; ?>#grid" style="width:100%; height:600px; border:0;"></iframe>
  </div>
</section>