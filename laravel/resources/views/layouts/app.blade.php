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
  body { background: #F1F5F9; font-family: 'Sarabun', sans-serif; }
  .card { background:#fff; border-radius:14px; box-shadow:0 2px 12px rgba(0,0,0,.07); }
  .section-title {
    display:flex; align-items:center; justify-content:space-between;
    padding:10px 16px; border-radius:10px 10px 0 0;
    background:linear-gradient(135deg,#3B82F6,#6366F1);
    color:#fff; font-weight:700; font-size:15px;
  }
  .section-title a { color:#fff; font-size:13px; font-weight:500; opacity:.85; }
  .section-title a:hover { opacity:1; }
  .sidebar-section { background:#fff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,.06); overflow:hidden; }
  .sidebar-header {
    background:linear-gradient(135deg,#3B82F6,#6366F1);
    color:#fff; font-weight:700; font-size:14px;
    padding:8px 14px; letter-spacing:.3px;
  }
  .menu-item {
    display:flex; align-items:center; gap:8px;
    padding:9px 16px; font-size:14px; color:#374151;
    border-bottom:1px solid #F1F5F9;
    transition:background .15s, color .15s, padding-left .15s;
    text-decoration:none; font-weight:500;
  }
  .menu-item:hover { background:#EFF6FF; color:#3B82F6; padding-left:20px; }
  .menu-item .dot { width:7px; height:7px; background:#3B82F6; border-radius:50%; flex-shrink:0; }
  .news-card {
    display:flex; gap:14px; padding:14px; border-radius:12px;
    border:1px solid #E2E8F0; background:#fff;
    transition:box-shadow .2s, transform .2s;
    text-decoration:none;
  }
  .news-card:hover { box-shadow:0 8px 24px rgba(59,130,246,.15); transform:translateY(-2px); }
  .news-thumb {
    width:110px; height:88px; object-fit:cover; border-radius:8px;
    flex-shrink:0; background:#EFF6FF;
  }
  .news-title { font-size:15px; font-weight:700; color:#1E40AF; line-height:1.45; }
  .news-title:hover { color:#2563EB; }
  .news-excerpt { font-size:13px; color:#64748B; line-height:1.6; margin-top:5px; }
  .tag { display:inline-block; font-size:11px; padding:2px 8px; border-radius:99px;
         background:#EFF6FF; color:#3B82F6; font-weight:600; }
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
    <div class="flex items-center justify-between px-4 py-1 text-xs text-gray-500"
         style="background:linear-gradient(90deg,#E0F2FE,#F0F9FF);">
      <span class="italic">You won't be alone</span>
      <span class="font-semibold tracking-widest text-blue-400">WWW.OSK96.COM</span>
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
