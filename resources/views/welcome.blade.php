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
                    <li><a href="#" class="block py-2 px-3 hover:text-blue-700 dark:text-white">Beranda</a></li>
                    <li><a href="#"
                            class="block py-2 px-3 text-gray-900 hover:text-blue-700 dark:text-white">Pengumuman</a>
                    </li>
                    <li><a href="#" class="block py-2 px-3 text-gray-900 hover:text-blue-700 dark:text-white">Kontak
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
    <section class="home min-h-full  bg-[#113d3c] text-white">
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

    <!-- Info Section -->
    <section class="about py-10 bg-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 px-5">
            <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-100" data-aos="fade-up" data-aos-delay="400">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Program 1</h5>
                <p class="text-gray-700">Deskripsi singkat mengenai program bantuan sosial pertama.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-100" data-aos="fade-up" data-aos-delay="400">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Program 2</h5>
                <p class="text-gray-700">Deskripsi singkat mengenai program bantuan sosial kedua.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-100" data-aos="fade-up" data-aos-delay="400">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Program 3</h5>
                <p class="text-gray-700">Deskripsi singkat mengenai program bantuan sosial ketiga.</p>
            </div>
        </div>
    </section>

    <!-- Pengumuman Section -->
    <section id="pengumuman" class="bansos py-10 bg-gray-200">
        <div class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-100">
            <p class="text-center font-semibold text-2xl text-[#113D3C]">Cari Informasi Penerima Bantuan !</p></br>
            <div class="flex justify-center items-center">
                <div class="flex space-x-4">
                    <input type="text" placeholder="Cari NIK..."
                        class="px-6 py-3 w-96 border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <button
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
                        <tbody class="text-sm">
                            @foreach ($rekomendasi as $index => $item)
                            <tr class="border-b hover:bg-blue-50 transition-colors duration-200">
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
    <footer class="bg-[#113d3c] text-gray-100 py-10">
        <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-3 justify-center items-center gap-5 px-5">
            <div>
                <img src="{{ asset('image\Logo_Kota_Kediri_-_Seal_of_Kediri_City.svg') }}" class="h-12" alt="Logo" />
                <p class="mt-3">A part of Kediri The Service City<br>Melayani Sepenuh Hati</p>
            </div>
            <div>
                <h4 class="font-bold mb-3">Navigation</h4>
                <ul>
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">About Us</a></li>
                    <li><a href="#" class="hover:underline">Laman Perangkingan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-3">Contact Us</h4>
                <ul>
                    <li><i class="fa-solid fa-location-dot"></i> Kediri, Jawa Timur</li>
                    <li><i class="fa-solid fa-envelope"></i> kediri@mail.com</li>
                    <li><i class="fa-solid fa-phone"></i> +6285923232323</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-600 mt-5 pt-5 text-center">
            <p class="text-sm">&copy; 2025 Kediri. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/998802c292.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
    AOS.init();

    document.getElementById("scrollBtn").addEventListener("click", function() {
        document.getElementById("pengumuman").scrollIntoView({
            behavior: "smooth"
        });
    });
    </script>
</body>

</html>