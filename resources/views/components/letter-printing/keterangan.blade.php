<div class="grid mt-8">
    <span class="text-xl underline underline-offset-2 font-bold text-center">SURAT KETERANGAN</span>
    <span class="text-lg text-center">Nomor : <span id="no"></span></span>
    <table class="grid">
        <tr>
            <td colspan="3">Yang bertandatangan dibawah ini :</td>
        </tr>
        <tr>
            <td class="pl-3 w-52">Nama</td>
            <td class="w-3">:</td>
            <td id="name"></td>
        </tr>
        <tr>
            <td class="pl-3 w-52">Nip</td>
            <td class="w-3">:</td>
            <td id="nip"></td>
        </tr>
        <tr>
            <td class="pl-3 w-52">Jabatan</td>
            <td class="w-3">:</td>
            <td id="jabatan"></td>
        </tr>
        <tr>
            <td colspan="3">Menerangkan dengan sesungguhnya bahwa yang tersebut di bawah ini ;</td>
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
            <td class="pl-3 w-52">Pendidikan-jurusan</td>
            <td class="w-3">:</td>
            <td id="pendidikan"></td>
        </tr>
        <tr>
            <td class="pl-3 w-52">Alamat Tempat kerja</td>
            <td class="w-3">:</td>
            <td id="alamat"></td>
        </tr>
        <tr>
            <td class="pl-3 w-52">No .Telp / Hp</td>
            <td class="w-3">:</td>
            <td id="notelp"></td>
        </tr>
    </table>
    <p>Telah melaksanakan sebagai tenaga administrasi sekolah selama <span id="tenagaadministrasi"></span> , terhitung
        mulai
        tanggal <span id="mulai"></span> sampai dengan saat ini dan berkinerja baik.</p>
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
    const name = urlParams.get('name');
    const nip = urlParams.get('nip');
    const jabatan = urlParams.get('jabatan');
    const name_tenaga = urlParams.get('name_tenaga');
    const tgllahir = urlParams.get('tgllahir');
    const pendidikan = urlParams.get('pendidikan');
    const alamat = urlParams.get('alamat');
    const notelp = urlParams.get('notelp');
    const tenagaadministrasi = urlParams.get('tenagaadministrasi');
    const mulai = urlParams.get('mulai');
    const tglpembuatan = urlParams.get('tglpembuatan');

    // menampilkan nilai variabel pada halaman
    document.getElementById("no").textContent = no;
    document.getElementById("name").textContent = name;
    document.getElementById("nip").textContent = nip;
    document.getElementById("jabatan").textContent = jabatan;
    document.getElementById("name_tenaga").textContent = name_tenaga;
    document.getElementById("tgllahir").textContent = tgllahir;
    document.getElementById("pendidikan").textContent = pendidikan;
    document.getElementById("alamat").textContent = alamat;
    document.getElementById("notelp").textContent = notelp;
    document.getElementById("tenagaadministrasi").textContent = tenagaadministrasi;
    document.getElementById("mulai").textContent = mulai;
    document.getElementById("tglpembuatan").textContent = tglpembuatan;
</script>
