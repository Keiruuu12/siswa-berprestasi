let semuaTombol = document.querySelectorAll('.btn-hapus');
semuaTombol.forEach(function(item) {
    item.addEventListener('click', konfirmasi);
});

function konfirmasi(event) {
    let tombol = event.currentTarget;
    let judulAlert;
    let teksAlert;

    switch(tombol.getAttribute('data-table')) {
        case 'siswa':
        judulAlert = 'Apakah anda yakin?';
        teksAlert = 'Hapus data <b>'+tombol.getAttribute('data-name')+'</b>';
        break;
        default:
        judulAlert = 'Apakah anda yakin?';
        teksAlert = 'Data akan dihapus';
        break;
    }

    event.preventDefault();
    Swal.fire({
        title: judulAlert,
        html: teksAlert,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#6c757d',
        confirmButtonColor: '#dc3545',
        cancelButtonText: 'tidak jadi',
        confirmButtonText: 'ya, hapus!',
        reverseButtons: true,
    })
    .then((result) => {
        if(result.value) {
            tombol.parentElement.submit();
        }
    })
}