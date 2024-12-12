<div id="form-page" class="content-page d-none">
    <div class="mb-3">
        <div class="form-container">
            <h1>Form Risiko</h1>
            <form action="insert_form.php" method="POST">
                <script src="script.js" defer></script>

                <h3>Informasi Risiko</h3>
                <label for="tujuan">Tujuan</label>
                <input type="text" id="tujuan" name="tujuan">

                <label for="kodeRisiko">Kode Risiko</label>
                <input type="text" id="kodeRisiko" name="kodeRisiko">

                <label for="prosesBisnis">Proses Bisnis</label>
                <select id="prosesBisnis" name="prosesBisnis">
                    <option value="">--Pilih--</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="akademik">Akademik</option>
                    <option value="kepegawaian">Kepegawaian</option>
                </select>

                <label for="kelompok">Kelompok</label>
                <select id="kelompok" name="kelompok">
                    <option value="">--Pilih--</option>
                    <option value="risiko-stratejik">Risiko Stratejik</option>
                    <option value="risiko-finansial">Risiko Finansial</option>
                    <option value="risiko-operasional">Risiko Operasional</option>
                </select>

                <label for="sumber">Sumber</label>
                <select id="sumber" name="sumber">
                    <option value="">-- Pilih --</option>
                    <option value="eks">Eksternal</option>
                    <option value="inter">Internal</option>
                    <option value="eks-int">Eksternal dan Internal</option>
                </select>

                <label for="uraianPeristiwa">Uraian Peristiwa</label>
                <textarea id="uraianPeristiwa" name="uraianPeristiwa"></textarea>

                <label for="penyebabRisiko">Penyebab Risiko</label>
                <textarea id="penyebabRisiko" name="penyebabRisiko"></textarea>

                <h3>Potensi Kerugian</h3>
                <label for="akibatQualitative">Akibat Qualitative</label>
                <textarea id="akibatQualitative" name="akibatQualitative"></textarea>

                <label for="akibatFinansial">Akibat Finansial</label>
                <textarea id="akibatFinansial" name="akibatFinansial"></textarea>

                <h3>Informasi Terkait</h3>
                <label for="pemilikRisiko">Pemilik Risiko</label>
                <input type="text" id="pemilikRisiko" name="pemilikRisiko">

                <label for="departemen">Departemen</label>
                <select id="departemen" name="departemen">
                    <option value="">-- Pilih --</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Biologi">Biologi</option>
                    <option value="Fisika">Fisika</option>
                    <option value="Kimia">Kimia</option>
                </select>

                <h3>Penilaian Risiko</h3>
                <label for="inherentLikelihood">Inherent Likelihood</label>
                <input type="number" id="inherentLikelihood" name="inherentLikelihood" value="0">

                <label for="inherentImpact">Inherent Impact</label>
                <input type="number" id="inherentImpact" name="inherentImpact" value="0">
                <!-- Hasil Perhitungan Inherent Risk -->
                <label for="inherentRisk">Inherent Risk</label>
                <input type="text" id="inherentRisk" name="inherentRisk" readonly>

                <h3>Pengendalian</h3>
                <label for="control">Control</label>
                <select id="control" name="control">
                    <option value="">-- Pilih --</option>
                    <option value="ada">Ada</option>
                    <option value="tidak-ada">Tidak ada</option>
                </select>

                <label for="memadai">Memadai</label>
                <select id="memadai" name="memadai">
                    <option value="">-- Pilih --</option>
                    <option value="memadai">Memadai</option>
                    <option value="tidak-memadai">Tidak Memadai</option>
                </select>

                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">-- Pilih --</option>
                    <option value="dijalankan">Dijalankan 100%</option>
                    <option value="belumjalan">Belum Dijalankan 100%</option>
                </select>

                <label for="residualLikelihood">Residual Likelihood</label>
                <input type="number" id="residualLikelihood" name="residualLikelihood" value="0">

                <label for="residualImpact">Residual Impact</label>
                <input type="number" id="residualImpact" name="residualImpact" value="0">

                <!-- Hasil Perhitungan Residual Risk -->
                <label for="residualRisk">Residual Risk</label>
                <input type="text" id="residualRisk" name="residualRisk" readonly>
                <h3>Penanganan</h3>

                <label for="mitigasi">Tindakan Mitigasi</label>
                <textarea id="mitigasi" name="mitigasi"></textarea>

                <label for="perlakuan">Perlakuan</label>
                <select id="perlakuan" name="perlakuan">
                    <option value="">-- Pilih --</option>
                    <option value="Accept">Accept</option>
                    <option value="Reduce">Reduce</option>
                </select>

                <label for="mitigasiLikelihood">Mititgasi Likelihood</label>
                <input type="number" id="mitigasiLikelihood" name="mitigasiLikelihood" value="0">

                <label for="mitigasiImpact">Mititgasi Impact</label>
                <input type="number" id="mitigasiImpact" name="mitigasiImpact" value="0">

                <!-- Hasil Perhitungan Mitigasi Risk -->
    
                <label for="mitigasiRisk">Mitigasi Risk</label>
                <input type="number" id="mitigasiRisk" name="mitigasiRisk" readonly>

                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>
</div>