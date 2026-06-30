{{-- เมนูหลัก --}}
<div class="sidebar-section">
  <div class="sidebar-header">เมนูหลัก</div>
  <a href="{{ route('home') }}" class="menu-item"><span class="dot"></span>หน้าแรก</a>
  @if(!session('user'))
    <a href="{{ route('login') }}" class="menu-item"><span class="dot"></span>เข้าสู่ระบบ</a>
  @else
    <a href="{{ route('logout') }}" class="menu-item"><span class="dot"></span>ออกจากระบบ</a>
  @endif
</div>

{{-- ปฏิทิน --}}
<div class="sidebar-section">
  <div class="sidebar-header">ปฏิทิน</div>
  <div style="padding:10px;">
    @include('partials.mini-calendar')
  </div>
</div>

{{-- เกี่ยวกับชมรม --}}
<div class="sidebar-section">
  <div class="sidebar-header">เกี่ยวกับชมรม</div>
  @foreach([
    '@คณะกรรมการชมรม','@ตัวแทน/ผู้ประสานงาน','@วิสัยทัศน์ คำนิยม ยุทธศาสตร์',
    '@ระเบียบการบริหารงาน','@บัญชีสถานะการเงิน','@ดาวน์โหลด'
  ] as $item)
  <a href="#" class="menu-item" style="font-size:13px; color:#4B5563;">
    <span style="color:#3B82F6; font-size:11px;">●</span> {{ $item }}
  </a>
  @endforeach
</div>

{{-- สมุดเยี่ยม --}}
<div class="sidebar-section">
  <div class="sidebar-header">สมุดเยี่ยม</div>
  <a href="#" class="menu-item"><span class="dot"></span>สมุดเยี่ยม</a>
</div>

{{-- อยากร่วมอยากจอย --}}
<div class="sidebar-section">
  <div class="sidebar-header">อยากร่วมอยากจอย</div>
  @foreach([
    'ได้ข่าวว่า......','จดหมายเวียน','ทำบุญและบริจาคโลหิต',
    'เพื่อนช่วยเพื่อน','ธุรกิจในเตอร์ข่าวสวน','ภาพเด็คลิปโดน',
    'รวมภาพกิจกรรม','คุยกันตามประธาน'
  ] as $item)
  <a href="#" class="menu-item" style="font-size:13px;">
    <span style="color:#3B82F6; font-size:11px;">●</span> {{ $item }}
  </a>
  @endforeach
</div>
