<div class="container">
    <br><br>
    <img src="<?= base_url("files/front/kepengurusan/$kepengurusan->foto") ?>" alt="<?= $kepengurusan->nama ?>" class="rounded mx-auto d-block">
    <h1 class="h5 text-center text-uppercase">STRUKTUR KEPENGURUSAN<br>KELUARGA MAHASISWA DAN PELAJAR CIANJUR KIDUL<br>PERIODE <?= $kepengurusan->dari ?> - <?= $kepengurusan->sampai ?><br><?= $kepengurusan->nama ?></h1>


    <table class="table mt-3">
        <?php foreach ($anggota_lists['utama'] as $utama) : ?>
            <tr>
                <td style="border: 0;" colspan="2"><?= $utama['jabatan']['nama'] ?></td>
                <td style="border: 0; max-width: 5px;">:</td>
                <td style="border: 0;"><?= $utama['pejabat']['user_nama'] ?></td>
            </tr>
        <?php endforeach ?>

        <?php foreach ($anggota_lists['bidang'] as $bidang) : ?>
            <tr>
                <td colspan="4" style="border: 0;"><?= $bidang['header']['nama'] ?></td>
            </tr>

            <?php foreach ($bidang['body'] as $body) :
                if ($body['list']) : ?>
                    <tr>
                        <td style="border: 0;"></td>
                        <td style="border: 0;"><?= $body['jabatan']['nama'] ?></td>
                        <td style="border: 0;">:</td>
                        <td style="border: 0;"><?= isset($body['pejabat'][0]['user_nama']) ? $body['pejabat'][0]['user_nama'] : '' ?></td>
                    </tr>
                    <?php foreach ($body['pejabat'] as $key => $pejabat) :
                        if ($key != 0) : ?>
                            <tr>
                                <td style="border: 0;"></td>
                                <td style="border: 0;"></td>
                                <td style="border: 0;">:</td>
                                <td style="border: 0;"><?= $pejabat['user_nama'] ?></td>
                            </tr>
                    <?php endif;
                    endforeach;
                else : ?>
                    <tr>
                        <td style="border: 0;"></td>
                        <td style="border: 0;"><?= $body['jabatan']['nama'] ?></td>
                        <td style="border: 0;">:</td>
                        <td style="border: 0;"><?= $body['pejabat']['user_nama'] ?></td>
                    </tr>
            <?php endif;
            endforeach; ?>
            </tr>
        <?php endforeach ?>
    </table>
</div>