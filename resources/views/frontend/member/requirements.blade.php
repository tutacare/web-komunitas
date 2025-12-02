@extends('layouts.frontend')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4 text-center">Persyaratan Menjadi Member</h2>

            <div class="card shadow-sm border-0 p-4">
                <h5 class="fw-bold mb-3">Syarat Umum</h5>
                <ul>
                    <li>Warga Negara Indonesia berusia minimal 17 tahun.</li>
                    <li>Memiliki minat terhadap kegiatan komunitas.</li>
                    <li>Mampu mengikuti kegiatan rutin dan aturan komunitas.</li>
                    <li>Memiliki identitas diri yang sah (KTP/SIM).</li>
                    <li>Bersedia mengikuti seluruh program dan agenda komunitas.</li>
                </ul>

                <h5 class="fw-bold mt-4 mb-3">Dokumen yang Diperlukan</h5>
                <ul>
                    <li>Foto KTP</li>
                    <li>Foto diri terbaru</li>
                    <li>Formulir pendaftaran yang sudah diisi</li>
                </ul>

                <div class="mt-4">
                    <a href="{{ route('member.registration') }}" class="btn btn-dark">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
