@extends('layouts.siswa')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-2">Cari Jurusan Kuliah</h1>
<p class="text-gray-500 mb-8">Jawab 6 pertanyaan berikut dengan jujur — tidak ada jawaban benar atau salah! 😊</p>

<form method="POST" action="{{ route('siswa.assessment.store') }}" class="space-y-6">
    @csrf

    {{-- Pertanyaan 1: Teknologi --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <p class="font-semibold text-gray-800 mb-1">1. Seberapa kamu suka sama dunia teknologi & komputer?</p>
        <p class="text-sm text-gray-400 mb-4">Coding, gadget, robotik, elektronika, atau hal-hal teknis lainnya</p>
        <input type="hidden" name="criteria_1" id="criteria_1" value="3">
        <div class="grid grid-cols-1 gap-2">
            @foreach([
                1 => 'Sama sekali tidak suka, teknologi bikin pusing 😵',
                2 => 'Kurang suka, lebih enjoy hal lain',
                3 => 'Biasa aja, ga suka ga benci',
                4 => 'Lumayan suka, sering ngulik teknologi',
                5 => 'Suka banget! Hobi ngulik komputer / gadget / coding 💻',
            ] as $val => $label)
            <label class="cursor-pointer">
                <input type="radio" name="criteria_1_radio" value="{{ $val }}"
                       class="hidden peer" {{ $val == 3 ? 'checked' : '' }}
                       onchange="document.getElementById('criteria_1').value = this.value">
                <div class="peer-checked:bg-indigo-600 peer-checked:text-white border-2 border-gray-200
                            rounded-xl px-5 py-3 text-gray-700 hover:border-indigo-400 transition flex gap-3 items-center">
                    <span class="font-bold text-lg w-5">{{ $val }}</span>
                    <span>{{ $label }}</span>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    {{-- Pertanyaan 2: Kesehatan --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <p class="font-semibold text-gray-800 mb-1">2. Gimana ketertarikan kamu ke dunia kesehatan & biologi?</p>
        <p class="text-sm text-gray-400 mb-4">Dokter, perawat, farmasi, kesehatan masyarakat, atau ilmu tubuh manusia</p>
        <input type="hidden" name="criteria_2" id="criteria_2" value="3">
        <div class="grid grid-cols-1 gap-2">
            @foreach([
                1 => 'Tidak tertarik sama sekali, takut darah juga 😅',
                2 => 'Kurang tertarik',
                3 => 'Biasa aja',
                4 => 'Lumayan tertarik, sering baca soal kesehatan',
                5 => 'Sangat tertarik! Cita-cita di bidang kesehatan 🏥',
            ] as $val => $label)
            <label class="cursor-pointer">
                <input type="radio" name="criteria_2_radio" value="{{ $val }}"
                       class="hidden peer" {{ $val == 3 ? 'checked' : '' }}
                       onchange="document.getElementById('criteria_2').value = this.value">
                <div class="peer-checked:bg-indigo-600 peer-checked:text-white border-2 border-gray-200
                            rounded-xl px-5 py-3 text-gray-700 hover:border-indigo-400 transition flex gap-3 items-center">
                    <span class="font-bold text-lg w-5">{{ $val }}</span>
                    <span>{{ $label }}</span>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    {{-- Pertanyaan 3: Sosial --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <p class="font-semibold text-gray-800 mb-1">3. Seberapa kamu suka berinteraksi, komunikasi, dan hal sosial?</p>
        <p class="text-sm text-gray-400 mb-4">Ngomong di depan umum, nulis, media sosial, mengajar, atau membantu orang lain</p>
        <input type="hidden" name="criteria_3" id="criteria_3" value="3">
        <div class="grid grid-cols-1 gap-2">
            @foreach([
                1 => 'Introvert banget, lebih suka sendiri 🙈',
                2 => 'Kurang suka interaksi banyak orang',
                3 => 'Biasa aja, tergantung situasi',
                4 => 'Lumayan suka, enjoy ngobrol dan bersosialisasi',
                5 => 'Sangat suka! Seneng ngomong, ngajar, atau nulis 🎤',
            ] as $val => $label)
            <label class="cursor-pointer">
                <input type="radio" name="criteria_3_radio" value="{{ $val }}"
                       class="hidden peer" {{ $val == 3 ? 'checked' : '' }}
                       onchange="document.getElementById('criteria_3').value = this.value">
                <div class="peer-checked:bg-indigo-600 peer-checked:text-white border-2 border-gray-200
                            rounded-xl px-5 py-3 text-gray-700 hover:border-indigo-400 transition flex gap-3 items-center">
                    <span class="font-bold text-lg w-5">{{ $val }}</span>
                    <span>{{ $label }}</span>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    {{-- Pertanyaan 4: Bisnis --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <p class="font-semibold text-gray-800 mb-1">4. Gimana ketertarikan kamu ke dunia bisnis, uang, dan keuangan?</p>
        <p class="text-sm text-gray-400 mb-4">Berdagang, hitung-hitungan keuangan, investasi, manajemen, atau pengen jadi pengusaha</p>
        <input type="hidden" name="criteria_4" id="criteria_4" value="3">
        <div class="grid grid-cols-1 gap-2">
            @foreach([
                1 => 'Tidak tertarik sama sekali dengan bisnis & keuangan',
                2 => 'Kurang tertarik',
                3 => 'Biasa aja',
                4 => 'Lumayan tertarik, suka mikirin bisnis',
                5 => 'Sangat tertarik! Pengen jadi pengusaha atau ahli keuangan 💰',
            ] as $val => $label)
            <label class="cursor-pointer">
                <input type="radio" name="criteria_4_radio" value="{{ $val }}"
                       class="hidden peer" {{ $val == 3 ? 'checked' : '' }}
                       onchange="document.getElementById('criteria_4').value = this.value">
                <div class="peer-checked:bg-indigo-600 peer-checked:text-white border-2 border-gray-200
                            rounded-xl px-5 py-3 text-gray-700 hover:border-indigo-400 transition flex gap-3 items-center">
                    <span class="font-bold text-lg w-5">{{ $val }}</span>
                    <span>{{ $label }}</span>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    {{-- Pertanyaan 5: Budget --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <p class="font-semibold text-gray-800 mb-1">5. Kira-kira budget kuliah dari keluarga kamu per tahun berapa?</p>
        <p class="text-sm text-gray-400 mb-4">Termasuk UKT/SPP + biaya hidup. Jujur ya, ini rahasia 🙏</p>
        <input type="hidden" name="criteria_5" id="criteria_5" value="3">
        <div class="grid grid-cols-1 gap-2">
            @foreach([
                1 => 'Lebih dari Rp 30 juta per tahun',
                2 => 'Rp 20 juta – Rp 30 juta per tahun',
                3 => 'Rp 10 juta – Rp 20 juta per tahun',
                4 => 'Rp 5 juta – Rp 10 juta per tahun',
                5 => 'Kurang dari Rp 5 juta per tahun',
            ] as $val => $label)
            <label class="cursor-pointer">
                <input type="radio" name="criteria_5_radio" value="{{ $val }}"
                       class="hidden peer" {{ $val == 3 ? 'checked' : '' }}
                       onchange="document.getElementById('criteria_5').value = this.value">
                <div class="peer-checked:bg-indigo-600 peer-checked:text-white border-2 border-gray-200
                            rounded-xl px-5 py-3 text-gray-700 font-medium hover:border-indigo-400 transition flex gap-3 items-center">
                    <span class="font-bold text-lg w-5">{{ $val }}</span>
                    <span>{{ $label }}</span>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    {{-- Pertanyaan 6: Prospek Kerja --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <p class="font-semibold text-gray-800 mb-1">6. Seberapa penting prospek kerja & gaji besar buat kamu?</p>
        <p class="text-sm text-gray-400 mb-4">Ga ada jawaban yang salah, ini murni preferensi kamu</p>
        <input type="hidden" name="criteria_6" id="criteria_6" value="3">
        <div class="grid grid-cols-1 gap-2">
            @foreach([
                1 => 'Ga penting, yang penting passion & happy 😊',
                2 => 'Kurang penting, lebih fokus ke minat',
                3 => 'Seimbang antara minat dan prospek karir',
                4 => 'Penting, mau karir yang jelas dan stabil',
                5 => 'Sangat penting! Prioritas utama gaji besar & karir cemerlang 🚀',
            ] as $val => $label)
            <label class="cursor-pointer">
                <input type="radio" name="criteria_6_radio" value="{{ $val }}"
                       class="hidden peer" {{ $val == 3 ? 'checked' : '' }}
                       onchange="document.getElementById('criteria_6').value = this.value">
                <div class="peer-checked:bg-indigo-600 peer-checked:text-white border-2 border-gray-200
                            rounded-xl px-5 py-3 text-gray-700 hover:border-indigo-400 transition flex gap-3 items-center">
                    <span class="font-bold text-lg w-5">{{ $val }}</span>
                    <span>{{ $label }}</span>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    <button type="submit"
            class="w-full bg-indigo-600 text-white py-4 rounded-xl font-semibold text-lg hover:bg-indigo-700 transition">
        Hitung Rekomendasi Jurusan →
    </button>

</form>
@endsection