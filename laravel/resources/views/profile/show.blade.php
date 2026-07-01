@extends('layouts.app')
@section('title', 'ข้อมูลส่วนตัว — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')
<div class="card">
  <div class="section-title">
    <span>ทะเบียนข้อมูลเพื่อน สวน 92 (96)</span>
    <a href="{{ route('home') }}">← กลับหน้าแรก</a>
  </div>

  <div style="padding:16px 20px;">

    <p style="font-size:11px; color:#94A3B8; text-align:center; margin-bottom:14px;">
      ระบบฐานข้อมูลเพื่อนสวนฯ 92(96) กรุณาอย่านำข้อมูลไปใช้ในทางที่เป็นการรบกวนเพื่อน
    </p>

    <div style="display:flex; gap:16px; align-items:flex-start;">

      {{-- รูป --}}
      @php
        $img = $member->fname ?? '';
        $imgSrc = $img
          ? (file_exists(public_path('uploads/member/'.$img))
              ? asset('uploads/member/'.$img)
              : env('OSK_LEGACY_URL').'/uploads/member/'.$img)
          : null;
      @endphp
      <div style="flex-shrink:0; width:130px; text-align:center;">
        @if($imgSrc)
          <img src="{{ $imgSrc }}" style="width:120px; height:150px; object-fit:cover; object-position:top;
               border:2px solid #DCEEF8; border-radius:4px;" onerror="this.style.display='none'">
        @else
          <div style="width:120px; height:150px; background:#EBF4FB; border:2px solid #DCEEF8;
                      border-radius:4px; display:flex; align-items:center; justify-content:center;
                      color:#94A3B8; font-size:11px;">ไม่มีรูป</div>
        @endif
      </div>

      {{-- ข้อมูล --}}
      <div style="flex:1; min-width:0;">

        {{-- ชื่อ --}}
        <div style="background:#FFAACC; border-radius:4px; padding:8px 12px; margin-bottom:8px; display:flex; gap:16px; align-items:center; flex-wrap:wrap;">
          <span style="font-weight:700; color:#003366; font-size:14px;">{{ $member->title }} {{ $member->name }} {{ $member->surname }}</span>
          <span style="color:#003366; font-size:13px; margin-left:auto;">เกิด {{ $member->birthday }}</span>
        </div>

        {{-- ตาราง field --}}
        @php
          $email = $member->e_mail ?? '';
          $emailDisplay = ($email === 'X' || $email === 'x' || $email === '') ? '-' : $email;
          $rows = [
            ['สถานะ',        ($member->status ?? '-').' '.($member->work ?? '')],
            ['อีเมล์',       $emailDisplay],
            ['มือถือ',       $member->tel_h ?: '-'],
            ['ที่อยู่',      implode(' ', array_filter([
                               $member->addr1_tambom ?? '',
                               $member->addr2_amphur ?? '',
                               $member->addr3_province ?? '',
                               $member->postal_code ?? '',
                               $member->telephone ? 'โทร.'.$member->telephone : '',
                             ]))],
            ['ที่อยู่ 2/ทำงาน', implode(' ', array_filter([
                               $member->off ?? '',
                               $member->off_amphur ?? '',
                               $member->off_province ?? '',
                               $member->off_post ?? '',
                               $member->off_tel ? 'โทร.'.$member->off_tel : '',
                             ]))],
            ['งานอดิเรก',   $member->sport ?: '-'],
            ['Facebook',     $member->facebook ?: '-'],
            ['Line ID',      $member->line_id ?: '-'],
            ['บริจาคครั้งสุดท้าย', $member->last_donate ?: '-'],
          ];
        @endphp

        @foreach($rows as $i => [$label, $val])
        <div style="display:flex; border-bottom:1px solid #FCEEF9; {{ $i%2==0 ? 'background:#FDF5FF;' : '' }}">
          <div style="width:130px; flex-shrink:0; padding:5px 10px; color:#CC00CC; font-weight:600; font-size:13px;">{{ $label }}</div>
          <div style="padding:5px 10px; font-size:13px; color:#1E293B; word-break:break-word; flex:1;">{{ $val ?: '-' }}</div>
        </div>
        @endforeach

        {{-- ร่วมงาน --}}
        @php
          $actYears = ['act_65'=>65,'act_66'=>66,'act_67'=>67,'act_68'=>68,'act_69'=>69,'act_70'=>70,'act_71'=>71];
        @endphp
        <div style="display:flex; border-bottom:1px solid #FCEEF9; background:#FDF5FF; align-items:center;">
          <div style="width:130px; flex-shrink:0; padding:5px 10px; color:#CC00CC; font-weight:600; font-size:13px;">ร่วมงาน</div>
          <div style="padding:5px 10px; display:flex; gap:0;">
            @foreach($actYears as $field => $yr)
            @php
              $v = $member->$field ?? '';
              $hit = ($v == $yr);
            @endphp
            <div style="text-align:center; min-width:32px;">
              <div style="font-size:11px; color:#94A3B8;">{{ $yr }}</div>
              <div style="font-size:12px; font-weight:700; color:{{ $hit ? '#16A34A' : '#CBD5E1' }};">
                {{ $hit ? $yr : ($v === 'N/A' ? 'N/A' : '-') }}
              </div>
            </div>
            @endforeach
          </div>
        </div>

        {{-- ม.ศ. / สมาชิก / ขนาดเสื้อ --}}
        <div style="display:flex; border-bottom:1px solid #FCEEF9; align-items:center;">
          <div style="width:130px; flex-shrink:0; padding:5px 10px; color:#CC00CC; font-weight:600; font-size:13px;">ม.ศ.</div>
          <div style="padding:5px 10px; display:flex; gap:12px; font-size:13px; flex-wrap:wrap;">
            @foreach([1,2,3,4,5] as $n)
              <span>{{ $n }}/<strong>{{ $member->{'class'.$n} ?: '-' }}</strong></span>
            @endforeach
            <span style="color:#64748B;">สมาชิกสมาคมฯ {{ $member->id_osk ?: '-' }}</span>
            <span style="color:#64748B;">ขนาดเสื้อ {{ $member->size ?: '-' }}</span>
          </div>
        </div>

        {{-- ปุ่ม --}}
        <div style="margin-top:12px; display:flex; gap:8px; justify-content:flex-end;">
          <a href="{{ route('profile.edit') }}"
             style="background:#EBF4FB; color:#003366; border:1px solid #DCEEF8; border-radius:5px;
                    padding:6px 18px; font-size:13px; text-decoration:none; font-weight:600;">
            แก้ไข
          </a>
          <a href="{{ route('logout') }}"
             style="background:#DC2626; color:#fff; border-radius:5px;
                    padding:6px 18px; font-size:13px; text-decoration:none; font-weight:600;">
            ออกจากระบบ
          </a>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
