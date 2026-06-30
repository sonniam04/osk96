{{-- เมนูหลัก --}}
<div class="sidebar-section">
  <div class="sidebar-header">เมนูหลัก</div>
  <a href="{{ route('home') }}" class="menu-item"><span class="dot"></span>หน้าแรก</a>
  @if(!session('user'))
    <a href="{{ route('login') }}" class="menu-item"><span class="dot"></span>เข้าสู่ระบบ</a>
  @else
    <a href="{{ route('logout') }}" class="menu-item"><span class="dot"></span>ออกจากระบบ</a>
  @endif
  <a href="{{ route('members.search') }}?type=16" class="menu-item"><span class="dot"></span>ค้นหาสมาชิก</a>
  <a href="{{ route('guestbook.index') }}" class="menu-item"><span class="dot"></span>สมุดเยี่ยม</a>
</div>

{{-- ปฏิทิน --}}
<div class="sidebar-section">
  <div class="sidebar-header">ปฏิทิน</div>
  <div style="padding:10px 8px;">
    @include('partials.mini-calendar')
  </div>
</div>

{{-- เกี่ยวกับชมรม --}}
<div class="sidebar-section">
  <div class="sidebar-header">เกี่ยวกับชมรม</div>
  @foreach([
    ['คณะกรรมการชมรม',           '#'],
    ['ตัวแทน / ผู้ประสานงาน',    '#'],
    ['วิสัยทัศน์ คำนิยม ยุทธศาสตร์', '#'],
    ['ระเบียบการบริหารงาน',       '#'],
    ['บัญชีสถานะการเงิน',         '#'],
    ['ดาวน์โหลด',                '#'],
  ] as [$label, $url])
  <a href="{{ $url }}" class="menu-item" style="font-size:13px;">
    <span class="dot"></span>{{ $label }}
  </a>
  @endforeach
</div>

{{-- สมุดเยี่ยม --}}
<div class="sidebar-section">
  <div class="sidebar-header">สมุดเยี่ยม</div>
  <a href="{{ route('guestbook.index') }}" class="menu-item"><span class="dot"></span>สมุดเยี่ยม</a>
</div>

{{-- อยากร่วมอยากจอย --}}
<div class="sidebar-section">
  <div class="sidebar-header">อยากร่วมอยากจอย</div>
  @foreach([
    'ได้ข่าวว่า......',
    'จดหมายเวียน',
    'ทำบุญและบริจาคโลหิต',
    'เพื่อนช่วยเพื่อน',
    'ธุรกิจในเครือข่ายสวน',
    'ภาพและคลิปโดน',
    'รวมภาพกิจกรรม',
    'คุยกันตามประธาน',
  ] as $item)
  <a href="#" class="menu-item" style="font-size:13px;">
    <span class="dot"></span>{{ $item }}
  </a>
  @endforeach
</div>
