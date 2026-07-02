@php
  $currentRoute = request()->route()?->getName();
  $currentUrl   = request()->url();
  $currentPath  = request()->path();

  function sidebarActive(string $routeName): string {
    return request()->route()?->getName() === $routeName
      ? 'background:#DBEAFE; color:#1D4ED8; font-weight:700; border-left:3px solid #38B8F5;'
      : '';
  }

  function sidebarActiveUrl(string $url): string {
    return request()->url() === $url || str_starts_with(request()->url(), $url)
      ? 'background:#DBEAFE; color:#1D4ED8; font-weight:700; border-left:3px solid #38B8F5;'
      : '';
  }
@endphp

{{-- โปรไฟล์ผู้ใช้ --}}
@if(session('user'))
@php
  $sidebarUser = session('user');
  $sidebarImg  = $sidebarUser['fname'] ?? '';
  $sidebarImgSrc = $sidebarImg
    ? (file_exists(public_path('uploads/member/'.$sidebarImg))
        ? asset('uploads/member/'.$sidebarImg)
        : env('OSK_LEGACY_URL').'/uploads/member/'.$sidebarImg)
    : null;
  $sidebarName = explode(' ', $sidebarUser['name'] ?? '');
@endphp
<div class="sidebar-section" style="padding:10px 8px; text-align:center; display:flex; flex-direction:column; align-items:center;">
  {{-- รูป --}}
  <div style="margin-bottom:6px;">
    @if($sidebarImgSrc)
      <img src="{{ $sidebarImgSrc }}"
           style="width:100px; height:130px; object-fit:cover; object-position:top;
                  border:3px solid #fff; border-radius:8px;
                  box-shadow:0 2px 10px rgba(48,142,196,0.45);"
           onerror="this.style.display='none'">
    @else
      <div style="width:100px; height:130px; background:#EBF4FB; border:3px solid #fff;
                  border-radius:8px; box-shadow:0 2px 10px rgba(48,142,196,0.45);
                  display:inline-flex; align-items:center; justify-content:center;
                  color:#94A3B8; font-size:11px;">ไม่มีรูป</div>
    @endif
  </div>
  {{-- ชื่อ --}}
  <div style="font-size:12px; color:#1a1a1a; font-weight:600; margin-top:4px;">
    คุณ {{ $sidebarUser['name'] ?? '' }}
  </div>
  {{-- ปุ่ม --}}
  <div style="margin-top:8px; display:flex; gap:5px; justify-content:center;">
    <a href="{{ route('profile.edit') }}"
       style="background:#EBF4FB; color:#003366; border:1px solid #DCEEF8; border-radius:4px;
              padding:4px 12px; font-size:12px; text-decoration:none; font-weight:600;">
      แก้ไข
    </a>
    <a href="{{ route('logout') }}"
       style="background:#DC2626; color:#fff; border-radius:4px;
              padding:4px 12px; font-size:12px; text-decoration:none; font-weight:600;">
      ออกจากระบบ
    </a>
  </div>
</div>
@endif

{{-- เมนูหลัก --}}
<div class="sidebar-section">
  <div class="sidebar-header">เมนูหลัก</div>
  <a href="{{ route('home') }}" class="menu-item" style="{{ sidebarActive('home') }}">
    <span class="dot"></span>หน้าแรก
  </a>
  @if(!session('user'))
    <a href="#" onclick="document.getElementById('login-modal').style.display='flex';return false;"
       class="menu-item"><span class="dot"></span>เข้าสู่ระบบ</a>
  @else
    <a href="{{ route('profile') }}" class="menu-item" style="{{ sidebarActive('profile') }}">
      <span class="dot"></span>ข้อมูลของฉัน
    </a>
  @endif
</div>

{{-- ปฏิทิน --}}
<div class="sidebar-section">
  <div class="sidebar-header">ปฏิทินข่าวและกิจกรรม</div>
  <div style="padding:10px;">
    @include('partials.mini-calendar')
  </div>
</div>

{{-- เกี่ยวกับชมรม --}}
<div class="sidebar-section">
  <div class="sidebar-header">เกี่ยวกับชมรม</div>
  @foreach([
    ['label'=>'คณะกรรมการชมรม',              'route'=>'about.committee'],
    ['label'=>'ตัวแทน/ผู้ประสานงาน',         'route'=>'about.rooms'],
    ['label'=>'วิสัยทัศน์ คำนิยม ยุทธศาสตร์','route'=>'about.vision'],
    ['label'=>'ระเบียบการบริหารงาน',         'route'=>'about.manage'],
    ['label'=>'ระเบียบว่าด้วยเงิน',          'route'=>'about.money'],
    ['label'=>'รักรุ่นจริงไม่ทิ้งกัน',      'route'=>'donate'],
    ['label'=>'บัญชีสถานะการเงิน',           'route'=>'bill.index'],
    ['label'=>'เพลงสวน',                     'url'=>route('webboard.index').'?group_id=31&old_group_id=31'],
  ] as $item)
  @php
    $href   = isset($item['url']) ? $item['url'] : route($item['route']);
    $active = isset($item['route']) ? sidebarActive($item['route']) : '';
  @endphp
  <a href="{{ $href }}" class="menu-item" style="font-size:13px; color:#4B5563; {{ $active }}">
    <span style="color:#3B82F6; font-size:11px;">●</span> {{ $item['label'] }}
  </a>
  @endforeach
