<div class="grid mt-8">
    <span class="text-xl underline underline-offset-2 font-bold text-center">SURAT REKOMENDASI</span>
    <span class="text-lg text-center">Nomor : <span id="no"></span></span>
    <table class="grid">
        <tr>
            <td colspan="3">Kepala UPT SMA Negeri 11 Bulukumba memberikan Rekomendasi Kepada:</td>
        </tr>
        <tr>
            <td class="pl-3 w-52">Nama</td>
            <td class="w-3">:</td>
            <td id="name_tenaga"></td>
        </tr>
        <tr>
            <td class="pl-3 w-52">Tempat tanggal lahir</td>
            <td class="w-3">:</td>
            <td id="tgllahir"></td>
        </tr>
        <tr>
            <td class="pl-3 w-52">NISN</td>
            <td class="w-3">:</td>
            <td id="nisn"></td>
        </tr>
        <tr>
            <td class="pl-3 w-52">Jenis kelamin</td>
            <td class="w-3">:</td>
            <td id="jenis_kelamin"></td>
        </tr>
        <tr>
            <td class="pl-3 w-52">Kelas</td>
            <td class="w-3">:</td>
            <td id="kelas"></td>
        </tr>
    </table>
    <p>Yang bersangkutan diatas berkeinginan untuk pindah ke UPT SMA Negeri 11 Bulukumba, untuk itu kami tidak keberatan
        menerima siswa tersebut dengan ketentuan memenuhi syarat sebagai berikut:</p>
    <ul class="ml-3 pl-3 list-decimal">
        <li>Melampirkan surat pindah dari sekolah asal</li>
        <li>Melampirkan surat keterangan mutasi dapodik</li>
        <li>Membawa buku laporan hasil belajar (LHBS)</li>
        <li>Menyelesaikan segala administrasi yang ditetapkan pihak sekolah</li>

    </ul>
    <p class="mt-2">Demikian surat keterangan ini dibuat dengan sesungguhnya dan sebenar-benarnya untuk dapat
        digunakan
        sebagaimana mestinya.</p>
    <div class="grid justify-end mt-5">
        <span>Bulukumba, <span id="tglpembuatan"></span></span>
        <span>Plt Kepala UPT SMAN 11 Bulukumba</span>
        <span class="font-bold mt-12">SUARTI, S.Pd</span>
        <span>NIP.19741107 200502 2 004</span>
    </div>
</div>

<script>
    // mengambil nilai input dari URL dan memasukkannya ke dalam variabel
    const urlParams = new URLSearchParams(window.location.search);
    const no = urlParams.get('no');
    const name_tenaga = urlParams.get('name_tenaga');
    const tgllahir = urlParams.get('tgllahir');
    const nisn = urlParams.get('nisn');
    const jenis_kelamin = urlParams.get('jenis_kelamin');
    const kelas = urlParams.get('kelas');
    const tglpembuatan = urlParams.get('tglpembuatan');

    // menampilkan nilai variabel pada halaman
    document.getElementById("no").textContent = no;
    document.getElementById("name_tenaga").textContent = name_tenaga;
    document.getElementById("tgllahir").textContent = tgllahir;
    document.getElementById("nisn").textContent = nisn;
    document.getElementById("jenis_kelamin").textContent = jenis_kelamin;
    document.getElementById("kelas").textContent = kelas;
    document.getElementById("tglpembuatan").textContent = tglpembuatan;
</script>
