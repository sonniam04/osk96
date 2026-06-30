@extends('layouts.app')
@section('title', 'ค้นหาสมาชิก — OSK96')

@section('content')
<div class="card" style="overflow:hidden;">
  <div class="section-title">
    <span>ค้นหาสมาชิก — {{ $label }}</span>
    <span style="font-size:12px; opacity:.8;">{{ $members->total() }} คน</span>
  </div>

  <div style="padding:16px;">

    {{-- Search form --}}
    <form method="GET" action="{{ route('members.search') }}"
          style="display:flex; gap:10px; align-items:center; margin-bottom:16px; flex-wrap:wrap;">
      <select name="type" onchange="this.form.submit()"
              style="border:1px solid #DCEEF8; border-radius:6px; padding:6px 10px;
                     font-family:'Sarabun',sans-serif; font-size:13px; color:#003366; background:#fff;">
        <option value="16" @selected($type==16)>มาจากทุกที่</option>
        <option value="1"  @selected($type==1) >ห้องเรียน ม.ต.1</option>
        <option value="2"  @selected($type==2) >ห้องเรียน ม.ต.2</option>
        <option value="3"  @selected($type==3) >ห้องเรียน ม.ต.3</option>
        <option value="4"  @selected($type==4) >ห้องเรียน ม.ต.4</option>
        <option value="5"  @selected($type==5) >ห้องเรียน ม.ต.5</option>
        <option value="6"  @selected($type==6) >ยกเลิกเรียน</option>
        <option value="7"  @selected($type==7) >เสียชีวิต</option>
        <option value="8"  @selected($type==8) >ไม่ทราบสถานที่</option>
        <option value="9"  @selected($type==9) >ยังอยู่ต่างประเทศ</option>
        <option value="10" @selected($type==10)>มาจากอาชีพ</option>
        <option value="11" @selected($type==11)>เพื่อน/ญาติสนับสนุน</option>
        <option value="13" @selected($type==13)>เพื่อนที่ยังหาไม่เจอ</option>
        <option value="14" @selected($type==14)>เพื่อนที่อยู่ในแพทย์</option>
        <option value="15" @selected($type==15)>เพื่อนที่รับราชการตำรวจ</option>
      </select>
      @if(in_array($type, [1,2,3,4,5]))
        <input type="text" name="room" value="{{ $room }}" placeholder="เลขห้อง..."
               style="border:1px solid #DCEEF8; border-radius:6px; padding:6px 10px;
                      font-family:'Sarabun',sans-serif; font-size:13px; width:100px;">
        <button type="submit"
                style="background:#308EC4; color:#fff; border:none; border-radius:6px;
                       padding:6px 14px; font-family:'Sarabun',sans-serif; font-size:13px; cursor:pointer;">
          ค้นหา
        </button>
      @endif
    </form>

    {{-- Member grid --}}
    @if($members->count())
    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(130px,1fr)); gap:12px;">
      @foreach($members as $m)
      <div style="text-align:center; padding:10px 6px; border:1px solid #DCEEF8;
                  border-radius:8px; background:#FAFEFF;">
        @if(!empty($m->fname))
          <img src="/uploads/member/{{ $m->fname }}"
               style="width:80px; height:80px; object-fit:cover; border-radius:50%;
                      border:2px solid #C8E6F5; display:block; margin:0 auto 6px;">
        @else
          <div style="width:80px; height:80px; border-radius:50%; background:#EBF4FB;
                      display:flex; align-items:center; justify-content:center;
                      margin:0 auto 6px; font-size:28px; border:2px solid #C8E6F5;">👤</div>
        @endif
        <div style="font-size:12px; font-weight:600; color:#003366; line-height:1.3;">
          {{ $m->name }}<br>{{ $m->surname }}
        </div>
        @if(!empty($m->addr3_province))
        <div style="font-size:11px; color:#94A3B8; margin-top:2px;">{{ $m->addr3_province }}</div>
        @endif
      </div>
      @endforeach
    </div>

    {{-- Pagination --}}
    <div style="margin-top:16px; display:flex; justify-content:center; gap:6px; font-size:13px;">
      @if($members->onFirstPage())
        <span style="padding:4px 10px; color:#94A3B8;">&laquo;</span>
      @else
        <a href="{{ $members->previousPageUrl() }}"
           style="padding:4px 10px; border:1px solid #DCEEF8; border-radius:4px;
                  color:#308EC4; text-decoration:none;">&laquo;</a>
      @endif

      <span style="padding:4px 12px; background:#308EC4; color:#fff; border-radius:4px;">
        {{ $members->currentPage() }} / {{ $members->lastPage() }}
      </span>

      @if($members->hasMorePages())
        <a href="{{ $members->nextPageUrl() }}"
           style="padding:4px 10px; border:1px solid #DCEEF8; border-radius:4px;
                  color:#308EC4; text-decoration:none;">&raquo;</a>
      @else
        <span style="padding:4px 10px; color:#94A3B8;">&raquo;</span>
      @endif
    </div>
    @else
      <p style="text-align:center; color:#94A3B8; padding:40px 0;">ไม่พบสมาชิกในกลุ่มนี้</p>
    @endif

  </div>
</div>
@endsection
