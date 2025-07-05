@extends('layouts.app')

@section('content')

<!-- Home -->
<section id="home" class="slider" style="padding-top: 60px;">
    <div class="single-slider" style="background-image:url('{{ asset('template/img/suamikk.png') }}'); color: white;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="text" style="color: white; margin-top: 180px;">
                        <h1 style="color: white" >Welcome to AIME</h1>
                        <p style="color: white" >"Let Your Eyes Tell the Story. AIME Will Read It."</p>
                        <div style="display: flex; margin-top: 50px;">
                            <button onclick="document.getElementById('classification').scrollIntoView({ behavior: 'smooth' });" class="new-btn">
                                Check Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Home -->

<!-- Fact Section -->
<section id="fact" class="Fact section back-fact" style="background-image:url('{{ asset('template/img/factbg.png') }}'); color: white;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 style="color: white" >Fact</h2>
                    <p style="color: white" >
                        Diabetes detection based on retinal fundus images is a method to recognize signs of 
                        diabetes through photos of the inside of the eye, especially the retina. In people with diabetes, 
                        blood vessels in the retina can be damaged, which is called diabetic retinopathy. Fundus images are taken with a special camera, 
                        then analyzed using artificial intelligence technology such as Convolutional Neural Network (CNN). 
                        CNN can detect damage patterns automatically, thus helping early diagnosis and preventing further complications.                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Fact -->

<!-- Classification Section -->
<section id="classification" class="Classification section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Classification</h2>
                    <p style="color: black;">Diabetes Classification Based on Retinal Fundus Images Using CNN</p>
                </div>
            </div>
        </div>

        <!-- Upload Wrapper -->
        <div class="upload-wrapper">
            <input type="text" id="uploadPath" class="upload-path" placeholder="Upload Your Retinal Fundus" readonly>
            <button type="button" class="upload-btn">Upload</button>
        </div>

        <!-- Form -->
        <form id="uploadForm" method="POST" action="{{ route('classify') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" id="fileInput" accept="image/*" style="display: none;">

            <div style="display: flex; justify-content: center; margin-top: 20px;">
                <button type="submit" id="submitBtn" class="new-btn" style="display: none; padding: 10px 20px; font-size: 16px;">
                    Submit & Predict
                </button>
            </div>
        </form>

        <!-- Prediction Result -->
        @php
            $result = session('result');
            $imageUrl = session('imageUrl');
        @endphp
        @if($result && $imageUrl)
        <div id="prediction-result" class="prediction-result"  style="
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        ">
            <h4 style="margin-bottom: 20px; color: #333;">Prediction Results</h4>
            <p style="font-size: 18px;"><strong>Prediction:</strong> {{ ucfirst($result['prediction']) }}</p>
            <p style="font-size: 18px;"><strong>Confidence:</strong> {{ number_format($result['confidence'] * 100, 2) }}%</p>
            <img src="{{ $imageUrl }}" alt="Uploaded Image" style="max-width: 300px; margin-top: 20px; border-radius: 10px; border: 1px solid #ddd;">
        </div>
        @endif
</section>
<!--/ End Classification -->

<!-- About Us -->
<section id="aboutus" class="AboutUs section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>About Us</h2>
                    <p style="color: black;">Get to know about us and the people behind it!</p>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="owl-carousel portfolio-slider">
                        @for($i = 1; $i <= 11; $i++)
                            @if(in_array($i, [1, 2, 3, 5, 7, 9, 10, 11]))
                                <div class="single-pf">
                                    <img src="{{ asset('template/img/img (' . $i . ').jpg') }}" alt="#">
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End About Us -->

@endsection

@push('scripts')
<script>

    window.addEventListener("load", function () {
        const preloader = document.getElementById("preloader");
        preloader.classList.add("open");

        setTimeout(() => {
        preloader.style.display = "none";
        document.getElementById("konten").style.display = "block";
        document.body.style.overflow = "auto";
        }, 1200); // Waktu tunggu agar animasi selesai dulu
    });

    document.addEventListener("DOMContentLoaded", function () {
        const sections = document.querySelectorAll("section[id]");
        const navLinks = document.querySelectorAll("nav ul li a");

        function setActiveNav() {
            let scrollY = window.pageYOffset;

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 120;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute("id");

                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    navLinks.forEach(link => {
                        link.classList.remove("active");
                        if (link.getAttribute("href") === `#${sectionId}`) {
                            link.classList.add("active");
                        }
                    });
                }
            });
        }

        window.addEventListener("scroll", setActiveNav);
        setActiveNav();
    });

    // Tombol upload membuka file picker
    document.querySelector('.upload-btn').addEventListener('click', function () {
        document.querySelector('#fileInput').click();
    });

    // Saat file dipilih
    document.querySelector('#fileInput').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (!file) return;

        document.querySelector('#uploadPath').value = file.name;
        document.querySelector('#submitBtn').style.display = 'inline-block';
    });

    // Saat form disubmit
    document.querySelector('#uploadForm').addEventListener('submit', function () {
        const submitBtn = document.querySelector('#submitBtn');
        submitBtn.innerText = "Processing...";
        submitBtn.disabled = true;
    });

    // Scroll otomatis saat URL mengandung hash ke hasil prediksi
    window.addEventListener('load', function () {
        if (window.location.hash === "#prediction-result") {
            const el = document.getElementById('prediction-result');
            setTimeout(() => {
                if (el) {
                    const yOffset = -100; // Ubah sesuai tinggi header
                    const y = el.getBoundingClientRect().top + window.pageYOffset + yOffset;
                    window.scrollTo({ top: y, behavior: 'smooth' });
                }
            }, 300); // Delay untuk memastikan elemen sudah render
        }
    });
</script>
@endpush

