@extends('layouts.app')
@section('title', 'คณะกรรมการชมรม — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')
<div class="card">
  <div class="section-title">
    <span>คณะกรรมการชมรม</span>
    <a href="{{ route('home') }}">← กลับหน้าแรก</a>
  </div>

  <div style="padding:16px 20px;">
    <p style="text-align:center; font-weight:700; font-size:15px; color:#003366; margin-bottom:16px;">
      ชมรมศิษย์เก่าสวนกุหลาบรุ่นที่ 96 (2516-2520)<br>
      วาระดำรงตำแหน่ง พ.ศ. 2565-2567
    </p>

    {{-- คณะกรรมการดำเนินงาน --}}
    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 12px;">คณะกรรมการดำเนินงาน</h3>
    <table style="width:100%; border-collapse:collapse; font-size:13px; margin-bottom:20px;">
      <thead>
        <tr style="background:#308EC4; color:#fff;">
          <th style="padding:7px 14px; text-align:left;">ชื่อ-สกุล</th>
          <th style="padding:7px 14px; text-align:left; width:200px;">ตำแหน่ง</th>
        </tr>
      </thead>
      <tbody>
        @foreach([
          ['นายเกรียงไกร เธียรนุกุล',       'ประธาน'],
          ['นายปวิณ ชำนิประศาสน์',           'รองประธาน'],
          ['ดร.ฤทธิกา สุภารัตน์',            'รองประธาน'],
          ['นายบวรชัย สงวนเกียรติ',          'รองประธาน'],
          ['นายวิชัย สกลวรารุ่งเรือง',       'รองประธาน'],
          ['นายสรวิช หิญชีระนันทน์',         'เลขานุการ 1'],
          ['นายบุญเกิด จิระปัทมะ',           'เลขานุการ 2'],
          ['นายธีรพล แย้มชะยา',              'เหรัญญิก 1'],
          ['นายชยันต์ อัคราทิตย์',           'เหรัญญิก 2'],
          ['นายไชยกาล สุคนธปฏิภาค',         'กรรมการ'],
          ['นายภุชงค์ แสงรังษี',             'กรรมการ'],
          ['นายจามร เพียรพร้อม',             'กรรมการ'],
          ['นายสารัช สันติจิตรุ่งเรือง',     'กรรมการ'],
          ['นายษมาธร พันธุมโพธิ',            'กรรมการ'],
          ['นายสรณะ ฉายประเสริฐ',            'กรรมการ'],
          ['นายอรรถ อรรถยุติ',               'กรรมการ'],
          ['นายสกล เกษมพันธุ์',              'กรรมการ'],
          ['นายพรเกียรติ พรหมสามพราน',       'กรรมการ'],
          ['นายพูนสม ปัณฑิตานนท์',           'กรรมการ'],
          ['นายทรงพล บำเพ็ญสันติ',           'กรรมการ'],
          ['นายอดุล ขาวละออ',                'กรรมการ'],
        ] as [$name, $pos])
        <tr style="border-bottom:1px solid #F1F5F9;">
          <td style="padding:5px 14px;">{{ $name }}</td>
          <td style="padding:5px 14px; color:#308EC4; font-weight:600;">{{ $pos }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{-- ผู้แทนห้อง OSK96 --}}
    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 12px;">ผู้แทนห้อง OSK96</h3>
    <table style="width:100%; border-collapse:collapse; font-size:13px; margin-bottom:20px;">
      <tbody>
        <tr style="border-bottom:1px solid #F1F5F9;">
          <td style="padding:5px 14px;">นาย วิศาลท์ บูรณสันติกูล</td>
          <td style="padding:5px 14px; color:#308EC4; font-weight:600;">ผู้แทนห้อง OSK96</td>
        </tr>
      </tbody>
    </table>

    {{-- ที่ปรึกษากิตติมศักดิ์ --}}
    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 12px;">ที่ปรึกษากิตติมศักดิ์ และที่ปรึกษา</h3>
    <table style="width:100%; border-collapse:collapse; font-size:13px; margin-bottom:20px;">
      <tbody>
        @foreach([
          ['นาย วุฒิพงศ์ ฉายแสง',                  'ที่ปรึกษา กิตติมศักดิ์'],
          ['นาย ประยุทธ์ สวัสดิ์เรียวกุล',          'ที่ปรึกษา กิตติมศักดิ์'],
          ['นาย วรพจน์ ชินวัฒนกิจ',                 'ที่ปรึกษา กิตติมศักดิ์'],
          ['นาย สุปรีดี นิมิตกุล',                  'ที่ปรึกษา กิตติมศักดิ์'],
          ['พล.ต.ต. พีรวัส บุญลอย',                 'ที่ปรึกษา กิตติมศักดิ์'],
          ['พล.ต.อ. เพิ่มพูน ชิดชอบ',               'ที่ปรึกษา กิตติมศักดิ์'],
          ['น.พ.ไพศาล รัมณีย์ธร',                   'ที่ปรึกษา กิตติมศักดิ์'],
          ['พล.อ.น.พ. ประจักษ์ บุญจิตต์พิมล',       'ที่ปรึกษา กิตติมศักดิ์'],
          ['นายเขมทัตต์ พลเดช',                     'ที่ปรึกษา กิตติมศักดิ์'],
          ['นายมณฑล สุดประเสริฐ',                   'ที่ปรึกษา กิตติมศักดิ์'],
          ['พลโท วุฒิไกร คล้ายทอง',                 'ที่ปรึกษา กิตติมศักดิ์'],
          ['ดร.คณิต วัฒนวิเชียร',                   'ที่ปรึกษา กิตติมศักดิ์'],
          ['ดร.ธวัช อังสุวรังสี',                   'ที่ปรึกษา'],
          ['อ.ไพรัช พรสมบูรณ์ศิริ',                 'ที่ปรึกษา'],
          ['นายวีรวัฒน์ ชุติเชษฐพงศ์',              'ที่ปรึกษา'],
          ['นายระเฑียร ศรีมงคล',                    'ที่ปรึกษา'],
          ['นายศักดา จิตตะเสนีย์',                  'ที่ปรึกษา'],
          ['นายนคร ลักษณกาญจน์',                    'ที่ปรึกษา'],
          ['นายประเสริฐ กังวาฬวัฒนา',               'ที่ปรึกษา'],
          ['นายณรงค์รักษ์ สมบูรณ์เวชชการ',          'ที่ปรึกษา'],
        ] as [$name, $pos])
        <tr style="border-bottom:1px solid #F1F5F9;">
          <td style="padding:5px 14px;">{{ $name }}</td>
          <td style="padding:5px 14px; color:#64748B;">{{ $pos }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <p style="font-size:12px; color:#94A3B8; text-align:right;">ปรับปรุง 12 ธ.ค. 2565</p>
  </div>
</div>
@endsection
