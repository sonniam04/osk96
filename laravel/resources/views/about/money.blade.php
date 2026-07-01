@extends('layouts.app')
@section('title', 'ระเบียบว่าด้วยเงิน — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')
<div class="card">
  <div class="section-title">
    <span>ระเบียบว่าด้วยเงิน</span>
    <a href="{{ route('home') }}">← กลับหน้าแรก</a>
  </div>

  <div style="padding:16px 20px; font-size:13.5px; line-height:1.9; color:#1E293B;">
    <p style="font-weight:700; text-align:center; font-size:14px; color:#003366; margin-bottom:16px;">
      ระเบียบว่าด้วยเงินของชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่นที่ 96 (2516-2520)
    </p>

    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 10px;">1. เงินของชมรมฯ ให้หมายถึง</h3>
    <ul style="margin:0 0 16px 20px;">
      <li>เงินที่เก็บได้จากเพื่อนร่วมชมรมฯ</li>
      <li>เงินที่ได้รับจากการบริจาค หรือรายได้จากการจัดกิจกรรมของชมรมฯ</li>
      <li>เงินผลประโยชน์ต่างๆ</li>
    </ul>

    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 10px;">2. วัตถุประสงค์ของเงินของชมรมฯ</h3>
    <ul style="margin:0 0 16px 20px;">
      <li>เพื่อดำเนินกิจกรรมของชมรมฯ</li>
      <li>เพื่อการสงเคราะห์</li>
      <li>เพื่อกิจกรรมสาธารณะประโยชน์</li>
    </ul>

    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 10px;">3. ความหมายในการใช้เงิน</h3>
    <p><strong>3.1 เพื่อการดำเนินกิจกรรมของชมรมฯ</strong> ได้แก่ ค่าใช้จ่ายในการประชุม ค่าใช้จ่ายในการส่งข้อมูลข่าวสาร ค่าจ้างเจ้าหน้าที่ ค่าจัดทำทำเนียบรุ่น ค่าใช้จ่ายตามประเพณีปฏิบัติของชมรมฯ</p>
    <p><strong>3.2 เพื่อการสงเคราะห์</strong> ได้แก่ การใช้จ่ายเงินเพื่อสงเคราะห์ช่วยเหลือเพื่อนร่วมรุ่น และครอบครัวของเพื่อนร่วมรุ่นที่เสียชีวิต เพื่อนร่วมรุ่นที่เจ็บป่วยต้องใช้จ่ายค่ารักษาพยาบาล หรืออยู่ในฐานะขัดสน ทุพพลภาพ หรือประสบภัยพิบัติ</p>
    <p><strong>3.3 เพื่อกิจกรรมสาธารณะประโยชน์</strong> ได้แก่ การสนับสนุนช่วยเหลือการจัดกิจกรรมของโรงเรียนสวนกุหลาบวิทยาลัย กิจกรรมทางศาสนา กิจกรรมทางการศึกษา หรือกิจกรรมเพื่อการกุศล</p>

    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:16px 0 10px;">9. หลักเกณฑ์การใช้จ่าย</h3>
    <table style="width:100%; border-collapse:collapse; font-size:13px; margin-bottom:16px;">
      <thead>
        <tr style="background:#308EC4; color:#fff;">
          <th style="padding:8px 14px; text-align:left;">ประเภท</th>
          <th style="padding:8px 14px; text-align:right; width:160px;">วงเงิน</th>
        </tr>
      </thead>
      <tbody>
        <tr style="border-bottom:1px solid #F1F5F9;">
          <td style="padding:7px 14px;">ค่าใช้จ่ายกิจกรรมของชมรมฯ</td>
          <td style="padding:7px 14px; text-align:right;">ตามจ่ายจริง (ประหยัด)</td>
        </tr>
        <tr style="border-bottom:1px solid #F1F5F9; background:#F8FAFC;">
          <td style="padding:7px 14px;">อวยพร / แสดงความยินดี / งานตามประเพณี</td>
          <td style="padding:7px 14px; text-align:right;">ไม่เกิน 3,000 บาท/ครั้ง</td>
        </tr>
        <tr style="border-bottom:1px solid #F1F5F9;">
          <td style="padding:7px 14px;">พวงหรีด (บิดา มารดา ภรรยา บุตร หรือเพื่อนร่วมรุ่นเสียชีวิต)</td>
          <td style="padding:7px 14px; text-align:right;">ไม่เกิน 1,000 บาท</td>
        </tr>
        <tr style="border-bottom:1px solid #F1F5F9; background:#F8FAFC;">
          <td style="padding:7px 14px;">เงินช่วยงาน (บิดา มารดา ภรรยา หรือบุตรของสมาชิกเสียชีวิต)</td>
          <td style="padding:7px 14px; text-align:right;">2,000 บาท</td>
        </tr>
        <tr style="border-bottom:1px solid #F1F5F9;">
          <td style="padding:7px 14px;">เงินช่วยงาน (เพื่อนสมาชิกเสียชีวิต)</td>
          <td style="padding:7px 14px; text-align:right;">5,000 บาท</td>
        </tr>
        <tr style="border-bottom:1px solid #F1F5F9; background:#F8FAFC;">
          <td style="padding:7px 14px;">การสงเคราะห์กรณีอื่นๆ</td>
          <td style="padding:7px 14px; text-align:right;">ไม่เกิน 5,000 บาท</td>
        </tr>
        <tr style="border-bottom:1px solid #F1F5F9;">
          <td style="padding:7px 14px;">กิจกรรมสาธารณะประโยชน์ และการสังคม</td>
          <td style="padding:7px 14px; text-align:right;">ไม่เกิน 5,000 บาท/ครั้ง</td>
        </tr>
      </tbody>
    </table>

    <p>การใช้จ่ายเงินนอกเหนือจากนี้ ให้คณะกรรมการนโยบายเป็นผู้พิจารณา</p>
    <p>เงินของชมรมฯ ห้ามไม่ให้ใช้หมด ให้คงเหลือไว้ไม่น้อยกว่าร้อยละ 25 ของจำนวนเงินที่ได้รับมอบ</p>

    <p style="font-size:12px; color:#94A3B8; text-align:right; margin-top:16px;">ปรับปรุง 25 พ.ย. 2563</p>
  </div>
</div>
@endsection
