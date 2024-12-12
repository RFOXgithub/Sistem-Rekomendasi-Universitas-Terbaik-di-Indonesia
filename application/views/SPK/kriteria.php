<?php
$kriteria = [
    ['id' => 1, 'nama' => 'Kriteria A'],
    ['id' => 2, 'nama' => 'Kriteria B'],
    ['id' => 3, 'nama' => 'Kriteria C'],
    ['id' => 4, 'nama' => 'Kriteria D']
];
?>

<div class="container">
    <h2>Kriteria</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Menampilkan data dalam tabel
            foreach ($kriteria as $index => $data) {
                echo "<tr>";
                echo "<td>" . ($index + 1) . "</td>";
                echo "<td>" . htmlspecialchars($data['nama']) . "</td>";
                echo "<td>
                        <a href='#' class='btn btn-edit'>Edit</a>
                        <a href='#' class='btn btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div class="btnPosition">
    <a href="#" class="btn btn-tambah">Tambah Kriteria</a>

    <a href="#" class="btn btn-lanjut">Lanjut</a>
</div>