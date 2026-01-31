# Portfolio Database Integration - User Guide

## 🎯 Sistem Sinkronisasi Real-Time

Halaman portfolio user sekarang **terhubung langsung ke database**. Setiap perubahan yang admin lakukan di admin panel otomatis akan ditampilkan di halaman portfolio user.

## 📊 Data Flow

```
Admin Panel (/admin/portfolio)
        ↓
  Admin CRUD Operations
        ↓
  Portfolio Database Table
        ↓
  User Portfolio Page (/portofolio)
        ↓
  Auto-Updated Display
```

## 🔄 Operasi yang Tersinkronisasi

### ✅ ADD (Tambah Proyek)
- Admin ke `/admin/portfolio/create`
- Fill form dengan:
  - Nama Proyek: "Rumah Mewah Baru"
  - Kategori: rumah/komersial/ibadah
  - Judul: "Rumah Mewah Berlantai 2"
  - Deskripsi: "Deskripsi detail..."
  - Luas: "400 m²"
  - Tahun: "2025"
  - Gambar: Upload file (optional)
- Submit → Otomatis muncul di `/portofolio`

### ✏️ EDIT (Edit Proyek)
- Admin ke `/admin/portfolio/{id}/edit`
- Ubah data apapun (judul, deskripsi, kategori, dll)
- Submit → User page otomatis update
- Jika upload gambar baru → gambar lama auto-delete

### 🗑️ DELETE (Hapus Proyek)
- Admin ke `/admin/portfolio`
- Click tombol Delete pada project
- Confirm → Project hilang dari `/portofolio`
- Gambar otomatis dihapus dari storage

## 👥 User Experience

### Portfolio User Page: `/portofolio`

**Fitur:**
- ✅ Tampilkan SEMUA project dari database
- ✅ Dynamic filter buttons (auto-generate dari kategori di DB)
- ✅ Kategori color-coding:
  - **Biru (#2a5f7f)** = Rumah Tinggal
  - **Orange (#e67e22)** = Komersial
  - **Hijau (#27ae60)** = Tempat Ibadah
- ✅ Hover effect (card naik)
- ✅ Responsif untuk semua device
- ✅ Fallback placeholder jika tidak ada gambar

**Filter:**
- "Semua Proyek" (default)
- "Rumah Tinggal" (jika ada)
- "Komersial" (jika ada)
- "Tempat Ibadah" (jika ada)
- Filter buttons auto-generate dari data DB

## 🛠️ Technical Details

### Files yang Diubah

1. **resources/views/portofolio.blade.php**
   - Ubah dari hardcoded items → @forelse loop
   - Fetch data: `\App\Models\Portfolio::all()`
   - Dynamic kategori buttons dari: `\App\Models\Portfolio::select('kategori')->distinct()`
   - Badge color using @php logic
   - Gambar dari: `asset('storage/' . $portfolio->gambar)`

2. **database/seeders/DatabaseSeeder.php**
   - Tambah Portfolio seed (6 sample projects)
   - Check if exists sebelum insert
   - Demo data untuk testing

3. **Routes** (unchanged)
   - `/portofolio` → masih route yang sama
   - `/admin/portfolio/*` → resource routes sudah ada

4. **Admin Controllers** (unchanged)
   - `PortfolioController` → sudah punya upload logic
   - File storage auto-delete on replace/destroy

## 🎨 Card Design (Tetap Sama)

```html
┌─────────────────────────────┐
│     [Gambar Project]        │ (280px height)
├─────────────────────────────┤
│ [Rumah Tinggal] badge       │
│ Rumah Minimalis Modern      │ (judul)
│ Deskripsi proyek...         │ (deskripsi)
│ Luas: 250 m² | 2022         │
└─────────────────────────────┘
  ↓ Hover
  Scale 1.05 + Shadow
```

## 📸 Gambar Handling

**Storage Path:** `storage/app/public/portfolio/`
- Accessible via: `http://127.0.0.1:8000/storage/portfolio/nama-file.jpg`
- Max size: 2MB
- Formats: JPEG, PNG, GIF

**Default:** Jika tidak ada gambar upload
```html
<div style="gradient biru + icon image"></div>
```

## 🔍 Testing Checklist

✅ User visit `/portofolio` → Lihat 6 demo projects
✅ Filter "Semua Proyek" → Tampilkan semua
✅ Filter "Rumah Tinggal" → Tampilkan hanya 2 rumah
✅ Filter "Komersial" → Tampilkan hanya 3 komersial
✅ Filter "Tempat Ibadah" → Tampilkan hanya 1 masjid
✅ Admin add new portfolio → User page auto-update
✅ Admin edit portfolio → User page reflects changes
✅ Admin delete portfolio → User page removes item
✅ Hover cards → Scale & shadow effect
✅ Mobile responsive → Lihat di smartphone/tablet

## 📱 Responsive Breakpoints

- **Desktop:** 3 columns (col-lg-4)
- **Tablet:** 2 columns (col-md-6)
- **Mobile:** 1 column (col-12)
- Filter buttons: Wrap & center aligned

## 🔐 Security

✅ No SQL injection (using Eloquent)
✅ File validation (MIME type, size)
✅ Path traversal protection (Storage facade)
✅ CSRF protection on admin forms
✅ Image filename sanitization

## 💡 Future Enhancements

- Add pagination if projects > 12
- Lightbox modal untuk view gambar besar
- Search functionality
- Sort by tahun/kategori
- Admin bulk edit
- Portfolio detail page dengan more info

---

**Version:** 1.0
**Last Updated:** 31 Januari 2026
**Status:** ✅ Production Ready
