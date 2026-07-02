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
    border-radius: 10px;
    border: 1px solid #DCEEF8;
    box-shadow: 0 2px 8px rgba(0,80,160,.08);
  }

  .section-title {
    display:flex; align-items:center; justify-content:space-between;
    padding: 7px 14px;
    background: #308EC4;
    color: #fff;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: .2px;
    border-radius: 10px 10px 0 0;
  }
  .section-title a { color:rgba(255,255,255,.85); font-size:12px; font-weight:500; text-decoration:none; }
  .section-title a:hover { color:#fff; }

  /* sidebar sections */
  .sidebar-section {
    background:#fff;
    border: 1px solid #DCEEF8;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,80,160,.06);
  }
  .sidebar-header {
    background: #fff;
    color: #003366;
    font-weight: 700;
    font-size: 13px;
    padding: 6px 14px 5px;
    border-bottom: 2px solid #308EC4;
    letter-spacing: .2px;
  }

  /* menu items */
  .menu-item {
    display:flex; align-items:center; gap:8px;
    padding:5px 16px; font-size:13px; color:#003366;
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
    align-items:center;
  }
  .news-card:hover { box-shadow:0 6px 18px rgba(48,142,196,.15); transform:translateY(-1px); }
  .news-thumb {
    width:72px; height:72px; object-fit:cover; object-position:center;
    border-radius:4px; flex-shrink:0; background:#fff;
    display:block;
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
                background:linear-gradient(90deg,#308EC4,#4169E1); color:#fff;
                border-radius:0 0 10px 10px;">
      <span style="font-style:italic; opacity:.85;">You won't be alone</span>
      <span style="font-weight:700; letter-spacing:2px;">WWW.OSK96.COM</span>
    </div>
  </div>

  {{-- Main 3-column grid --}}
  <div style="max-width:1160px; margin:8px auto 16px; padding:0 8px;">
    <div style="display:grid; grid-template-columns:220px 1fr 210px; gap:10px; align-items:start;">

      {{-- LEFT SIDEBAR --}}
      <aside style="display:flex; flex-direction:column; gap:6px;">
        @include('partials.sidebar')
      </aside>

      {{-- CENTER CONTENT --}}
      <main style="display:flex; flex-direction:column; gap:10px; min-width:0;">
        @yield('content')
      </main>

      {{-- RIGHT SIDEBAR --}}
      <aside style="display:flex; flex-direction:column; gap:6px;">
        @include('partials.right-sidebar')
      </aside>

    </div>
  </div>

  {{-- Footer --}}
  @include('partials.footer')

  {{-- Login Modal --}}
  @if(!session('user'))
  <div id="login-modal"
       onclick="if(event.target===this)this.style.display='none'"
       style="display:none; position:fixed; inset:0; background:rgba(0,0,0,.45);
              z-index:9999; align-items:center; justify-content:center;">
    <div style="background:#BDD2F9; border:1px solid #FFCCFF; border-radius:10px;
                width:460px; box-shadow:0 8px 32px rgba(0,0,0,.25); overflow:hidden;">

      {{-- Header --}}
      <div style="background:#fff; padding:10px 16px; display:flex; align-items:center; justify-content:space-between;">
        <span style="color:#CC0000; font-size:13px; font-weight:600;">ระบบจัดการฐานข้อมูลสมาชิกชมรม</span>
        <button onclick="document.getElementById('login-modal').style.display='none'"
                style="background:none; border:none; font-size:18px; cursor:pointer; color:#666; line-height:1;">×</button>
      </div>

      {{-- Form --}}
      <form action="{{ route('login.post') }}" method="post" style="padding:20px 30px 16px;">
        @csrf
        @if(session('error'))
        <div style="color:#CC0000; font-size:12px; text-align:center; margin-bottom:10px;">
          {{ session('error') }}
        </div>
        @endif

        <div style="display:grid; grid-template-columns:auto 180px; gap:8px 8px;
                    width:fit-content; margin:0 auto; align-items:center;">
          <label style="font-size:13px; text-align:right; white-space:nowrap;">เลขประจำตัวนักเรียน :</label>
          <input name="username" type="text" value="{{ old('username') }}"
                 style="border:1px solid #aaa; border-radius:4px; padding:5px 8px;
                        font-family:'Sarabun',sans-serif; font-size:13px; box-sizing:border-box;">
          <label style="font-size:13px; text-align:right; white-space:nowrap;">รหัสผ่าน :</label>
          <input name="password" type="password"
                 style="border:1px solid #aaa; border-radius:4px; padding:5px 8px;
                        font-family:'Sarabun',sans-serif; font-size:13px; box-sizing:border-box;">
          <div style="grid-column:1/-1; text-align:center; padding-top:6px;">
            <button type="submit"
                    style="background:#308EC4; color:#fff; border:none; border-radius:5px;
                           padding:7px 36px; font-family:'Sarabun',sans-serif; font-size:13px;
                           font-weight:600; cursor:pointer;">
              เข้าสู่ระบบ
            </button>
          </div>
        </div>
      </form>

      {{-- Footer note --}}
      <div style="border:1px solid #bbb; margin:10px 14px; padding:10px 12px;
                  font-size:12px; color:#333; text-align:center; line-height:1.8;">
        เพื่อรักษาและป้องกันข้อมูลส่วนตัว ฉะนั้นเพื่อนท่านใดที่ต้องการสอบถามหรือแก้ไขข้อมูล<br>
        กรุณาติดต่อตัวแทนหรือห้องต่อผ่านทางเว็บมาสเตอร์ผู้ดูแลระบบ OSK96
        <span style="color:#CC0000;">E-mail</span>
        <a href="mailto:webmaster.osk@gmail.com" style="color:#308EC4;">webmaster.osk@gmail.com</a>
      </div>
    </div>
  </div>

  {{-- Auto-open modal if redirected back with error --}}
  @if(session('error'))
  <script>document.getElementById('login-modal').style.display='flex';</script>
  @endif
  @endif

</body>
</html>
