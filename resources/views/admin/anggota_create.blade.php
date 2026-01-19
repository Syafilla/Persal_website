@extends('data')

@section('layout2')
<main>
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-6">
            <form id="formAnggota" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col items-center mb-6">
                    <div class="relative w-40 h-40 group">

                        <img id="previewImage" 
                            src="{{ asset('images/default-user.png') }}" 
                            class="w-full h-full object-cover rounded-xl border shadow"
                            alt="">
                        <label for="fotoInput"
                            class="absolute inset-0 bg-black bg-opacity-50 text-white 
                                flex items-center justify-center text-sm font-medium 
                                rounded-xl opacity-0 group-hover:opacity-100 
                                cursor-pointer transition">
                            Pilih Foto
                        </label>

                        <input type="file" name="foto" id="fotoInput"
                            class="hidden"
                            accept="image/*">
                    </div>

                    <button type="button" id="removeImage"
                        class="mt-3 bg-red-500 text-white px-4 py-1 text-sm rounded-md shadow">
                        Hapus Foto
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="font-semibold">NIA</label>
                        <input type="number" name="nia" value="{{ old('nia') }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">

                    </div>

                    <div>
                        <label class="font-semibold">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Nama Ibu</label>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Tahun Masuk</label>
                        <input type="number" name="tahun_masuk" value="{{ old('tahun_masuk') }}"
                            class="w-full border rounded-lg p-2 focus:ring focus:ring-indigo-300">
                    </div>

                    <div>
                        <label class="font-semibold">Jabatan</label>
                        <div class="flex gap-4 mt-1">
                            <label>
                                <input type="radio" name="jabatan" value="Pengurus"
                                    {{ old('jabatan') == 'Pengurus' ? 'checked' : '' }}>
                                Pengurus
                            </label>

                            <label>
                                <input type="radio" name="jabatan" value="Anggota"
                                    {{ old('jabatan') == 'Anggota' ? 'checked' : '' }}>
                                Anggota
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="font-semibold">Status</label>
                        <div class="flex gap-6 mt-1">
                            <label class="flex items-center gap-1">
                                <input type="radio" name="status" value="Aktif" 
                                    {{ old('status')=='Aktif' ? 'checked' : '' }}>
                                Aktif
                            </label>

                            <label class="flex items-center gap-1">
                                <input type="radio" name="status" value="Alumni" 
                                    {{ old('status')=='Alumni' ? 'checked' : '' }}>
                                Alumni
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="font-semibold">Hak Akses</label>
                        <div class="flex gap-4 mt-1">
                            <label>
                                <input type="radio" name="hak_akses" value="admin" 
                                {{ old('hak_akses')=='admin' ? 'checked' : '' }}>
                                Admin
                            </label>

                            <label>
                                <input type="radio" name="hak_akses" value="anggota" 
                                {{ old('hak_akses')=='anggota' ? 'checked' : '' }}>
                                Anggota
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex gap-3">

                    <button type="submit"
                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg shadow">
                        Simpan Data
                    </button>

                    <a href="{{ route('admin.dashboard') }}"
                        class="flex-1 text-center bg-gray-300 hover:bg-gray-400 
                            text-gray-800 font-semibold py-2 rounded-lg shadow">
                        Batal
                    </a>

                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const form = document.getElementById('formAnggota');
        const submitBtn = form.querySelector("button[type='submit']");

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Simpan data?',
                text: 'Pastikan semua data sudah benar.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, simpan',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) {
                    submitData();
                }
            });
        });

        function submitData() {
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Menyimpan...';

            const formData = new FormData(form);

            fetch("{{ route('form.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(async res => {
                const data = await res.json();
                if (!res.ok) throw data;
                return data;
            })
            .then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = "{{ route('anggota.list') }}";
                });
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Simpan Data';

                let pesan = '';
                if (err.errors) {
                    pesan = Object.values(err.errors).flat().join('<br>');
                } else {
                    pesan = 'Terjadi kesalahan saat menyimpan data';
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    html: pesan
                });
            });
        }
        </script>

    <script>
        const imgPreview = document.getElementById('previewImage');
        const fileInput = document.getElementById('fotoInput');
        const removeBtn = document.getElementById('removeImage');

        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) {
                imgPreview.src = URL.createObjectURL(file);
            }
        });

        removeBtn.addEventListener('click', () => {
            fileInput.value = "";
            imgPreview.src = "{{ asset('images/default-user.png') }}";
        });
    </script>

    <script>
        const imgPreview = document.getElementById('previewImage');
        const fileInput = document.getElementById('fotoInput');
        const removeBtn = document.getElementById('removeImage');
        const form = document.querySelector('form');
        const submitBtn = form.querySelector("button[type='submit']");
        let isSubmitting = false;

        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) imgPreview.src = URL.createObjectURL(file);
        });

        removeBtn.addEventListener('click', () => {
            fileInput.value = "";
            imgPreview.src = "{{ asset('images/default-user.png') }}";
        });

        document.querySelector(".btn-batal")?.addEventListener("click", function(e){
            e.preventDefault();

            Swal.fire({
                title: "Batalkan pengisian?",
                text: "Data yang sudah diisi akan hilang.",
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

        document.querySelectorAll("input, select").forEach(input => {
            input.addEventListener("input", () => {
                if (input.value.trim() !== "") {
                    input.classList.remove("border-red-500");
                }
            });
        });

        const showToast = (msg, icon = "warning") => {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: icon,
                title: msg,
                showConfirmButton: false,
                timer: 2000
            });
        };

        document.querySelector("input[name='nia']").addEventListener("change", function () {
            fetch("{{ route('check.nia') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ nia: this.value })
            })
            .then(res => res.json())
            .then(data => {
                if (data.exists) {
                    showToast("NIA sudah digunakan!", "error");
                    this.classList.add("border-red-500");
                }
            });
        });

        document.querySelector("input[name='username']").addEventListener("change", function () {
            fetch("{{ route('check.username') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ username: this.value })
            })
            .then(res => res.json())
            .then(data => {
                if (data.exists) {
                    showToast("Username sudah digunakan!", "error");
                    this.classList.add("border-red-500");
                }
            });
        });

        function submitForm() {
            isSubmitting = true;

            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <span class="animate-spin border-2 border-white border-t-transparent rounded-full w-4 h-4 inline-block mr-2"></span>
                Menyimpan...
            `;
        }

        @if(session('success'))
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan!',
                html: `{!! implode('<br>', $errors->all()) !!}`,
            });

            @foreach ($errors->keys() as $field)
                document.querySelector("[name='{{ $field }}']").classList.add("border-red-500");
            @endforeach

            const firstError = document.querySelector(".border-red-500");
            if (firstError) {
                firstError.scrollIntoView({ behavior: "smooth", block: "center" });
            }
        @endif
    </script>
</main>
@endsection
