<div class="container">
    <h2 style="text-align: left;">Matrix Perbandingan Kriteria</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Akreditasi</th>
                <th>Fasilitas</th>
                <th>UKT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matrix as $row): ?>
                <tr>
                    <td></td>
                    <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td><strong>Jumlah</strong></td>
                <?php
                $column_sums = array_map(function (...$columns) {
                    return array_sum($columns);
                }, ...$matrix);

                foreach ($column_sums as $sum) {
                    echo "<td><strong>$sum</strong></td>";
                }
                ?>
            </tr>
        </tbody>
    </table>

    <h2 style="margin-top:25px">Normalized Matrix Perbandingan Kriteria</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th>Jenis Kriteria</th>
                <th>Bobot</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($normalized_matrix as $row): ?>
                <tr>
                    <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 style="margin-top:25px">Hasil Perhitungan Bobot</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th>Jenis Kriteria</th>
                <th>Bobot</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Akreditasi</td>
                <td>Benefit</td>
                <td><?php echo round($weights[0], 3); ?></td>
            </tr>
            <tr>
                <td>Fasilitas</td>
                <td>Benefit</td>
                <td><?php echo round($weights[1], 3); ?></td>
            </tr>
            <tr>
                <td>UKT</td>
                <td>Cost</td>
                <td><?php echo round($weights[2], 3); ?></td>
            </tr>
        </tbody>
    </table>

    <h2 style="margin-top: 25px;">Consistency Ratio (CR)</h2>
    <p style="margin-right:auto;">
        CR: <?php echo number_format($cr, 3); ?>
        <?php if ($cr > 0.1): ?>
            <span style="color: red;">(Tidak Konsisten)</span>
        <?php else: ?>
            <span style="color: green;">(Konsisten)</span>
            <br>
            <a href="<?php echo site_url('alternatif/'); ?>" class="btn btn-lanjut" style="margin-left: auto;">Lanjut</a>
        <?php endif; ?>
    </p>

</div>