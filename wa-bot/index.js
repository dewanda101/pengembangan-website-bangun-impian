/**
 * ============================================================
 *  BOT WHATSAPP - BANGUNIMPIAN
 *  Nomor: 085733867375
 *  Teknologi: whatsapp-web.js + Node.js
 *  Bahasa: Indonesia – Profesional & Ramah
 * ============================================================
 */

const { Client, LocalAuth, MessageMedia } = require('whatsapp-web.js');
const qrcode = require('qrcode-terminal');

// ============================================================
//  KONFIGURASI BOT
// ============================================================
const CONFIG = {
    namaPerusahaan: 'BangunImpian',
    namaBot: 'Asisten BangunImpian',
    nomorWA: '085733867375',
    nomorAdmin: '6285733867375@c.us', // ganti dengan nomor admin asli jika berbeda
    jam: {
        buka: 6,   // jam 06:00
        tutup: 22  // jam 22:00
    },
};

// ============================================================
//  STATE PERCAKAPAN (menyimpan status per pengguna)
// ============================================================
const sessionMap = new Map();

function getSession(userId) {
    if (!sessionMap.has(userId)) {
        sessionMap.set(userId, { step: 'start', data: {}, lastActive: Date.now() });
    }
    return sessionMap.get(userId);
}

function resetSession(userId) {
    sessionMap.set(userId, { step: 'start', data: {}, lastActive: Date.now() });
}

// ============================================================
//  CEK JAM OPERASIONAL (hanya untuk catatan info, tidak memblokir)
// ============================================================
function isJamOperasional() {
    const jam = new Date().getHours();
    return jam >= CONFIG.jam.buka && jam < CONFIG.jam.tutup;
}

function catatanLuarJam() {
    if (!isJamOperasional()) {
        return `\n\n⏰ _Catatan: Saat ini di luar jam operasional (06.00–22.00 WIB). Tim kami akan menindaklanjuti pesan Anda pada jam kerja berikutnya._`;
    }
    return '';
}

