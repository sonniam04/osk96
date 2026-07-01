@extends('layouts.app')
@section('title', 'ตัวแทน/ผู้ประสานงาน — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')
<div class="card">
  <div class="section-title">
    <span>ตัวแทน/ผู้ประสานงาน</span>
    <a href="{{ route('home') }}">← กลับหน้าแรก</a>
  </div>

  <div style="padding:16px 20px;">
    <p style="text-align:center; font-weight:700; font-size:15px; color:#003366; margin-bottom:16px;">
      ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่นที่ 96 (2516-2520)
    </p>

    <table style="width:100%; border-collapse:collapse; font-size:13px;">
      <thead>
        <tr style="background:#308EC4; color:#fff;">
          <th style="padding:8px 14px; text-align:center; width:60px;">ห้อง</th>
          <th style="padding:8px 14px; text-align:left;">ตัวแทนผู้ประสานงาน</th>
        </tr>
      </thead>
      <tbody>
        @foreach([
          [1,  'นายยงยุทธ สุชนชาติ'],
          [2,  'นายเศรษฐา พัฒนแก้ว'],
          [3,  'นายสรวิช หิญชีระนันทน์'],
          [4,  'นายไชยกาล สุคนธปฏิภาค'],
          [5,  'นายบวรชัย สงวนเกียรติ'],
          [6,  'นายจามร เพียรพร้อม'],
          [7,  'นายวิญญู เกียรติวัฒน์'],
          [8,  'นายพลเทพ ทัศนสุวรรณ'],
          [9,  'นายพิษณุพร อุทกภาชน์'],
          [10, 'นายเสนิส วัชรางค์กุล'],
          [11, 'นายวรพจน์ ชินวัฒนกิจ'],
          [12, 'นายวิชัย สกลวรารุ่งเรือง'],
          [13, 'นายพยนต์ สินธุนาวา'],
          [14, 'นายวิชัย เจียมพิทยานุวัฒน์'],
          [15, 'นายศุลินทพล กระบิลสิงห์'],
          [16, 'นายกวีรัตน์ ดีประเสริฐวงศ์'],
          ['17 (เพื่อนออก มศ.3 รับราชการ)', 'พลโท วุฒิไกร คล้ายทอง'],
          ['18 (เพื่อนออก มศ.3 เอกชน)',    'นายนคร ลักษณกาญจน์'],
        ] as [$room, $name])
        <tr style="border-bottom:1px solid #F1F5F9;"
            onmouseover="this.style.background='#EBF4FB'" onmouseout="this.style.background=''">
          <td style="padding:7px 14px; text-align:center; font-weight:700; color:#308EC4;">{{ $room }}</td>
          <td style="padding:7px 14px;">{{ $name }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <p style="font-size:12px; color:#94A3B8; text-align:right; margin-top:12px;">ปรับปรุง 17 ส.ค. 2565</p>
  </div>
</div>
@endsection
