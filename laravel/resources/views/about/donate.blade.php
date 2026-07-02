@extends('layouts.app')
@section('title', 'รักรุ่นจริงไม่ทิ้งกัน — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')
<div class="card">
  <div class="section-title">
    <span>รักรุ่นจริงไม่ทิ้งกัน</span>
    <a href="{{ route('home') }}">← กลับหน้าแรก</a>
  </div>

  <div style="padding:24px 20px; text-align:center;">
    <p style="font-size:22px; font-weight:700; color:#003366; margin-bottom:8px;">รักรุ่นจริงไม่ทิ้งกัน</p>
    <p style="font-size:15px; color:#38B8F5; margin-bottom:24px;">" เราไม่ทิ้งกัน "</p>
    <p style="font-size:13.5px; color:#4B5563; line-height:1.8; max-width:500px; margin:0 auto;">
      ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่นที่ 96 จัดตั้งกองทุน "รักรุ่นจริงไม่ทิ้งกัน"
      เพื่อช่วยเหลือเพื่อนร่วมรุ่นที่ประสบปัญหาหรือต้องการความช่วยเหลือ
      ตามหลักเกณฑ์ระเบียบว่าด้วยเงินของชมรมฯ
    </p>
    <div style="margin-top:24px; padding:16px; background:#EBF4FB; border-radius:8px; display:inline-block; text-align:left;">
      <p style="font-weight:700; color:#003366; margin-bottom:8px;">ติดต่อสอบถาม</p>
      <p style="font-size:13px; color:#4B5563;">กรุณาติดต่อคณะกรรมการชมรมฯ ผ่านทาง Facebook OSK96 หรือเว็บไซด์</p>
    </div>
    <div style="margin-top:16px;">
      <a href="{{ route('webboard.index') }}?group_id=12&old_group_id=0"
         style="display:inline-block; background:#38B8F5; color:#fff; padding:10px 24px;
                border-radius:6px; text-decoration:none; font-size:14px; font-weight:600;">
        ดูกระทู้ในหมวด "รักรุ่นจริงไม่ทิ้งกัน"
      </a>
    </div>
  </div>
</div>
@endsection