// ============================================================
//  PESAN-PESAN TEMPLATE
// ============================================================
const MSG = {

    sambutan: (nama = '') => `Halo${nama ? ' ' + nama : ''}! 👋

Selamat datang di *${CONFIG.namaPerusahaan}* — Jasa Arsitek & Konstruksi Profesional Surabaya.

Saya adalah asisten virtual kami yang siap membantu Anda. 😊

Silakan pilih menu yang Anda butuhkan:

1️⃣  Informasi Layanan
2️⃣  Portofolio & Hasil Kerja
3️⃣  Estimasi Biaya / Konsultasi
4️⃣  Informasi Kontak & Lokasi
5️⃣  Promo & Penawaran Terkini
6️⃣  Bicara dengan Tim Kami

Balas dengan *angka* atau *kata kunci* pilihan Anda.`,

    diluarJam: () => `Halo! 👋

Terima kasih telah menghubungi *${CONFIG.namaPerusahaan}*.

⏰ Saat ini kami sedang di luar jam operasional.
📅 Jam layanan kami: *Senin – Sabtu, 06.00 – 22.00 WIB*

Pesan Anda telah kami terima dan tim kami akan segera menghubungi Anda saat jam operasional dimulai.

Atau Anda bisa kunjungi website kami: *bangun-impian.test*

Terima kasih atas kepercayaan Anda! 🙏`,

    layanan: () => `🏗️ *LAYANAN BANGUNIMPIAN*

Kami menyediakan layanan konstruksi dan desain secara profesional:

🏠 *1. Desain Arsitektur*
   Desain custom dengan render 3D berkualitas tinggi

🔨 *2. Konstruksi*
   Pembangunan dengan material SNI & pengawasan ketat

🛋️ *3. Interior Design*
   Konsep personal dengan furniture premium

🔧 *4. Renovasi*
   Parsial maupun total, harga kompetitif

🏪 *5. Desain Komersial*
   Kafe, swalayan, kantor & ruang bisnis

🕌 *6. Proyek Spesial*
   Masjid, gedung, dan bangunan khusus

Ingin tahu lebih lanjut tentang salah satu layanan?
Balas: *detail [nama layanan]* atau balas *0* untuk kembali ke menu utama.`,

    portofolio: () => `📸 *PORTOFOLIO BANGUNIMPIAN*

Beberapa proyek unggulan kami:

🏡 *Rumah Minimalis Modern* – Surabaya
   Luas 250 m² | Tahun 2022

🕌 *Masjid Darussalam* – Tambak Osowilangun
   Luas 12.000 m² | 2021–2025

☕ *Café Dog* – Kota Malang
   Luas 180 m² | Tahun 2023

🏬 *Swalayan Usaha Baru Premium*
   Luas 2.000 m² | 2018–2020

🏨 *Kost & Home Stay*
   Luas 800 m² | Tahun 2021

Untuk melihat galeri foto lengkap, kunjungi:
🌐 *bangun-impian.test/portofolio*

Ingin konsultasi proyek serupa? Balas *konsultasi* atau *3* untuk estimasi biaya.
Balas *0* untuk kembali ke menu utama.`,

    konsultasi: () => `📋 *KONSULTASI & ESTIMASI BIAYA*

Kami sangat senang membantu Anda! 😊

Untuk memberikan estimasi yang akurat, silakan informasikan:

1. Jenis bangunan (rumah/kafe/masjid/lainnya)
2. Luas bangunan yang direncanakan (m²)
3. Lokasi proyek (kota/kecamatan)
4. Budget yang disiapkan (opsional)
5. Target waktu mulai proyek

Silakan ketik informasi tersebut, atau tim arsitek kami akan menghubungi Anda dalam waktu *1x24 jam*.

📞 Telepon langsung: *+62 857 3386 7375*
🕐 Jam layanan: Senin–Sabtu, 06.00–22.00 WIB

Balas *0* untuk kembali ke menu utama.`,

    kontak: () => `📍 *INFORMASI KONTAK BANGUNIMPIAN*

🏢 *Kantor Kami:*
   Jl. Pakis 2 No. 16, Surabaya
   Jawa Timur, Indonesia

📞 *Telepon / WhatsApp:*
   +62 857 3386 7375

📧 *Email:*
   infobangunimpian@gmail.com

🌐 *Website:*
   bangun-impian.test

🕐 *Jam Operasional:*
   Senin – Sabtu: 06.00 – 22.00 WIB

📱 *Media Sosial:*
   Instagram & Facebook: @BangunImpian

Butuh bantuan segera? Tim kami siap melayani Anda! 🙏

Balas *0* untuk kembali ke menu utama.`,

    promo: () => `🎉 *PROMO & PENAWARAN TERKINI*

✨ *Promo September 2026:*

🏷️ *GRATIS Konsultasi Desain*
   Konsultasi awal dengan arsitek kami tanpa biaya

🏷️ *Diskon 10% Jasa Desain*
   Untuk proyek rumah tinggal baru di atas 200 m²

🏷️ *Paket Hemat Renovasi*
   Dapur + Kamar Mandi mulai Rp 25 juta

🏷️ *Survey Lokasi Gratis*
   Khusus area Surabaya & sekitarnya

⚠️ _Penawaran terbatas! Hubungi kami segera._

Ingin memanfaatkan promo ini? Balas *konsultasi* atau ketik nama Anda untuk kami proses lebih lanjut.

Balas *0* untuk kembali ke menu utama.`,

    transferAdmin: () => `⏳ Baik, saya akan menghubungkan Anda dengan tim kami segera.

Tim kami akan membalas dalam waktu singkat. Jika ada yang perlu ditanyakan sementara menunggu, jangan ragu untuk bertanya!

📞 Atau langsung hubungi: *+62 857 3386 7375*

_Jam layanan: Senin–Sabtu 06.00–22.00 WIB_`,

    tidakDimengerti: () => `Maaf, saya kurang memahami pesan Anda. 😊

Silakan balas dengan:
• *Angka 1–6* untuk memilih menu
• Kata kunci seperti: *layanan*, *portofolio*, *konsultasi*, *kontak*, *promo*
• Balas *halo* atau *menu* untuk melihat daftar pilihan

Atau langsung hubungi tim kami di *+62 857 3386 7375* untuk bantuan lebih lanjut. 🙏`,

    terima: () => `Terima kasih telah menghubungi *${CONFIG.namaPerusahaan}*! 🙏

Informasi Anda telah kami catat dan tim kami akan segera menindaklanjuti.

Sampai jumpa dan semoga hari Anda menyenangkan! 😊`,
};