</div>

{{-- สมุดเยี่ยม --}}
<div class="sidebar-section">
  <div class="sidebar-header">สมุดเยี่ยม</div>
  <a href="{{ route('guestbook.index') }}" class="menu-item" style="{{ sidebarActive('guestbook.index') }}">
    <span class="dot"></span>สมุดเยี่ยม
  </a>
</div>

{{-- อยากร่วมอยากจอย --}}
<div class="sidebar-section">
  <div class="sidebar-header">อยากร่วมอยากจอย</div>
  @foreach([
    ['label'=>'ได้ข่าวว่า......',        'g'=>1,  'o'=>0],
    ['label'=>'จดหมายเวียน',             'g'=>2,  'o'=>22],
    ['label'=>'ทำบุญและบริจาคโลหิต',    'g'=>30, 'o'=>30],
    ['label'=>'เพื่อนช่วยเพื่อน',       'g'=>5,  'o'=>24],
    ['label'=>'ธุรกิจในเครือข่ายสวน',   'g'=>29, 'o'=>29],
    ['label'=>'ภาพเด็คลิปโดน',          'g'=>6,  'o'=>0],
    ['label'=>'คุยกับท่านประธาน',        'g'=>13, 'o'=>0],
    ['label'=>'ติดต่อเว็บมาสเตอร์',     'g'=>14, 'o'=>0],
  ] as $item)
  @php
    $wbHref = route('webboard.index').'?group_id='.$item['g'].'&old_group_id='.$item['o'];
    $wbActive = ($currentRoute === 'webboard.index'
                 && request()->get('group_id') == $item['g']
                 && request()->get('old_group_id') == $item['o'])
              ? 'background:#DBEAFE; color:#1D4ED8; font-weight:700; border-left:3px solid #38B8F5;'
              : '';
  @endphp
  <a href="{{ $wbHref }}" class="menu-item" style="font-size:13px; {{ $wbActive }}">
    <span style="color:#3B82F6; font-size:11px;">●</span> {{ $item['label'] }}
  </a>
  @endforeach
</div>

{{-- นานาสาระ --}}
<div class="sidebar-section">
  <div class="sidebar-header">นานาสาระ</div>
  @foreach([
    ['label'=>'ข่าวสารวิชาการ',      'g'=>7, 'o'=>17],
    ['label'=>'คำคม/ปรัชญาชีวิต',   'g'=>7, 'o'=>16],
    ['label'=>'ซุปซิป',              'g'=>7, 'o'=>26],
    ['label'=>'ครอบครัวสวน (96)',    'g'=>7, 'o'=>20],
    ['label'=>'สันทนาการ/บันเทิง',  'g'=>7, 'o'=>18],
  ] as $item)
  @php
    $wbHref = route('webboard.index').'?group_id='.$item['g'].'&old_group_id='.$item['o'];
    $wbActive = ($currentRoute === 'webboard.index'
                 && request()->get('group_id') == $item['g']
                 && request()->get('old_group_id') == $item['o'])
              ? 'background:#DBEAFE; color:#1D4ED8; font-weight:700; border-left:3px solid #38B8F5;'
              : '';
  @endphp
  <a href="{{ $wbHref }}" class="menu-item" style="font-size:13px; {{ $wbActive }}">
    <span style="color:#3B82F6; font-size:11px;">●</span> {{ $item['label'] }}
  </a>
  @endforeach
</div>


{{-- ลิงค์ที่เกี่ยวข้อง --}}
<div class="sidebar-section">
  <div class="sidebar-header">ลิงค์ที่เกี่ยวข้อง</div>
  @foreach([
    ['label'=>'Facebook OSK 92(96)', 'url'=>'https://www.facebook.com/pages/OSK-96/287713091258895'],
    ['label'=>'โรงเรียนสวนกุหลาบ',  'url'=>'http://www.sk.ac.th/'],
    ['label'=>'OSKNETWORK',          'url'=>'http://www.osknetwork.com/'],
    ['label'=>'สวนบอร์ด',           'url'=>'http://www.suanboard.net/'],
    ['label'=>'Eduzones',            'url'=>'http://www.eduzones.com/'],
  ] as $link)
  <a href="{{ $link['url'] }}" target="_blank" class="menu-item" style="font-size:13px;">
    <span class="dot"></span>{{ $link['label'] }}
  </a>
  @endforeach
</div>
