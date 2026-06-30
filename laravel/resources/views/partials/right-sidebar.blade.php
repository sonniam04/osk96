{{-- รวมของเพื่อน --}}
<div class="sidebar-section">
  <div class="sidebar-header">รวมของเพื่อน</div>
  <div style="padding:10px;">
    <select onchange="if(this.value) window.location='/members?type='+this.value"
            style="width:100%; border:1px solid #DCEEF8; border-radius:6px;
              padding:6px 8px; font-size:12px; font-family:'Sarabun',sans-serif;
              color:#003366; background:#fff; cursor:pointer;">
      <option value="">— ค้นหาเพื่อน —</option>
      <option value="16">มาจากทุกที่</option>
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

{{-- เพื่อนพอง — รูปสมาชิกสุ่ม --}}
@php
  try {
    $randomMembers = \DB::table('data')
      ->where('st', 1)
      ->whereRaw("TRIM(fname) != ''")
      ->whereNotNull('fname')
      ->inRandomOrder()
      ->limit(12)
      ->select('name','surname','fname')
      ->get();
  } catch(\Exception $e) {
    $randomMembers = collect();
  }
@endphp

@if($randomMembers->count())
<div class="sidebar-section">
  <div class="sidebar-header">เพื่อนพอง ของเพื่อน</div>
  <div style="padding:8px; display:grid; grid-template-columns:repeat(3,1fr); gap:6px;">
    @foreach($randomMembers as $m)
    <a href="{{ route('members.search') }}?type=16"
       style="text-decoration:none; text-align:center;" title="{{ $m->name }} {{ $m->surname }}">
      <img src="/uploads/member/{{ $m->fname }}"
           style="width:100%; aspect-ratio:1; object-fit:cover; border-radius:6px;
                  border:1px solid #DCEEF8; display:block;"
           onerror="this.parentElement.style.display='none'"
           alt="{{ $m->name }}">
      <div style="font-size:10px; color:#555; margin-top:3px; line-height:1.2;
                  overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
        {{ $m->name }}
      </div>
    </a>
    @endforeach
  </div>
  <div style="padding:0 8px 8px; text-align:center;">
    <a href="{{ route('members.search') }}?type=16"
       style="font-size:11px; color:#308EC4; text-decoration:none;">ดูทั้งหมด &rsaquo;</a>
  </div>
</div>
@endif