// ============================================================
//  FUNGSI UTAMA: PROSES PESAN MASUK
// ============================================================
async function handleMessage(msg, client) {
    const userId = msg.from;

    // Abaikan pesan dari grup, status, dan pesan dari bot sendiri
    if (msg.fromMe || msg.from.includes('@g.us') || msg.from === 'status@broadcast') return;

    const teks = msg.body.trim().toLowerCase();
    const session = getSession(userId);
    session.lastActive = Date.now();

    console.log(`[${new Date().toLocaleTimeString('id-ID')}] Pesan dari ${userId}: "${msg.body}"`);

    // ---- Kata kunci khusus (kapan saja) ----
    if (['halo', 'hai', 'hi', 'hello', 'assalamualaikum', 'selamat', 'menu', 'start', 'mulai', 'bantuan', 'help'].some(k => teks.includes(k))) {
        resetSession(userId);
        await msg.reply(MSG.sambutan());
        session.step = 'menu';
        return;
    }

    if (teks === '0' || teks === 'kembali' || teks === 'back') {
        resetSession(userId);
        await msg.reply(MSG.sambutan());
        session.step = 'menu';
        return;
    }

    if (teks === 'terima kasih' || teks === 'makasih' || teks === 'thanks' || teks === 'ok' || teks === 'oke') {
        await msg.reply(MSG.terima());
        resetSession(userId);
        return;
    }

    // ---- Navigasi menu utama ----
    const menuMap = {
        '1': 'layanan',
        '2': 'portofolio',
        '3': 'konsultasi',
        '4': 'kontak',
        '5': 'promo',
        '6': 'admin',
        'layanan': 'layanan',
        'service': 'layanan',
        'jasa': 'layanan',
        'portofolio': 'portofolio',
        'portfolio': 'portofolio',
        'galeri': 'portofolio',
        'contoh': 'portofolio',
        'konsultasi': 'konsultasi',
        'estimasi': 'konsultasi',
        'harga': 'konsultasi',
        'biaya': 'konsultasi',
        'tanya': 'konsultasi',
        'proyek': 'konsultasi',
        'kontak': 'kontak',
        'lokasi': 'kontak',
        'alamat': 'kontak',
        'telepon': 'kontak',
        'email': 'kontak',
        'promo': 'promo',
        'diskon': 'promo',
        'penawaran': 'promo',
        'admin': 'admin',
        'tim': 'admin',
        'cs': 'admin',
        'operator': 'admin',
        'manusia': 'admin',
    };

    let tujuan = null;
    for (const [keyword, dest] of Object.entries(menuMap)) {
        if (teks.includes(keyword)) {
            tujuan = dest;
            break;
        }
    }

    // ---- Proses berdasarkan tujuan ----
    const catatan = catatanLuarJam();

    if (tujuan) {
        switch (tujuan) {
            case 'layanan':
                session.step = 'layanan';
                await msg.reply(MSG.layanan() + catatan);
                break;

            case 'portofolio':
                session.step = 'portofolio';
                await msg.reply(MSG.portofolio() + catatan);
                break;

            case 'konsultasi':
                session.step = 'konsultasi';
                await msg.reply(MSG.konsultasi() + catatan);
                break;

            case 'kontak':
                session.step = 'kontak';
                await msg.reply(MSG.kontak() + catatan);
                break;

            case 'promo':
                session.step = 'promo';
                await msg.reply(MSG.promo() + catatan);
                break;

            case 'admin':
                session.step = 'admin';
                await msg.reply(MSG.transferAdmin() + catatan);
                // Notifikasi ke admin (opsional — aktifkan jika nomor admin dikonfigurasi)
                // await client.sendMessage(CONFIG.nomorAdmin, `⚠️ *Notifikasi Bot:*\nAda pelanggan yang ingin dihubungi:\nNomor: ${userId}\nPesan terakhir: "${msg.body}"`);
                break;
        }
        return;
    }


    // ---- Jika dalam sesi konsultasi, terima input bebas ----
    if (session.step === 'konsultasi') {
        await msg.reply(`✅ Terima kasih! Informasi Anda telah kami terima:

_"${msg.body}"_

Tim arsitek kami akan menghubungi Anda dalam waktu *1x24 jam kerja* untuk mendiskusikan proyek lebih lanjut.

📞 Atau langsung hubungi: *+62 857 3386 7375*

Balas *0* untuk kembali ke menu utama. 🙏`);
        session.step = 'menunggu';
        return;
    }

    // ---- Pesan pertama kali (belum ada sesi) ----
    if (session.step === 'start') {
        resetSession(userId);
        await msg.reply(MSG.sambutan());
        session.step = 'menu';
        return;
    }

    // ---- Tidak dimengerti ----
    await msg.reply(MSG.tidakDimengerti());
}

