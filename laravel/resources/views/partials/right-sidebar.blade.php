{{-- รวมของเพื่อน --}}
<div class="sidebar-section">
  <div class="sidebar-header">รวมผองเพื่อน</div>
  <div style="padding:12px;">
    <select name="search" onchange="if(this.value)location.href='{{ '#' }}?type='+this.value"
            style="width:100%; border:1px solid #E2E8F0; border-radius:8px;
                   padding:7px 10px; font-size:12px; font-family:'Sarabun',sans-serif;
                   background:#F8FAFC; color:#374151; outline:none; cursor:pointer;">
      <option value=""> - ค้นหาเพื่อน- </option>
      <option value="16">ค้นหาจากชื่อ</option>
      <option value="1">จากห้องเรียนตอน ม.ศ.1</option>
      <option value="2">จากห้องเรียนตอน ม.ศ.2</option>
      <option value="3">จากห้องเรียนตอน ม.ศ.3</option>
      <option value="4">จากห้องเรียนตอน ม.ศ.4</option>
      <option value="5">จากห้องเรียนตอน ม.ศ.5</option>
      <option value="6">แยกศึกษา</option>
      <option value="7">ผู้จากไป</option>
      <option value="8">อยู่ที่จังหวัด</option>
      <option value="9">อยู่ต่างประเทศ</option>
      <option value="10">จากอาชีพ</option>
      <option value="11">กีฬา/งานอดิเรก</option>
      <option value="13">ข้อมูลเพื่อนเกิดในแต่ละเดือน</option>
      <option value="14">เพื่อนที่จบแพทย์</option>
      <option value="15">เพื่อนที่รับราชการตำรวจ</option>
    </select>
  </div>
</div>

{{-- เพื่อนพอง ผองเพื่อน --}}
<div class="sidebar-section">
  <div class="sidebar-header">เพื่อนพอง ผองเพื่อน</div>
  <div style="overflow:hidden; height:520px; position:relative;">
    <div id="member-scroll" style="display:flex; flex-direction:column; align-items:center;
                                    gap:14px; padding:14px 8px; animation:scrollUp 40s linear infinite;"
         onmouseover="this.style.animationPlayState='paused'"
         onmouseout="this.style.animationPlayState='running'">
      @foreach($randomMembers as $m)
      <a href="{{ '#' }}?name={{ urlencode($m->name) }}"
         style="text-decoration:none; text-align:center; display:block;">
        <img src="{{ env('OSK_LEGACY_URL') }}/uploads/member/{{ $m->fname }}"
             style="width:120px; height:auto; max-height:150px; object-fit:cover;
                    border:1px solid #DCEEF8; border-radius:4px; display:block; margin:0 auto;"
             onerror="this.style.display='none'"
             alt="{{ $m->name }}">
        <span style="font-size:12px; color:#003366; display:block; margin-top:4px; line-height:1.4;">
          {{ $m->name }}
        </span>
      </a>
      @endforeach
    </div>
  </div>
</div>

<style>
@keyframes scrollUp {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-50%); }
}
</style>
