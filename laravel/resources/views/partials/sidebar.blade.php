{{-- เมนูหลัก --}}
<div class="sidebar-section">
  <div class="sidebar-header">เมนูหลัก</div>
  <a href="{{ route('home') }}" class="menu-item"><span class="dot"></span>หน้าแรก</a>
  @if(!session('user'))
    <a href="#" onclick="document.getElementById('login-modal').style.display='flex';return false;"
       class="menu-item"><span class="dot"></span>เข้าสู่ระบบ</a>
  @else
    <a href="{{ route('logout') }}" class="menu-item"><span class="dot"></span>ออกจากระบบ</a>
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
    ['label'=>'คณะกรรมการชมรม',         'route'=>'about.committee'],
    ['label'=>'ตัวแทน/ผู้ประสานงาน',    'route'=>'about.rooms'],
    ['label'=>'วิสัยทัศน์ คำนิยม ยุทธศาสตร์', 'route'=>'about.vision'],
    ['label'=>'ระเบียบการบริหารงาน',    'route'=>'about.manage'],
    ['label'=>'ระเบียบว่าด้วยเงิน',     'route'=>'about.money'],
    ['label'=>'รักรุ่นจริงไม่ทิ้งกัน', 'route'=>'donate'],
    ['label'=>'เพลงสวน',                'url'=>route('webboard.index').'?group_id=31&old_group_id=31'],
  ] as $item)
  @php $href = isset($item['url']) ? $item['url'] : route($item['route']); @endphp
  <a href="{{ $href }}" class="menu-item" style="font-size:13px; color:#4B5563;">
    <span style="color:#3B82F6; font-size:11px;">●</span> {{ $item['label'] }}
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

{{-- ข่าวจากรุ่น 96 --}}
<div class="sidebar-section">
  <div class="sidebar-header">ข่าวจากรุ่น 96</div>
  @foreach([
    ['label'=>'ข่าวทางวิชาการจากรุ่น 96',  'url'=>'?group_id=7&old_group_id=17'],
    ['label'=>'คำคม, คติชาชีวิต',           'url'=>'?group_id=7&old_group_id=16'],
    ['label'=>'เรื่องของบุตรหลาน',          'url'=>'?group_id=7&old_group_id=26'],
    ['label'=>'เรื่องของเพื่อนพ้อง 96',     'url'=>'?group_id=7&old_group_id=20'],
    ['label'=>'เรื่องวันสำคัญ',             'url'=>'?group_id=7&old_group_id=18'],
  ] as $item)
  <a href="{{ route('webboard.index') }}{{ $item['url'] }}" class="menu-item" style="font-size:13px;">
    <span class="dot"></span>{{ $item['label'] }}
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
