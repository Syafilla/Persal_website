@extends('app')

@section('content')
<style>
.gallery-filter {display:flex;gap:10px;overflow-x:auto;padding-bottom:10px;}
.gallery-filter button{padding:6px 15px;border-radius:20px;border:none;background:#ddd;cursor:pointer;white-space:nowrap;}
.gallery-filter button.active{background:#007bff;color:white;}
.gallery-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:10px;margin-top:15px;}
.gallery-grid img{width:100%;border-radius:6px;cursor:pointer;transition:.3s;}
.gallery-grid img:hover{transform:scale(1.03);}
#lightbox{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.9);display:none;align-items:center;justify-content:center;z-index:9999;}
#lightbox img{max-width:90%;max-height:80%;border-radius:10px;}
.slide-btn{position:absolute;top:50%;font-size:40px;color:white;cursor:pointer;}
.left{left:30px;} .right{right:30px;}
.close-box{position:absolute;top:20px;right:30px;font-size:40px;color:white;cursor:pointer;}
.info{color:#fff;text-align:center;margin-top:10px;}
</style>


<h2>Galeri Foto</h2>

<div class="gallery-filter">
    <button class="filter active" data-filter="all">All</button>
    @foreach($kategori as $kategori)
    <button class="filter" data-filter="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</button>
    @endforeach
</div>

<div class="gallery-grid">
@foreach($galeri as $galeri)
    <img src="{{ asset($galeri->foto) }}" data-kategori="{{ $galeri->kategori_id }}" data-angkatan="{{ $galeri->angkatan }}">
@endforeach
</div>

<!-- Lightbox -->
<div id="lightbox">
    <span class="close-box">&times;</span>
    <span class="slide-btn left">&#10094;</span>

    <div class="content-box">
        <img id="light-img">
        <div class="info" id="info"></div>

        <a id="downloadBtn" class="download-btn" download>
            Download Foto
        </a>
    </div>

    <span class="slide-btn right">&#10095;</span>
</div>

<style>
#lightbox{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.9);
display:none;align-items:center;justify-content:center;z-index:9999;flex-direction:column}
.content-box{text-align:center;}
.download-btn{background:#28a745;padding:10px 18px;margin-top:15px;border-radius:8px;color:white;
display:inline-block;font-weight:bold}
.download-btn:hover{background:#1e7e34}
</style>

<script>
let imgs=[...document.querySelectorAll('.gallery-grid img')], index=0;
const box=document.getElementById('lightbox');
const light=document.getElementById('light-img');
const info=document.getElementById('info');
const downloadBtn=document.getElementById('downloadBtn');

imgs.forEach((img,i)=>img.onclick=()=>{index=i;show();});

function show(){
    let el=imgs[index];
    light.src=el.src;
    info.innerHTML="Angkatan: "+el.dataset.angkatan;

    // 🔽 Set link download foto saat fullscreen
    downloadBtn.href = el.src;

    box.style.display='flex';
}
document.querySelector('.close-box').onclick=()=>box.style.display='none';
document.querySelector('.right').onclick=()=>{index=(index+1)%imgs.length;show();}
document.querySelector('.left').onclick=()=>{index=(index-1+imgs.length)%imgs.length;show();}
</script>

@endsection
