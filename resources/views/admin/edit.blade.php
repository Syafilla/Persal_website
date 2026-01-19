@extends('data')

@section('layout2')
<main>
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-6">

            <form id="formEdit" action="{{ route('form.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-col items-center mb-6">
                    <div class="relative w-40 h-40 group">

                        <img id="previewImage"
                            src="{{ $user->foto ? asset('foto_anggota/' . $user->foto) : asset('images/default-user.png') }}"
                            class="w-full h-full object-cover rounded-xl border shadow"
                            alt="Preview Foto">

                        <label for="fotoInput"
                            class="absolute inset-0 bg-black bg-opacity-50 text-white 
                                flex items-center justify-center text-sm font-medium 
                                rounded-xl opacity-0 group-hover:opacity-100 
                                cursor-pointer transition">
                            Ganti Foto
                        </label>

                        <input type="file" name="foto" id="fotoInput" class="hidden" accept="image/*">
                    </div>

                    <button type="button" id="removeImage"
                        class="mt-3 bg-red-500 text-white px-4 py-1 text-sm rounded-md shadow">
                        Hapus Foto
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="font-semibold">NIA</label>
                        <input type="number" name="nia" value="{{ old('nia', $user->nia) }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"
                            value="{{ $user->name }}" required>
                    </div>

                    <div>
                        <label class="font-semibold">Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat', $user->alamat) }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $user->nama_ayah) }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Nama Ibu</label>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $user->nama_ibu) }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Tahun Masuk</label>
                        <input type="number" name="tahun_masuk" value="{{ old('tahun_masuk', $user->tahun_masuk) }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Pendidikan</label>
                        <select name="pendidikan" class="w-full border rounded-lg p-2">
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="SLTP"{{old('pendidikan', $user->pendidikan)=='SLTP' ? 'selected' : '' }}>SLTP</option>
                            <option value="SLTA"{{old('pendidikan', $user->pendidikan)=='SLTA' ? 'selected' : '' }}>SLTA</option>
                            <option value="PT"{{old('pendidikan', $user->pendidikan)=='PT' ? 'selected' : '' }}>PT</option>
                            <option value="Pasca Sarjana"{{ old('pendidikan', $user->pendidikan)=='Pasca Sarjana' ? 'selected' : '' }}>PASCA SARJANA</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold">Status</label>
                        <div class="flex gap-6 mt-1">
                            <label class="flex items-center gap-1">
                                <input type="radio" name="status" value="Aktif" 
                                    {{ old('status',$user->status)=='Aktif' ? 'checked' : '' }}>
                                Aktif
                            </label>

                            <label class="flex items-center gap-1">
                                <input type="radio" name="status" value="Alumni" 
                                    {{ old('status',$user->status)=='Alumni' ? 'checked' : '' }}>
                                Alumni
                            </label>
                        </div>
                    </div>
                
                    <div>
                        <label class="font-semibold">Jabatan</label>
                        <div class="flex gap-4 mt-1">
                            <label>
                                <input type="radio" name="jabatan" value="Pengurus"
                                {{ old('jabatan', $user->jabatan) == 'Pengurus' ? 'checked' : '' }}>
                                Pengurus
                            </label>

                            <label>
                                <input type="radio" name="jabatan" value="Anggota"
                                {{ old('jabatan', $user->jabatan) == 'Anggota' ? 'checked' : '' }}>
                                Anggota
                            </label>
                        </div>
                        <div class="mb-3">
                            <label>Hak Akses</label><br>

                            <label>
                                <input type="radio" name="hak_akses" value="admin" 
                                    {{ $user->hak_akses == 'admin' ? 'checked' : '' }}>
                                Admin
                            </label>
                            
                            &nbsp;&nbsp;

                            <label>
                                <input type="radio" name="hak_akses" value="anggota" 
                                    {{ $user->hak_akses == 'anggota' ? 'checked' : '' }}>
                                Anggota
                            </label>
                        </div>
                        <div>
                            <label class="font-semibold">Password Baru</label>
                            <input type="password" name="password" class="form-control" placeholder="Biarkan kosong jika tidak mengubah">
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit"
                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg shadow">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.dashboard') }}"
                        class="btn-batal flex-1 text-center bg-gray-300 hover:bg-gray-400 
                        text-gray-800 font-semibold py-2 rounded-lg shadow">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const imgPreview = document.getElementById('previewImage');
        const fileInput  = document.getElementById('fotoInput');
        const removeBtn  = document.getElementById('removeImage');

        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) imgPreview.src = URL.createObjectURL(file);
        });

        removeBtn.addEventListener('click', () => {
            fileInput.value = "";
            imgPreview.src = "{{ asset('images/default-user.png') }}";
        });

        document.querySelector(".btn-batal").addEventListener("click", function(e){
            e.preventDefault();

            Swal.fire({
                title: "Batalkan edit?",
                text: "Perubahan tidak akan disimpan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, batalkan",
                cancelButtonText: "Tidak"
            }).then(result => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('admin.dashboard') }}";
                }
            });
        });
        document.getElementById('formEdit').addEventListener('submit', function(e){
            e.preventDefault();

            Swal.fire({
                title: "Simpan perubahan?",
                text: "Pastikan data sudah benar.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal"
            }).then(result => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            });
        });

        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "{{ session('success') }}",
            }).then(() => {
            window.location.href = "{{ route('anggota.list') }}";
        });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: "error",
                title: "Gagal Menyimpan!",
                html: `{!! implode('<br>', $errors->all()) !!}`,
            });
        @endif
    </script>
</main>
@endsection
