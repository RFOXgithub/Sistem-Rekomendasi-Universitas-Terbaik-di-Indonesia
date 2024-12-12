<div class="container perkri-container">
    <h1 class="page-title perkri-page-title">Perbandingan Kriteria</h1>

    <!-- Daftar Kriteria -->
    <div class="criteria-list perkri-criteria-list">
        <h2 class="perkri-heading">Pilih Kriteria yang Dibandingkan</h2>
        <div class="criteria-cards perkri-criteria-cards">
            <div class="card perkri-card inner-card" data-id="1">
                <h3 class="card-title perkri-card-title">Kriteria 1</h3>
                <p class="card-text perkri-card-text">Deskripsi Kriteria 1</p>
            </div>
            <div class="card perkri-card inner-card" data-id="2">
                <h3 class="card-title perkri-card-title">Kriteria 2</h3>
                <p class="card-text perkri-card-text">Deskripsi Kriteria 2</p>
            </div>
            <div class="card perkri-card inner-card" data-id="3">
                <h3 class="card-title perkri-card-title">Kriteria 3</h3>
                <p class="card-text perkri-card-text">Deskripsi Kriteria 3</p>
            </div>
            <div class="card perkri-card inner-card" data-id="4">
                <h3 class="card-title perkri-card-title">Kriteria 4</h3>
                <p class="card-text perkri-card-text">Deskripsi Kriteria 4</p>
            </div>
        </div>
    </div>

    <!-- Matriks Perbandingan Kriteria -->
    <div class="comparison-matrix perkri-comparison-matrix">
        <h2 class="perkri-heading">Matriks Perbandingan Kriteria</h2>
        <form id="comparison-matrix-form" action="#" method="POST">
            <table class="perkri-matrix-table">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Kriteria 1</th>
                        <th>Kriteria 2</th>
                        <th>Kriteria 3</th>
                        <th>Kriteria 4</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kriteria 1</td>
                        <td>1</td>
                        <td><input type="number" name="criteria-1-to-2" id="criteria-1-to-2" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                        <td><input type="number" name="criteria-1-to-3" id="criteria-1-to-3" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                        <td><input type="number" name="criteria-1-to-4" id="criteria-1-to-4" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                    </tr>
                    <tr>
                        <td>Kriteria 2</td>
                        <td><input type="number" name="criteria-2-to-1" id="criteria-2-to-1" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                        <td>1</td>
                        <td><input type="number" name="criteria-2-to-3" id="criteria-2-to-3" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                        <td><input type="number" name="criteria-2-to-4" id="criteria-2-to-4" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                    </tr>
                    <tr>
                        <td>Kriteria 3</td>
                        <td><input type="number" name="criteria-3-to-1" id="criteria-3-to-1" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                        <td><input type="number" name="criteria-3-to-2" id="criteria-3-to-2" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                        <td>1</td>
                        <td><input type="number" name="criteria-3-to-4" id="criteria-3-to-4" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                    </tr>
                    <tr>
                        <td>Kriteria 4</td>
                        <td><input type="number" name="criteria-4-to-1" id="criteria-4-to-1" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                        <td><input type="number" name="criteria-4-to-2" id="criteria-4-to-2" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                        <td><input type="number" name="criteria-4-to-3" id="criteria-4-to-3" class="perkri-input" placeholder="Nilai" min="0.1" max="9" step="0.1"></td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn-lanjut perkri-btn-lanjut">Simpan Perbandingan</button>
        </form>
    </div>
</div>
