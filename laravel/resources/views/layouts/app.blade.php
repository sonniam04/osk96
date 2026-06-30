<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          brand: { DEFAULT: '#3B82F6', dark: '#1D4ED8', light: '#EFF6FF' },
        },
        fontFamily: {
          sans: ['Sarabun', 'sans-serif'],
        },
      }
    }
  }
</script>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('style.css') }}" rel="stylesheet">
<style>
  /* ── Original color palette ── */
  :root {
    --osk-blue:   #308EC4;
    --osk-blue2:  #4169E1;
    --osk-dark:   #003366;
    --osk-orange: #FF6600;
    --osk-pink-bg:#F9EEF5;
  }

  body {
    background: url('{{ asset('images/bg.jpg') }}') repeat-x fixed;
    background-color: #308EC4;
    font-family: 'Sarabun', sans-serif;
  }

  /* main wrapper */
  table[width="960"], div[style*="max-width:1160px"] {
    /* handled inline */
  }

  .card {
    background: #fff;
    border-radius: 4px;
    border: 1px solid #DCEEF8;
    box-shadow: 0 1px 4px rgba(0,80,160,.06);
  }

  .section-title {
    display:flex; align-items:center; justify-content:space-between;
    padding: 10px 16px;
    background: #308EC4;
    color: #fff;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: .2px;
  }
  .section-title a { color:rgba(255,255,255,.85); font-size:12px; font-weight:500; text-decoration:none; }
  .section-title a:hover { color:#fff; }

  /* sidebar sections */
  .sidebar-section {
    background:#fff;
    border: 1px solid #DCEEF8;
    border-radius: 6px;
    overflow: hidden;
  }
  .sidebar-header {
    background: #fff;
    color: #003366;
    font-weight: 700;
    font-size: 13px;
    padding: 9px 14px 7px;
    border-bottom: 2px solid #308EC4;
    letter-spacing: .2px;
  }

  /* menu items */
  .menu-item {
    display:flex; align-items:center; gap:8px;
    padding:9px 16px; font-size:14px; color:#003366;
    border-bottom:1px solid #EBF4FB;
    transition:background .15s, color .15s, padding-left .15s;
    text-decoration:none; font-weight:500;
  }
  .menu-item:hover { background:#EBF4FB; color:#308EC4; padding-left:20px; }
  .menu-item .dot { width:7px; height:7px; background:#FF6600; border-radius:50%; flex-shrink:0; }

  /* news cards */
  .news-card {
    display:flex; gap:12px; padding:10px 12px; border-radius:10px;
    border:1px solid #C8E6F5; background:#FAFEFF;
    transition:box-shadow .2s, transform .2s; text-decoration:none;
    align-items:flex-start;
  }
  .news-card:hover { box-shadow:0 6px 18px rgba(48,142,196,.15); transform:translateY(-1px); }
  .news-thumb {
    width:72px; height:72px; object-fit:cover; border-radius:8px;
    flex-shrink:0; background:#EBF4FB;
  }
  .news-title { font-size:14px; font-weight:700; color:#003366; line-height:1.5; }
  .news-title:hover { color:#308EC4; }
  .news-excerpt { font-size:12.5px; color:#555; line-height:1.6; margin-top:4px; }

  .tag {
    display:inline-block; font-size:11px; padding:2px 9px; border-radius:99px;
    background:#EBF4FB; color:#308EC4; font-weight:600;
  }
</style>
@stack('scripts-head')
</head>

<body class="min-h-screen">

  {{-- Header --}}
  <div class="w-full" style="max-width:1160px; margin:0 auto;">
    @include('partials.header')
  </div>

  {{-- Sub-header strip --}}
  <div style="max-width:1160px; margin:0 auto;">
    <div style="display:flex; align-items:center; justify-content:space-between;
                padding:3px 16px; font-size:12px;
                background:linear-gradient(90deg,#308EC4,#4169E1); color:#fff;">
      <span style="font-style:italic; opacity:.85;">You won't be alone</span>
      <span style="font-weight:700; letter-spacing:2px;">WWW.OSK96.COM</span>
    </div>
  </div>

  {{-- Main 3-column grid --}}
  <div style="max-width:1160px; margin:12px auto 24px; padding:0 8px;">
    <div style="display:grid; grid-template-columns:220px 1fr 210px; gap:16px; align-items:start;">

      {{-- LEFT SIDEBAR --}}
      <aside style="display:flex; flex-direction:column; gap:12px;">
        @include('partials.sidebar')
      </aside>

      {{-- CENTER CONTENT --}}
      <main style="display:flex; flex-direction:column; gap:16px; min-width:0;">
        @yield('content')
      </main>

      {{-- RIGHT SIDEBAR --}}
      <aside style="display:flex; flex-direction:column; gap:12px;">
        @include('partials.right-sidebar')
      </aside>

    </div>
  </div>

  {{-- Footer --}}
  @include('partials.footer')

</body>
</html>
