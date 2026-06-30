{{-- ค้นหาสมาชิก (TOP — ตาม original menu.inc_top.php) --}}
<div class="sidebar-section">
  <div class="sidebar-header">ค้นหาสมาชิก</div>
  <div style="padding:8px;">
    <select onchange="if(this.value) window.location='/members?type='+this.value"
            style="width:100%; border:1px solid #DCEEF8; border-radius:6px;
                   padding:6px 8px; font-size:12px; font-family:'Sarabun',sans-serif;
                   color:#003366; background:#fff; cursor:pointer;">
      <option value="">— ค้นหาเพื่อน —</option>
      <option value="1">ห้องเรียน ม.ต.1</option>
      <option value="2">ห้องเรียน ม.ต.2</option>
      <option value="3">ห้องเรียน ม.ต.3</option>
      <option value="4">ห้องเรียน ม.ต.4</option>
      <option value="5">ห้องเรียน ม.ต.5</option>
      <option value="6">ยกเลิกเรียน</option>
      <option value="7">เสียชีวิต</option>
      <option value="8">ไม่ทราบสถานที่</option>
      <option value="9">ยังอยู่ต่างประเทศ</option>
      <option value="10">มาจากอาชีพ</option>
      <option value="11">เพื่อน/ญาติสนับสนุน</option>
      <option value="13">เพื่อนที่ยังหาไม่เจอ</option>
      <option value="14">เพื่อนที่อยู่ในแพทย์</option>
      <option value="15">เพื่อนที่รับราชการตำรวจ</option>
    </select>
  </div>
</div>

{{-- ปฏิทิน --}}
<div class="sidebar-section">
  <div class="sidebar-header">ปฏิทิน</div>
  <div style="padding:10px 8px;">
    @include('partials.mini-calendar')
  </div>
</div>

{{-- เกี่ยวกับชมรม (ตาม original menu.inc.php) --}}
<div class="sidebar-section">
  <div class="sidebar-header">เกี่ยวกับชมรม</div>
  <a href="#" class="menu-item"><span class="dot"></span>คณะกรรมการชมรม</a>
  <a href="#" class="menu-item"><span class="dot"></span>ตัวแทน / ผู้ประสานงาน</a>
  <a href="#" class="menu-item"><span class="dot"></span>วิสัยทัศน์ คำนิยม ยุทธศาสตร์</a>
  <a href="#" class="menu-item"><span class="dot"></span>ระเบียบการบริหารงาน</a>
  <a href="#" class="menu-item"><span class="dot"></span>บัญชีสถานะการเงิน</a>
  @if(session('user'))
    <a href="{{ route('logout') }}" class="menu-item"><span class="dot"></span>ออกจากระบบ</a>
  @else
    <a href="{{ route('login') }}" class="menu-item"><span class="dot"></span>เข้าสู่ระบบ / แก้ไขข้อมูล</a>
  @endif
</div>
