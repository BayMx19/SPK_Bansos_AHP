<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('image\Logo_Kota_Kediri_-_Seal_of_Kediri_City.svg') }}">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- SwiperJS Styles -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <title>Bantuan Sosial AHP</title>
</head>

<body style="font-family: Poppins">

    <!-- Navbar -->
    <nav class="bg-white sticky top-0 border-gray-200 dark:bg-gray-900 z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3">
                <img src="{{ asset('image\Logo_Kota_Kediri_-_Seal_of_Kediri_City.svg') }}" class="h-8" alt="Logo" />
                <span class="self-center text-2xl font-semibold dark:text-white">Bantuan Sosial</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="md:hidden p-2 w-10 h-10 text-gray-500 rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden md:block w-full md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col md:flex-row md:space-x-8 p-4 md:p-0 mt-4 md:mt-0 bg-gray-50 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900">
                    <li><a href="#home" class="block py-2 px-3 hover:text-blue-700 dark:text-white">Beranda</a></li>
                    <li><a href="#pengumuman"
                            class="block py-2 px-3 text-gray-900 hover:text-blue-700 dark:text-white">Pengumuman</a>
                    </li>
                    <li><a href="#kontak"
                            class="block py-2 px-3 text-gray-900 hover:text-blue-700 dark:text-white">Kontak
                            Kami</a></li>
                    <li>

                        <nav class="-mx-3 flex flex-1 justify-end">

                            <!-- <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a> -->

                            <a href="{{ route('login') }}"
                                class="bg-[#ed722a] rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Log in
                            </a>


                        </nav>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home" class="home min-h-full px-30 py-10 bg-[#113d3c] text-white">
        <div class="flex flex-col md:flex-row justify-between items-center gap-10">
            <div>
                <h1 class="font-bold text-4xl sm:text-5xl md:text-6xl lg:text-5xl leading-tight">
                    Bantuan Sosial <br>
                    Kelurahan Campurrejo <br>
                    Kediri, Jawa Timur
                </h1>
                <p class="my-6 text-gray-400 text-sm md:text-base">
                    Bantuan sosial (Bansos) adalah sebagai bentuk dukungan atau bantuan <br> yang diberikan oleh
                    pemerintah kepada masyarakat untuk membantu <br> meringankan beban ekonomi, terutama bagi mereka
                    yang kurang mampu <br> atau berada dalam kondisi rentan.
                </p>
                <button id="scrollBtn" class="rounded-md bg-[#ed722a] font-bold px-5 py-2">Pengumuman</button>
            </div>
            <div>
                <img src="{{ asset('image\help.svg') }}" alt="Help Image"
                    class="w-full max-w-md hidden md:block sm:block">
            </div>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="about py-10 bg-gray-200">
        <div class="max-w-4xl mx-auto">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('/image/bansos/image-1.jpeg') }}" alt="Program 1"
                            class="w-full rounded-lg shadow-md">
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('/image/bansos/image-2.jpg') }}" alt="Program 2"
                            class="w-full rounded-lg shadow-md">
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('/image/bansos/image-3.jpg') }}" alt="Program 3"
                            class="w-full rounded-lg shadow-md">
                    </div>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- Pengumuman Section -->
    <section id="pengumuman" class="bansos py-10 bg-gray-200">
        <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-100">
            <p class="text-center font-semibold text-2xl text-[#113D3C]">Cari Informasi Penerima Bantuan !</p></br>
            <div class="flex justify-center items-center">
                <div class="flex space-x-4">
                    <input type="text" id="searchNIK" placeholder="Cari NIK..."
                        class="px-6 py-3 w-96 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <button id="searchButton"
                        class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Cari
                    </button>
                </div>
            </div>

            <div class="flex justify-center mt-8 px-4">
                <div class="w-full max-w-4xl bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
                    <table class="min-w-full table-auto border-separate border-spacing-2">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">No</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">NIK</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm" id="rekomendasiTabelBody">
                            @foreach ($rekomendasi as $index => $item)
                            <tr class="border-b hover:bg-blue-50 transition-colors duration-200"
                                data-nik="{{ $item->warga->NIK }}">
                                <td class="px-6 py-4 text-gray-800">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $item->warga->nama }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $item->warga->NIK }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-[#113d3c] text-gray-100 py-10">
        <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-5">
            <!-- Kolom Pertama: Logo dan Deskripsi -->
            <div class="flex flex-col items-center md:items-start">
                <img src="{{ asset('image\Logo_Kota_Kediri_-_Seal_of_Kediri_City.svg') }}" class="h-16 mb-4"
                    alt="Logo" />
                <p class="text-center md:text-left text-sm opacity-80">A part of Kediri The Service City<br>Melayani
                    Sepenuh Hati</p>
            </div>

            <!-- Kolom Kedua: Navigasi -->
            <div class="text-center md:text-left">
                <h4 class="font-bold text-lg mb-4">Navigation</h4>
                <ul>
                    <li><a href="#home" class="hover:underline hover:text-[#f1c40f] transition-all">Beranda</a></li>
                    <li><a href="#pengumuman" class="hover:underline hover:text-[#f1c40f] transition-all">Pengumuman</a>
                    </li>
                    <li><a href="#" class="hover:underline hover:text-[#f1c40f] transition-all">Hubungi</a></li>
                </ul>
            </div>

            <!-- Kolom Ketiga: Contact Us -->
            <div class="text-center md:text-left">
                <h4 class="font-bold text-lg mb-4">Contact Us</h4>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <i class="fa-solid fa-location-dot mr-2"></i>
                        <span>Kediri, Jawa Timur</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-envelope mr-2"></i>
                        <span>kediri@mail.com</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-phone mr-2"></i>
                        <span>+6285923232323</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="border-t border-gray-600 mt-8 pt-4 text-center">
            <p class="text-sm opacity-70">&copy; 2025 Kediri. All Rights Reserved.</p>
        </div>
    </footer>


    <script src="https://kit.fontawesome.com/998802c292.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
    AOS.init();

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function(event) {
            event.preventDefault();

            const targetId = this.getAttribute("href");

            const targetElement = document.querySelector(targetId);

            window.scrollTo({
                top: targetElement.offsetTop - 60,
                behavior: 'smooth'
            });
        });
    });

    document.getElementById('scrollBtn').addEventListener('click', function(event) {
        event.preventDefault();

        const targetElement = document.getElementById('pengumuman');

        window.scrollTo({
            top: targetElement.offsetTop -
                60,
            behavior: 'smooth'
        });
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchNIK');
        const searchButton = document.getElementById('searchButton');
        const tableBody = document.getElementById('rekomendasiTabelBody');
        const rows = tableBody.getElementsByTagName('tr');

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();

            for (let row of rows) {
                const nameCell = row.getElementsByTagName('td')[1];
                const nikCell = row.getElementsByTagName('td')[2];

                const nameText = nameCell.textContent.toLowerCase();
                const nikText = nikCell.textContent.toLowerCase();

                if (nameText.includes(searchTerm) || nikText.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        searchButton.addEventListener('click', filterTable);

        searchInput.addEventListener('input', filterTable);
    });
    </script>
    <!-- SwiperJS Script -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    </script>

</body>



</html>
