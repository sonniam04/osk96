@extends('layouts.app')
@section('title', $groupName . ' — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')

{{-- Section header --}}
<div class="card" style="overflow:hidden;">
  <div class="section-title">
    <span>{{ $groupName }}</span>
    <a href="{{ route('home') }}">← กลับหน้าแรก</a>
  </div>

  {{-- Category selector --}}
  <div style="padding:12px 16px; background:#EBF4FB; border-bottom:1px solid #DCEEF8; display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
    <span style="font-size:13px; color:#003366; font-weight:600;">หมวด:</span>
    <select onchange="location.href=this.value"
            style="border:1px solid #DCEEF8; border-radius:6px; padding:5px 10px;
                   font-size:13px; font-family:'Sarabun',sans-serif; color:#003366; background:#fff;">
      <option value="">— เลือกหมวดที่ต้องการ —</option>
      @foreach([
        ['label'=>'ได้ข่าวว่า...',             'g'=>1,  'o'=>0],
        ['label'=>'จดหมายเวียน',               'g'=>2,  'o'=>22],
        ['label'=>'เพื่อน ช่วย เพื่อน',       'g'=>5,  'o'=>24],
        ['label'=>'ภาพเด็ดคลิปโดน',            'g'=>6,  'o'=>0],
        ['label'=>'คำคม/ปรัชญาชีวิต',         'g'=>7,  'o'=>16],
        ['label'=>'ข่าวสารวิชาการ',            'g'=>7,  'o'=>17],
        ['label'=>'สันทนาการ/บันเทิง',         'g'=>7,  'o'=>18],
        ['label'=>'ลูกสวน 92',                 'g'=>7,  'o'=>20],
        ['label'=>'ซุปซิป นานาสาระ',           'g'=>7,  'o'=>26],
        ['label'=>'ฝากส่งเมล์ถึงเพื่อนทุกคน', 'g'=>11, 'o'=>0],
        ['label'=>'รักรุ่นจริงไม่ทิ้งกัน',    'g'=>12, 'o'=>0],
        ['label'=>'คุยกับท่านประธาน',          'g'=>13, 'o'=>0],
        ['label'=>'ติดต่อเว็บมาสเตอร์',        'g'=>14, 'o'=>0],
        ['label'=>'เพื่อนประกอบธุรกิจ',        'g'=>29, 'o'=>29],
        ['label'=>'การทำบุญและบริจาคโลหิต',    'g'=>30, 'o'=>30],
        ['label'=>'เนื้อคำร้องเพลงสวนฯ',       'g'=>31, 'o'=>31],
      ] as $cat)
      @php $url = route('webboard.index').'?group_id='.$cat['g'].'&old_group_id='.$cat['o']; @endphp
      <option value="{{ $url }}"
        {{ $groupId == $cat['g'] && $oldGroupId == $cat['o'] ? 'selected' : '' }}>
        {{ $cat['label'] }}
      </option>
      @endforeach
    </select>

    {{-- Search --}}
    <form method="GET" action="{{ route('webboard.index') }}" style="display:flex; gap:6px; margin-left:auto;">
      <input type="hidden" name="group_id" value="{{ $groupId }}">
      <input type="hidden" name="old_group_id" value="{{ $oldGroupId }}">
      <input name="search" type="text" value="{{ $search }}" placeholder="ค้นหาหัวข้อ..."
             style="border:1px solid #DCEEF8; border-radius:6px; padding:5px 10px;
                    font-size:13px; font-family:'Sarabun',sans-serif; width:180px;">
      <button type="submit"
              style="background:#38B8F5; color:#fff; border:none; border-radius:6px;
                     padding:5px 14px; font-size:13px; font-family:'Sarabun',sans-serif; cursor:pointer;">
        ค้นหา
      </button>
    </form>
  </div>

  {{-- Post list --}}
  <div style="overflow-x:auto;">
    <table style="width:100%; border-collapse:collapse; font-size:13px;">
      <thead>
        <tr style="background:#EBF4FB; border-bottom:2px solid #38B8F5;">
          <th style="padding:8px 14px; text-align:center; color:#003366; font-weight:700; width:70px;">No.</th>
          <th style="padding:8px 14px; text-align:left;  color:#003366; font-weight:700;">หัวข้อ</th>
          <th style="padding:8px 14px; text-align:center; color:#003366; font-weight:700; white-space:nowrap; width:55px;">ดู</th>
          <th style="padding:8px 14px; text-align:center; color:#003366; font-weight:700; white-space:nowrap; width:55px;">ตอบ</th>
          <th style="padding:8px 14px; text-align:center; color:#003366; font-weight:700; white-space:nowrap; width:80px;">สร้าง</th>
          <th style="padding:8px 14px; text-align:center; color:#003366; font-weight:700; white-space:nowrap; width:80px;">ล่าสุด</th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
        @php
          $mm = ['','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
          $fmt = fn($d) => \Carbon\Carbon::parse($d)->format('d').' '.$mm[(int)\Carbon\Carbon::parse($d)->format('m')].' '
                           .substr(\Carbon\Carbon::parse($d)->year+543, 2);
          $isNew    = $post->_new    <= 7 && $post->question_date == $post->question_date_update;
          $isUpdate = $post->_update <= 7 && $post->question_date != $post->question_date_update;
        @endphp
        <tr style="border-bottom:1px solid #F1F5F9;"
            onmouseover="this.style.background='#EBF4FB'" onmouseout="this.style.background=''">
          <td style="padding:3px 14px; text-align:center; color:#94A3B8; font-size:11px;">
            {{ sprintf('%07d', $post->question_id) }}
          </td>
          <td style="padding:3px 14px;">
            <a href="{{ route('webboard.view', $post->question_id) }}"
               style="color:#003366; text-decoration:none; font-weight:500; line-height:1.4;">
              {{ mb_substr($post->question_title, 0, 60) }}
            </a>
            @if($isNew)
              <span style="font-size:10px; background:#FF6600; color:#fff; border-radius:3px; padding:1px 5px; margin-left:4px;">ใหม่</span>
            @elseif($isUpdate)
              <span style="font-size:10px; background:#38B8F5; color:#fff; border-radius:3px; padding:1px 5px; margin-left:4px;">อัปเดต</span>
            @endif
          </td>
          <td style="padding:3px 14px; text-align:center; color:#64748B;">{{ $post->question_view ?? 0 }}</td>
          <td style="padding:3px 14px; text-align:center; color:#64748B;">{{ $post->question_post ?? 0 }}</td>
          <td style="padding:3px 14px; text-align:center; color:#64748B; white-space:nowrap; font-size:12px;">
            {{ $fmt($post->question_date) }}
          </td>
          <td style="padding:3px 14px; text-align:center; color:#64748B; white-space:nowrap; font-size:12px;">
            {{ $fmt($post->question_date_update) }}
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" style="padding:32px; text-align:center; color:#94A3B8;">
            ยังไม่มีโพสต์ในหมวดนี้
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Pagination --}}
  @if($posts->lastPage() > 1)
  <div style="padding:12px 16px; display:flex; justify-content:center; gap:6px; flex-wrap:wrap; border-top:1px solid #EBF4FB;">
    @if($posts->onFirstPage())
      <span style="padding:4px 10px; border-radius:4px; font-size:13px; color:#94A3B8;">&laquo;</span>
    @else
      <a href="{{ $posts->previousPageUrl() }}"
         style="padding:4px 10px; border-radius:4px; font-size:13px; background:#EBF4FB; color:#38B8F5; text-decoration:none;">&laquo;</a>
    @endif

    @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
      @if($page == $posts->currentPage())
        <span style="padding:4px 10px; border-radius:4px; font-size:13px; background:#38B8F5; color:#fff; font-weight:700;">{{ $page }}</span>
      @else
        <a href="{{ $url }}"
           style="padding:4px 10px; border-radius:4px; font-size:13px; background:#EBF4FB; color:#38B8F5; text-decoration:none;">{{ $page }}</a>
      @endif
    @endforeach

    @if($posts->hasMorePages())
      <a href="{{ $posts->nextPageUrl() }}"
         style="padding:4px 10px; border-radius:4px; font-size:13px; background:#EBF4FB; color:#38B8F5; text-decoration:none;">&raquo;</a>
    @else
      <span style="padding:4px 10px; border-radius:4px; font-size:13px; color:#94A3B8;">&raquo;</span>
    @endif
  </div>
  @endif

</div>

@endsection
