@extends('layouts.app')

@section('title', 'Hubungi BangunImpian - Konsultasi Gratis')

@section('content')
    <!-- KONTAK HERO -->
    <section class="kontak-hero">
        <div class="container py-5">
            <h1 class="section-title mb-4">Hubungi Kami</h1>
            <p class="section-subtitle mb-5">Kami Siap Mewujudkan Impian Bangunan Anda</p>
        </div>
    </section>

    <!-- KONTAK CONTENT -->
    <section class="kontak-section py-5">
        <div class="container">
            <div class="row g-5">
                <!-- INFORMASI KONTAK -->
                <div class="col-lg-5">
                    <h3 style="color: var(--primary); font-weight: 700; margin-bottom: 2rem;">Informasi Kontak</h3>

                    <!-- Telepon -->
                    <div style="display: flex; gap: 2rem; margin-bottom: 2.5rem;">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%); color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h5 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">Telepon</h5>
                            <p style="color: #666; margin: 0; font-size: 1.1rem;"><a href="tel:+6285733867375" style="color: var(--accent); text-decoration: none; font-weight: 600;">+62 813 3113 5822</a></p>
                            <p style="font-size: 0.9rem; color: #999; margin-top: 0.5rem;">Senin - Minggu: 08:00 - 23:59<br>Sabtu: 08:00 - 23:59</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div style="display: flex; gap: 2rem; margin-bottom: 2.5rem;">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--accent) 0%, #d35400 100%); color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h5 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">Email</h5>
                            <p style="color: #666; margin: 0; font-size: 1.1rem;"><a href="mailto:infobangunimpian@gmail.com" style="color: var(--accent); text-decoration: none; font-weight: 600;">infobangunimpian@gmail.com</a></p>
                            <p style="font-size: 0.9rem; color: #999; margin-top: 0.5rem;">Balasan dalam 24 jam<br>Konsultasi via Email gratis</p>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div style="display: flex; gap: 2rem; margin-bottom: 2.5rem;">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #27ae60 0%, #229954 100%); color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; flex-shrink: 0;">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">Alamat Kantor</h5>
                            <p style="color: #666; margin: 0; font-size: 1rem; line-height: 1.6;">Jl. Pakis 2 No 16<br>Surabaya, Jawa Timur 60186<br>Indonesia</p>
                        </div>
                    </div>

                    <!-- Jam Kerja -->
                    <div style="background: var(--light); padding: 2rem; border-radius: 12px; margin-top: 2rem; border-left: 5px solid var(--primary);">
                        <h5 style="color: var(--primary); margin-bottom: 1rem; font-weight: 700;"><i class="fas fa-clock"></i> Jam Kerja</h5>
                        <ul style="color: #666; padding-left: 1.5rem; margin: 0;">
                            <li>Senin - Minggu: 08:00 - 23:59</li>
                            <li>Sabtu: 08:00 - 23:59</li>
                            <li style="margin-top: 0.5rem; color: var(--primary); font-weight: 600;">Emergency: Bp Heri Setiawan — +62  813 3113 5822</li>
                        </ul>
                    </div>

                    <!-- Sosial Media -->
                    <div style="margin-top: 2rem;">
                        <h5 style="color: var(--primary); margin-bottom: 1.5rem; font-weight: 700;">Ikuti Kami</h5>
                        <div style="display: flex; gap: 1rem;">
                            <a href="https://www.facebook.com/share/17mVMbeQxv/?mibextid=wwXIfr" target="_blank" style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%); color: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; text-decoration: none; font-size: 1.3rem;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.2)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="mailto:infobangunimpian@gmail.com" style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--accent) 0%, #d35400 100%); color: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; text-decoration: none; font-size: 1.3rem;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.2)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <a href="https://wa.me/6285733867375" target="_blank" style="width: 50px; height: 50px; background: linear-gradient(135deg, #25d366 0%, #1fa255 100%); color: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; text-decoration: none; font-size: 1.3rem;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.2)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- FORM KONTAK -->
                <div class="col-lg-7">
                    <div style="background: white; padding: 3rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                        <h3 style="color: var(--primary); font-weight: 700; margin-bottom: 2rem;">Kirim Pesan Kepada Kami</h3>
                        <form action="{{ route('kontak.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label style="color: var(--primary); font-weight: 600; margin-bottom: 0.7rem; display: block;">Nama Lengkap *</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama Anda" style="padding: 0.85rem; border: 1px solid #ddd; border-radius: 8px; font-family: 'Poppins', sans-serif;" required>
                                        @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label style="color: var(--primary); font-weight: 600; margin-bottom: 0.7rem; display: block;">Email *</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@anda.com" style="padding: 0.85rem; border: 1px solid #ddd; border-radius: 8px; font-family: 'Poppins', sans-serif;" required>
                                        @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label style="color: var(--primary); font-weight: 600; margin-bottom: 0.7rem; display: block;">Nomor Telepon *</label>
                                        <input type="tel" name="telepon" class="form-control @error('telepon') is-invalid @enderror" placeholder="+62 8xx xxxx xxxx" style="padding: 0.85rem; border: 1px solid #ddd; border-radius: 8px; font-family: 'Poppins', sans-serif;" required>
                                        @error('telepon') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label style="color: var(--primary); font-weight: 600; margin-bottom: 0.7rem; display: block;">Jenis Proyek</label>
                                        <select name="jenis_proyek" class="form-control @error('jenis_proyek') is-invalid @enderror" style="padding: 0.85rem; border: 1px solid #ddd; border-radius: 8px; font-family: 'Poppins', sans-serif;" required>
                                            <option>-- Pilih Jenis Proyek --</option>
                                            <option value="Rumah Tinggal">Rumah Tinggal</option>
                                            <option value="Bangunan Komersial">Bangunan Komersial</option>
                                            <option value="Desain Interior">Desain Interior</option>
                                            <option value="Renovasi">Renovasi</option>
                                            <option value="Proyek Spesial">Proyek Spesial</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('jenis_proyek') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label style="color: var(--primary); font-weight: 600; margin-bottom: 0.7rem; display: block;">Pesan *</label>
                                        <textarea name="pesan" class="form-control @error('pesan') is-invalid @enderror" rows="6" placeholder="Jelaskan detail proyek dan kebutuhan Anda..." style="padding: 0.85rem; border: 1px solid #ddd; border-radius: 8px; font-family: 'Poppins', sans-serif; resize: vertical;" required></textarea>
                                        @error('pesan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="agree" required>
                                        <label class="form-check-label" for="agree" style="color: #666;">
                                            Saya setuju dengan kebijakan privasi dan syarat 
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-lg" style="background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%); color: white; font-weight: 700; border: none; width: 100%; padding: 1rem; border-radius: 8px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 20px rgba(42, 95, 127, 0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                        <i class="fas fa-paper-plane"></i> Kirim Pesan Sekarang
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MAP -->
            <div style="margin-top: 5rem;">
                <h3 style="color: var(--primary); font-weight: 700; margin-bottom: 2rem;">Lokasi Kami</h3>
                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); height: 450px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.753885869906!2d112.7381!3d-7.2908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf5c9b5c5c5%3A0x5c5c5c5c5c5c5c5c!2sJl.%20Pakis%202%2C%20Surabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1234567890" width="100%" height="100%" style="border:none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section style="background: var(--light); padding: 5rem 0;">
        <div class="container">
            <h2 class="section-title mb-5">Pertanyaan Umum</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item" style="border: 1px solid #ddd; margin-bottom: 1rem; border-radius: 8px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" style="font-weight: 600; color: var(--primary);">
                                    Berapa lama durasi proyek?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Durasi proyek tergantung pada skala dan kompleksitas. Biasanya rumah tinggal 4-6 bulan, sedangkan bangunan komersial 3-12 bulan. Kami akan memberikan timeline detail setelah konsultasi awal.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" style="border: 1px solid #ddd; margin-bottom: 1rem; border-radius: 8px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" style="font-weight: 600; color: var(--primary);">
                                    Apakah ada biaya konsultasi awal?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Tidak, konsultasi awal kami gratis! Kami akan mendengarkan kebutuhan Anda dan memberikan penawaran terbaik tanpa biaya apapun.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" style="border: 1px solid #ddd; margin-bottom: 1rem; border-radius: 8px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" style="font-weight: 600; color: var(--primary);">
                                    Apa yang termasuk dalam paket layanan?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Paket layanan kami mencakup desain, perizinan, konstruksi, finishing, dan garansi. Detail lengkap akan dijelaskan saat konsultasi.
                                </div>
                            </div>
                        </div>

                        {{-- <div class="accordion-item" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" style="font-weight: 600; color: var(--primary);">
                                    Apakah ada jaminan kualitas?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya! Kami memberikan garansi struktur bangunan selama 10 tahun dan garansi finishing selama 2 tahun. Kepuasan pelanggan adalah prioritas kami.
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .kontak-hero {
            background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%);
            color: white;
            text-align: center;
        }

        .kontak-hero .section-title {
            color: white;
            font-size: 3rem;
            font-weight: 800;
        }

        .kontak-hero .section-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.3rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            text-align: center;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #666;
            text-align: center;
        }

        .accordion-button {
            padding: 1.5rem !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--light) !important;
            color: var(--primary) !important;
        }
    </style>
@endsection
