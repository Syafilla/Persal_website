@extends('admin')

@section('layout1')
<style>
.card{border-radius:10px;}
.img-thumb{width:100px;height:80px;object-fit:cover;border-radius:6px;}
.category-list{display:flex;gap:10px;flex-wrap:wrap;margin-top:15px;}
.category-item{background:#e3e3e3;padding:6px 15px;border-radius:25px;display:flex;align-items:center;gap:6px;}
.category-item span{font-weight:bold;}
.category-item button{background:none;border:none;color:red;font-size:16px;cursor:pointer;}

.gallery-table img{width:80px;height:60px;object-fit:cover;border-radius:6px;}
@media(max-width:768px){
    .gallery-table img{width:60px;height:50px;}
}
</style>
<main class="flex-grow-1">
    <div class="container-fluid">
        <h3 class="mb-3">Manajemen Galeri</h3>

        <div class="card p-3 mb-4">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="m-0">Kategori Foto</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalKategori">+ Tambah Kategori</button>
            </div>
            
            <div class="category-list">
                @foreach($kategori as $k)
                <div class="category-item">
                    <span>{{ $k->nama_kategori }}</span>
                    <button onclick="hapusKategori({{ $k->id }})" style="background:none;border:none;color:red;font-size:18px;cursor:pointer;">&times;</button>
                </div>
                @endforeach
            </div>
        </div>


        <div class="card p-3 mb-4">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="m-0">Tambah Foto Baru</h5>
            </div>

            <form action="{{ route('galeri.storeFoto') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Tahun Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" placeholder="contoh: 2024" required>
                    </div>

                    <div class="col-md-4">
                        <label>Upload Foto</label>
                        <input type="file" name="foto[]" class="form-control" accept="image/*" multiple required>
                    </div>
                </div>

                <div class="mt-3">
                    <img id="preview" style="width:120px;border-radius:6px;display:none;">
                </div>

                <button class="btn btn-success mt-3">Simpan Foto</button>
            </form>
        </div>


        <div class="card p-3">

            <div class="mb-3 d-flex flex-wrap gap-2">
                <button class="btn btn-sm btn-primary filter-btn" data-id="">All</button>
                @foreach($kategori as $k)
                    <button class="btn btn-sm btn-outline-primary filter-btn" data-id="{{ $k->id }}">
                        {{ $k->nama_kategori }}
                    </button>
                @endforeach
            </div>

            <h5>Daftar Foto</h5>

            <div class="row mt-3" id="gallery-container">
                @foreach($galeri as $g)
                <div class="col-md-3 col-6 mb-3 item-foto" id="foto-{{ $g->id }}">
                    <div class="card shadow-sm p-2 text-center" style="border-radius:10px;">
                        <img src="{{ url($g->foto) }}" class="w-100 mb-2"
                            style="height:150px;object-fit:cover;border-radius:6px;">

                        <small class="d-block fw-bold kategori-text">
                            {{ $g->kategori->nama_kategori }}
                        </small>
                        <small class="text-muted angkatan-text">
                            {{ $g->angkatan }}
                        </small>

                        <button class="btn btn-warning btn-sm w-100 mt-2"
                            onclick="editFoto(
                                {{ $g->id }},
                                {{ $g->kategori_id }},
                                '{{ $g->angkatan }}'
                            )">
                            Edit
                        </button>

                        <button onclick="hapusFoto({{ $g->id }})"
                            class="btn btn-danger btn-sm w-100 mt-1">
                            Hapus
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

        </div>


    </div>
    <div class="modal fade" id="modalKategori">
        <div class="modal-dialog">
            <form method="post" action="{{ route('galeri.storeKategori') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5>Tambah Kategori</h5>
                    <i class="ion-close-round" data-bs-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modalEditFoto">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Edit Foto</h5>
                    <button class="ion-close-round" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_foto_id">

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select id="edit_kategori" class="form-control">
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}">
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Angkatan</label>
                        <input type="text" id="edit_angkatan"
                            class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary"
                            onclick="simpanEditFoto()">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
    function previewImg(e){
        let img=document.getElementById('preview');
        img.src=URL.createObjectURL(e.target.files[0]);
        img.style.display='block';
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
    document.querySelectorAll(".filter-btn").forEach(btn => {
        btn.addEventListener("click", function(){

            document.querySelectorAll(".filter-btn").forEach(b => {
                b.classList.remove("btn-primary");
                b.classList.remove("text-white");
                b.classList.add("btn-outline-primary");
            });

            this.classList.remove("btn-outline-primary");
            this.classList.add("btn-primary","text-white");

            let id = this.dataset.id;

            axios.get(`/galeri/filter/${id}`)
            .then(res=>{
                let tbody = document.querySelector("table tbody");
                tbody.innerHTML = "";

                if(res.data.length < 1){
                    tbody.innerHTML = "<tr><td colspan='4' class='text-center text-muted'>Tidak ada foto</td></tr>";
                    return;
                }

                res.data.forEach(item=>{
                    tbody.innerHTML += `
                    <tr>
                        <td><img src="/${item.foto}" style="width:150px;"></td>
                        <td>${item.kategori.nama_kategori}</td>
                        <td>${item.angkatan}</td>
                        <td>
                            <form action="/galeri/hapus-foto/${item.id}" method="post" onsubmit="return confirm('Hapus foto ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>`;
                });
            });
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function hapusFoto(id){
        Swal.fire({
            title: "Hapus Foto?",
            text: "Foto akan terhapus permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e3342f",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Hapus",
            cancelButtonText:"Batal",
        }).then((result)=>{
            if(result.isConfirmed){

                axios.delete(`/admin/galeri/hapusFoto/${id}`, {
                    data:{ _token:"{{ csrf_token() }}" }
                }).then(res=>{
                    Swal.fire({
                        icon:"success",
                        title:"Foto Terhapus",
                        text:"Foto berhasil dihapus",
                        timer:1500,
                        showConfirmButton:false,
                        position:"center"
                    });

                    document.getElementById(`foto-${id}`).remove();
                });
            }
        });
    }
    </script>
    <script>
    function hapusKategori(id){
        Swal.fire({
            title: "Hapus Kategori?",
            text: "Semua foto dalam kategori ini akan hilang!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e3342f",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Hapus",
            cancelButtonText:"Batal",
        }).then((result)=>{
            if(result.isConfirmed){
                
                axios.delete(`/admin/galeri/hapusKategori/${id}`, {
                    data:{ _token:"{{ csrf_token() }}" }
                }).then(res=>{
                    Swal.fire({
                        icon:"success",
                        title:"Kategori Terhapus",
                        text:"Berhasil menghapus kategori & foto terkait",
                        timer:1500,
                        showConfirmButton:false,
                        position:"center"
                    });

                    document.getElementById(`kategori-${id}`).style.opacity="0";
                    setTimeout(()=>document.getElementById(`kategori-${id}`).remove(),300);
                });
            }
        });
    }
    </script>
    <script>
    function editFoto(id, kategori_id, angkatan) {
        document.getElementById('edit_foto_id').value = id;
        document.getElementById('edit_kategori').value = kategori_id;
        document.getElementById('edit_angkatan').value = angkatan;

        new bootstrap.Modal(
            document.getElementById('modalEditFoto')
        ).show();
    }
    </script>
    <script>
    function simpanEditFoto(){

        const id = document.getElementById('edit_foto_id').value;

        axios.put(`/admin/galeri/updateFoto/${id}`, {
            kategori_id: document.getElementById('edit_kategori').value,
            angkatan: document.getElementById('edit_angkatan').value,
            _token: "{{ csrf_token() }}"
        })
        .then(res => {

            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "Foto berhasil diperbarui",
                timer: 1300,
                showConfirmButton: false
            });

            let foto = document.getElementById(`foto-${id}`);
            foto.querySelector(".kategori-text").innerText = res.data.kategori;
            foto.querySelector(".angkatan-text").innerText = res.data.angkatan;

            bootstrap.Modal
                .getInstance(document.getElementById('modalEditFoto'))
                .hide();
        });
    }
    </script>

</main>

@endsection
