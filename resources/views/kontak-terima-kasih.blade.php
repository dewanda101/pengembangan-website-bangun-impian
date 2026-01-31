@extends('layouts.app')

@section('title', 'Terima Kasih - Pesan Diterima')

@section('content')
    <section style="background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div style="background: white; padding: 4rem; border-radius: 16px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15); text-align: center;">
                        <!-- Success Icon -->
                        <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #27ae60 0%, #229954 100%); margin: 0 auto 2rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 20px rgba(39, 174, 96, 0.3);">
                            <i class="fas fa-check" style="font-size: 3rem; color: white;"></i>
                        </div>

                        <!-- Main Message -->
                        <h1 style="color: var(--primary); font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">
                            Terima Kasih!
                        </h1>

                        <p style="color: #666; font-size: 1.1rem; margin-bottom: 2rem; line-height: 1.8;">
                            Pesan Anda telah <span style="color: #27ae60; font-weight: 700;">berhasil diterima</span> dengan baik. Kami sangat menghargai kepercayaan Anda kepada <span style="color: var(--primary); font-weight: 700;">Bangun Impian</span>.
                        </p>

                        <!-- Info Box -->
                        <div style="background: #f8f9fa; padding: 2rem; border-radius: 12px; margin-bottom: 2rem; border-left: 5px solid var(--primary);">
                            <p style="color: #333; font-size: 1rem; margin: 0 0 1.5rem 0;">
                                <i class="fas fa-info-circle" style="color: var(--primary); margin-right: 0.5rem;"></i>
                                <strong>Apa yang akan terjadi selanjutnya?</strong>
                            </p>
                            <ul style="color: #666; text-align: left; margin: 0; padding-left: 2rem;">
                                <li style="margin-bottom: 0.8rem;">✅ Tim kami akan meninjau pesan Anda dalam waktu <strong>1x24 jam</strong></li>
                                <li style="margin-bottom: 0.8rem;">📞 Kami akan menghubungi Anda melalui <strong>telepon atau email</strong></li>
                                <li style="margin-bottom: 0.8rem;">💬 Konsultasi awal <strong>gratis tanpa biaya</strong></li>
                                <li>🎯 Kami akan memberikan <strong>penawaran terbaik</strong> sesuai kebutuhan Anda</li>
                            </ul>
                        </div>

                        <!-- Contact Info -->
                        <div style="background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%); color: white; padding: 2rem; border-radius: 12px; margin-bottom: 2rem;">
                            <p style="margin-bottom: 1.5rem; font-weight: 600;">Butuh respons cepat?</p>
                            <p style="margin-bottom: 1rem;">
                                <i class="fas fa-phone" style="margin-right: 0.5rem;"></i>
                                <strong>Hubungi kami langsung:</strong>
                            </p>
                            <p style="margin: 0;">
                                <a href="tel:+6285733867375" style="color: white; text-decoration: none; font-weight: 700; font-size: 1.2rem;">
                                    +62 857 3386 7375
                                </a>
                            </p>
                            <p style="margin-top: 1rem; font-size: 0.9rem; opacity: 0.9;">
                                Senin - Sabtu: 08:00 - 23:59 WIB
                            </p>
                        </div>

                        <!-- WhatsApp Button -->
                        <a href="https://wa.me/6285733867375?text=Halo%20Bangun%20Impian%2C%20saya%20ingin%20konsultasi%20tentang%20proyek%20saya" 
                           target="_blank" 
                           style="display: inline-block; background: linear-gradient(135deg, #25d366 0%, #1fa255 100%); color: white; padding: 1rem 2.5rem; border-radius: 8px; text-decoration: none; font-weight: 700; margin-bottom: 1.5rem; transition: all 0.3s ease; font-size: 1.05rem;"
                           onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 20px rgba(37, 211, 102, 0.3)'"
                           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <i class="fab fa-whatsapp" style="margin-right: 0.5rem;"></i> Chat via WhatsApp
                        </a>

                        <!-- Additional Message -->
                        <p style="color: #999; font-size: 0.95rem; margin-bottom: 2rem; line-height: 1.6;">
                            Jangan ragu untuk menghubungi kami jika ada pertanyaan atau ingin mempercepat proses. <br>
                            Tim kami siap membantu mewujudkan impian bangunan Anda! 🏗️
                        </p>

                        <!-- Back to Home Button -->
                        <a href="{{ route('home') }}" 
                           style="display: inline-block; background: #f0f0f0; color: var(--primary); padding: 0.8rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;"
                           onmouseover="this.style.background='var(--light)'"
                           onmouseout="this.style.background='#f0f0f0'">
                            <i class="fas fa-home" style="margin-right: 0.5rem;"></i> Kembali ke Beranda
                        </a>
                    </div>

                    <!-- Trust Indicators -->
                    <div style="margin-top: 3rem; display: flex; justify-content: space-around; text-align: center; flex-wrap: wrap;">
                        <div style="color: white; margin: 1rem;">
                            <i class="fas fa-shield-alt" style="font-size: 2rem; margin-bottom: 0.5rem; display: block;"></i>
                            <p style="margin: 0; font-size: 0.9rem;">Data Aman & Privat</p>
                        </div>
                        <div style="color: white; margin: 1rem;">
                            <i class="fas fa-clock" style="font-size: 2rem; margin-bottom: 0.5rem; display: block;"></i>
                            <p style="margin: 0; font-size: 0.9rem;">Respons Cepat</p>
                        </div>
                        <div style="color: white; margin: 1rem;">
                            <i class="fas fa-award" style="font-size: 2rem; margin-bottom: 0.5rem; display: block;"></i>
                            <p style="margin: 0; font-size: 0.9rem;">Profesional & Terpercaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endsection
