$(document).ready(async () => {
    $('table').DataTable({
        columns: [{ searchable: false }, null, null, null, null, null, { searchable: false }]
    });
    $('input[name="tanggal_masuk"],input[name="tanggal_keluar"]').daterangepicker();

    await getJabatan();
});

function showAddForm() {
    Swal.fire({
        title: 'Tambah Pegawai',
        showCancelButton: true,
        html: `
        <form id="form-add" class="text-sm" method="post" action="${urlStorePegawai}">
            <input type="hidden" name="_token" value="${csrfToken}">
            <div>
                Nama : <input class="input m-4 p-2 border-black" name="nama">
            </div>
            <div>
                Alamat : <input class="input m-4 p-2 border-black" name="alamat">
            </div>
            <div>
                No. Telp : <input class="input m-4 p-2 border-black" name="no_telp">
            </div>
            <div>
                Email : <input class="input m-4 p-2 border-black" type="email" name="email">
            </div>
            <div>
                Jabatan : <select id="select-jabatan" class="select md:text-lg border-black" name="jabatan_id"></select>
            </div>
            <div>
                Tanggal Masuk : <input class="input m-4 p-2 border-black" name="tanggal_masuk" type="date" placeholder="Tanggal Masuk">
            </div>
            <div>
                Tanggal Keluar : <input class="input m-4 p-2 border-black" name="tanggal_keluar" type="date" placeholder="Tanggal Keluar">
            </div>
        </form>`,
    }).then(result => {
        if (result.isConfirmed) $('#form-add').submit();
    });
    setSelectJabatan();
}

async function showEditForm(id) {
    const data = await $.get('/' + id);
    Swal.fire({
        title: 'Edit Pegawai',
        showCancelButton: true,
        html: `
        <form id="form-edit" class="text-sm" method="post" action="${urlUpdatePegawai}">
            <input type="hidden" name="_token" value="${csrfToken}">
            <input type="hidden" name="id" value="${id}">
            <input type="hidden" name="_method" value="PUT">
            <div>
                Nama : <input class="input m-4 p-2 border-black" name="nama" value="${data.nama}">
            </div>
            <div>
                Alamat : <input class="input m-4 p-2 border-black" name="alamat" value="${data.alamat}">
            </div>
            <div>
                No. Telp : <input class="input m-4 p-2 border-black" name="no_telp" value="${data.no_telp}">
            </div>
            <div>
                Email : <input class="input m-4 p-2 border-black" type="email" name="email" value="${data.email}">
            </div>
            <div>
                Jabatan : <select id="select-jabatan" class="select md:text-lg border-black" name="jabatan_id"></select>
            </div>
            <div>
                Tanggal Masuk : <input class="input m-4 p-2 border-black" name="tanggal_masuk" type="date" placeholder="Tanggal Masuk" value="${data.tanggal_masuk}">
            </div>
            <div>
                Tanggal Keluar : <input class="input m-4 p-2 border-black" name="tanggal_keluar" type="date" placeholder="Tanggal Keluar" value="${data.tanggal_keluar}">
            </div>
        </form>`,
    }).then(result => {
        if (result.isConfirmed) $('#form-edit').submit();
    });
    setSelectJabatan(data.jabatan_id);
}

let jabatan;
async function getJabatan() {
    jabatan = await $.get(urlListJabatan);
}
function setSelectJabatan(id = null) {
    jabatan.forEach(jabatan => {
        $('#select-jabatan').append(`<option value="${jabatan.id}" ${jabatan.id == id ? "selected" : ""}>${jabatan.nama}</option>`)
    });
}