// ============================================================
//  INISIALISASI CLIENT WHATSAPP
// ============================================================
const client = new Client({
    authStrategy: new LocalAuth({
        dataPath: './session',
    }),
    puppeteer: {
        headless: true,
        args: [
            '--no-sandbox',
            '--disable-setuid-sandbox',
            '--disable-dev-shm-usage',
            '--disable-accelerated-2d-canvas',
            '--no-first-run',
            '--no-zygote',
            '--single-process',
            '--disable-gpu',
        ],
    },
});

// ---- Event: QR Code ----
client.on('qr', (qr) => {
    console.log('\n========================================');
    console.log('  SCAN QR CODE BERIKUT DENGAN WA HP ANDA');
    console.log('  (WhatsApp → Perangkat Tertaut)');
    console.log('========================================\n');
    qrcode.generate(qr, { small: true });
});

// ---- Event: Loading ----
client.on('loading_screen', (percent, message) => {
    console.log(`⏳ Memuat: ${percent}% - ${message}`);
});

// ---- Event: Autentikasi berhasil ----
client.on('authenticated', () => {
    console.log('\n✅ Autentikasi berhasil! Sesi disimpan.');
});

// ---- Event: Bot siap ----
client.on('ready', async () => {
    console.log('\n========================================');
    console.log(`  🤖 BOT ${CONFIG.namaPerusahaan} AKTIF`);
    console.log(`  📞 Nomor: ${CONFIG.nomorWA}`);
    console.log(`  🕐 Jam operasional: ${CONFIG.jam.buka}.00 - ${CONFIG.jam.tutup}.00`);
    console.log('  Ketik Ctrl+C untuk menghentikan bot');
    console.log('========================================\n');
});

// ---- Event: Pesan masuk ----
client.on('message', async (msg) => {
    try {
        await handleMessage(msg, client);
    } catch (err) {
        console.error('❌ Error saat memproses pesan:', err.message);
    }
});

// ---- Event: Autentikasi gagal ----
client.on('auth_failure', (msg) => {
    console.error('\n❌ Autentikasi GAGAL:', msg);
    console.log('Hapus folder "session" lalu jalankan ulang bot.');
});

// ---- Event: Disconnect ----
client.on('disconnected', (reason) => {
    console.log('\n⚠️  Bot terputus:', reason);
    console.log('Menghubungkan kembali...');
    client.initialize();
});

// ---- Mulai bot ----
console.log('🚀 Memulai Bot WhatsApp BangunImpian...');
client.initialize();

// ---- Bersihkan sesi lama setiap 1 jam ----
setInterval(() => {
    const sekarang = Date.now();
    const batasWaktu = 60 * 60 * 1000; // 1 jam
    for (const [userId, session] of sessionMap.entries()) {
        if (sekarang - session.lastActive > batasWaktu) {
            sessionMap.delete(userId);
        }
    }
}, 60 * 60 * 1000);
