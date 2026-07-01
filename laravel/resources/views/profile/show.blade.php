@extends('layouts.app')
@section('title', 'ข้อมูลส่วนตัว — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')
<div class="card">
  <div class="section-title">
    <span>ทะเบียนข้อมูลเพื่อน สวน 92 (96)</span>
    <a href="{{ route('home') }}">← กลับหน้าแรก</a>
  </div>

  <div style="padding:16px 20px;">

    {{-- notice --}}
    <p style="font-size:12px; color:#94A3B8; text-align:center; margin-bottom:16px;">
      ระบบฐานข้อมูลเพื่อนสวนฯ 92(96) นี้จัดทำขึ้นเพื่ออำนวยความสะดวกสำหรับการติดต่อสื่อสาร
      กรุณาอย่านำข้อมูลไปใช้ในทางที่เป็นการรบกวนเพื่อน
    </p>

    <div style="display:flex; gap:20px; align-items:flex-start;">

      {{-- รูป --}}
      <div style="flex-shrink:0; text-align:center; width:160px;">
        @php
          $img = $member->fname ?? '';
          $imgSrc = $img
            ? (file_exists(public_path('uploads/member/'.$img))
                ? asset('uploads/member/'.$img)
                : env('OSK_LEGACY_URL').'/uploads/member/'.$img)
            : null;
        @endphp
        @if($imgSrc)
          <img src="{{ $imgSrc }}" style="width:140px; height:175px; object-fit:cover; object-position:top;
                border:2px solid #DCEEF8; border-radius:4px;" onerror="this.style.display='none'">
        @else
          <div style="width:140px; height:175px; background:#EBF4FB; border:2px solid #DCEEF8;
                      border-radius:4px; display:flex; align-items:center; justify-content:center;
                      color:#94A3B8; font-size:12px;">ไม่มีรูป</div>
        @endif
      </div>

      {{-- ตารางข้อมูล --}}
      <div style="flex:1; min-width:0;">
        <table style="width:100%; border-collapse:collapse; font-size:13px;">

          {{-- ชื่อ --}}
          <tr style="background:#FF99CC;">
            <td style="padding:6px 10px; width:110px; font-weight:700; color:#003366;">{{ $member->title }}</td>
            <td style="padding:6px 10px; font-weight:700; color:#003366;" colspan="2">{{ $member->name }}</td>
            <td style="padding:6px 10px; font-weight:700; color:#003366;" colspan="2">{{ $member->surname }}</td>
            <td style="padding:6px 10px; color:#003366;">เกิด {{ $member->birthday }}</td>
          </tr>

          {{-- สถานะ/อาชีพ --}}
          <tr style="border-bottom:1px solid #FCEEF9;">
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;">สถานะ</td>
            <td style="padding:5px 10px;" colspan="2">{{ $member->status }}</td>
            <td style="padding:5px 10px;" colspan="3">{{ $member->work }}</td>
          </tr>

          {{-- อีเมล / มือถือ --}}
          <tr style="border-bottom:1px solid #FCEEF9; background:#FDF5FF;">
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;">อีเมล์</td>
            <td style="padding:5px 10px;" colspan="3">
              @php $email = $member->e_mail ?? ''; @endphp
              {{ ($email === 'X' || $email === 'x' || $email === '') ? '-' : $email }}
            </td>
            <td style="padding:5px 10px;" colspan="2">มือถือ&nbsp; {{ $member->tel_h ?: '-' }}</td>
          </tr>

          {{-- ที่อยู่ --}}
          <tr style="border-bottom:1px solid #FCEEF9;">
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;" rowspan="2">ที่อยู่</td>
            <td style="padding:5px 10px;" colspan="5">{{ $member->addr1_tambom ?: '-' }}</td>
          </tr>
          <tr style="border-bottom:1px solid #FCEEF9; background:#FDF5FF;">
            <td style="padding:5px 10px;" colspan="2">{{ $member->addr2_amphur ?: '-' }}</td>
            <td style="padding:5px 10px;">{{ $member->addr3_province ?: '-' }}</td>
            <td style="padding:5px 10px;">{{ $member->postal_code ?: '-' }}</td>
            <td style="padding:5px 10px;">โทร. {{ $member->telephone ?: '-' }}</td>
          </tr>

          {{-- ที่อยู่ 2 / ทำงาน --}}
          <tr style="border-bottom:1px solid #FCEEF9;">
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;" rowspan="2">ที่อยู่ 2/ทำงาน</td>
            <td style="padding:5px 10px;" colspan="5">{{ $member->off ?: '-' }}</td>
          </tr>
          <tr style="border-bottom:1px solid #FCEEF9; background:#FDF5FF;">
            <td style="padding:5px 10px;" colspan="2">{{ $member->off_amphur ?: '-' }}</td>
            <td style="padding:5px 10px;">{{ $member->off_province ?: '-' }}</td>
            <td style="padding:5px 10px;">{{ $member->off_post ?: '-' }}</td>
            <td style="padding:5px 10px;">โทร. {{ $member->off_tel ?: '-' }}</td>
          </tr>

          {{-- ร่วมงาน --}}
          @php
            $actYears = [
              'act_65'=>65,'act_66'=>66,'act_67'=>67,'act_68'=>68,
              'act_69'=>69,'act_70'=>70,'act_71'=>71,
            ];
          @endphp
          <tr style="border-bottom:1px solid #FCEEF9;">
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;" rowspan="2">ร่วมงาน</td>
            @foreach($actYears as $field => $yr)
              <td style="padding:5px 10px; text-align:center; font-size:12px; color:#64748B;">{{ $yr }}</td>
            @endforeach
          </tr>
          <tr style="border-bottom:1px solid #FCEEF9; background:#FDF5FF;">
            @foreach($actYears as $field => $yr)
              @php
                $val = $member->$field ?? '';
                $display = ($val == $yr) ? $yr : (($val === 'N/A') ? 'N/A' : '-');
              @endphp
              <td style="padding:5px 10px; text-align:center; font-size:12px;
                         color:{{ $display == '-' ? '#CBD5E1' : '#16A34A' }}; font-weight:600;">
                {{ $display }}
              </td>
            @endforeach
          </tr>

          {{-- งานอดิเรก / Facebook / Line --}}
          <tr style="border-bottom:1px solid #FCEEF9;">
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;" colspan="2">งานอดิเรก</td>
            <td style="padding:5px 10px;" colspan="5">{{ $member->sport ?: '-' }}</td>
          </tr>
          <tr style="border-bottom:1px solid #FCEEF9; background:#FDF5FF;">
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;" colspan="2">Facebook</td>
            <td style="padding:5px 10px;" colspan="5">
              @if($member->facebook)
                <a href="{{ $member->facebook }}" target="_blank" style="color:#308EC4;">{{ $member->facebook }}</a>
              @else -
              @endif
            </td>
          </tr>
          <tr style="border-bottom:1px solid #FCEEF9;">
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;" colspan="2">Line ID</td>
            <td style="padding:5px 10px;" colspan="5">{{ $member->line_id ?: '-' }}</td>
          </tr>
          <tr style="border-bottom:1px solid #FCEEF9; background:#FDF5FF;">
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;" colspan="2">บริจาคครั้งสุดท้าย</td>
            <td style="padding:5px 10px;" colspan="5">{{ $member->last_donate ?: '-' }}</td>
          </tr>

          {{-- ม.ศ. / สมาชิก / ขนาดเสื้อ --}}
          <tr>
            <td style="padding:5px 10px; color:#CC00CC; font-weight:600;">ม.ศ.</td>
            <td style="padding:5px 10px;">1/{{ $member->class1 ?: '-' }}</td>
            <td style="padding:5px 10px;">2/{{ $member->class2 ?: '-' }}</td>
            <td style="padding:5px 10px;">3/{{ $member->class3 ?: '-' }}</td>
            <td style="padding:5px 10px;">4/{{ $member->class4 ?: '-' }}</td>
            <td style="padding:5px 10px; font-size:12px;" colspan="2">
              5/{{ $member->class5 ?: '-' }}
              &nbsp;&nbsp;สมาชิกสมาคมฯ {{ $member->id_osk ?: '-' }}
              &nbsp;&nbsp;ขนาดเสื้อ {{ $member->size ?: '-' }}
            </td>
          </tr>

        </table>

        {{-- ปุ่ม --}}
        <div style="margin-top:14px; display:flex; gap:10px; justify-content:flex-end;">
          <a href="#"
             style="background:#EBF4FB; color:#003366; border:1px solid #DCEEF8; border-radius:5px;
                    padding:6px 20px; font-size:13px; text-decoration:none; font-weight:600;">
            แก้ไข (เร็วๆ นี้)
          </a>
          <a href="{{ route('logout') }}"
             style="background:#DC2626; color:#fff; border:none; border-radius:5px;
                    padding:6px 20px; font-size:13px; text-decoration:none; font-weight:600;">
            ออกจากระบบ
          </a>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
