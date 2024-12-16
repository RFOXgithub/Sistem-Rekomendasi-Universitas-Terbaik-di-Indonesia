<div class="container mt-5">
    <div class="outer-card">
        <div class="card-body">
            <h2 class="mb-4">Daftar Anggota</h2>
            <?php
            $anggota = [
                ['nama' => 'Rival Septian Jeflin Manti', 'npm' => '21082010152'],
                ['nama' => 'Fariz', 'npm' => '21082010156'],
                ['nama' => 'Rendi Hardiartama', 'npm' => '21082010094'],
                ['nama' => 'Ferdi Puguh Margono', 'npm' => '21082010106']
            ];
            foreach ($anggota as $member) {
                echo '<div class="col-md-3 mb-4">';
                echo '<div class="card inner-card" style="width: 18rem;">';
                echo '<div class="card-body inner-card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($member['nama']) . '</h5>';
                echo '<p class="card-text">NPM: ' . htmlspecialchars($member['npm']) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>