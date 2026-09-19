# 🤖 Bot WhatsApp BangunImpian

Bot otomatis untuk menjawab pesan WhatsApp pelanggan secara profesional.

---

## 📋 Cara Menjalankan Bot

### Langkah 1 – Jalankan Bot
**Klik 2x file `START_BOT.bat`**

atau lewat terminal:
```bash
cd wa-bot
node index.js
```

### Langkah 2 – Scan QR Code
- Buka **WhatsApp** di HP Anda (nomor 085733867375)
- Buka **⋮ → Perangkat Tertaut → Tautkan Perangkat**
- Scan QR Code yang muncul di layar komputer

### Langkah 3 – Bot Aktif!
Setelah muncul pesan `🤖 BOT BANGUNIMPIAN AKTIF`, bot siap menerima pesan.

---

## 💬 Fitur Bot

| Fitur | Keterangan |
|---|---|
| Menu interaktif | Pilih 1–6 untuk navigasi |
| Cek jam operasional | Otomatis balas "di luar jam" jika <06.00 atau >22.00 |
| Informasi layanan | Daftar lengkap jasa BangunImpian |
| Portofolio | Daftar proyek unggulan |
| Konsultasi | Terima input proyek dari pelanggan |
| Kontak & lokasi | Info lengkap kantor |
| Promo | Penawaran terkini |
| Transfer ke admin | Hubungkan dengan tim |
| Session management | State per pengguna, reset otomatis 1 jam |

---

## ⌨️ Kata Kunci yang Dikenali

| Kata Kunci | Aksi |
|---|---|
| `halo`, `hai`, `menu`, `start` | Tampilkan menu utama |
| `1` atau `layanan` | Info layanan |
| `2` atau `portofolio` | Portofolio proyek |
| `3`, `konsultasi`, `estimasi`, `harga` | Konsultasi & estimasi |
| `4`, `kontak`, `lokasi`, `alamat` | Info kontak |
| `5`, `promo`, `diskon` | Promo terkini |
| `6`, `admin`, `tim`, `manusia` | Transfer ke admin |
| `0`, `kembali` | Kembali ke menu utama |
| `terima kasih`, `ok` | Penutup percakapan |

---

## ⚠️ Penting

- **Jangan tutup** jendela CMD selama bot berjalan
- Sesi tersimpan di folder `session/` — tidak perlu scan ulang setiap hari
- Jika bot error, hapus folder `session/` dan scan ulang QR
- Bot hanya membalas **chat personal** (bukan grup)

---

## 🔧 Konfigurasi

Edit bagian `CONFIG` di `index.js` untuk mengubah:
- `jam.buka` / `jam.tutup` — jam operasional
- `nomorAdmin` — nomor yang menerima notifikasi

---

## 📁 Struktur File

```
wa-bot/
├── index.js          ← File bot utama
├── START_BOT.bat     ← Klik 2x untuk jalankan
├── package.json
├── node_modules/     ← Dependensi
└── session/          ← Data sesi WA (auto-dibuat)
```
