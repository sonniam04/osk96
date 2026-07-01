@extends('layouts.app')
@section('title', 'วิสัยทัศน์ คำนิยม ยุทธศาสตร์ — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')
<div class="card">
  <div class="section-title">
    <span>วิสัยทัศน์ คำนิยม ยุทธศาสตร์</span>
    <a href="{{ route('home') }}">← กลับหน้าแรก</a>
  </div>

  <div style="padding:16px 20px; font-size:13.5px; line-height:1.8; color:#1E293B;">

    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 12px;">วิสัยทัศน์</h3>
    <p style="text-align:center; font-size:15px; font-weight:700; color:#003366; margin-bottom:20px;">
      เสริมสร้างความสัมพันธ์ มุ่งมั่นมิตรไมตรี ตามวิถีสวนกุหลาบ
    </p>

    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 12px;">พันธกิจ</h3>
    <ol style="margin:0 0 20px 20px; padding:0;">
      <li style="margin-bottom:6px;">สร้างความสัมพันธ์ระหว่างเพื่อนร่วมรุ่น และร่วมโรงเรียนสวนกุหลาบวิทยาลัย</li>
      <li style="margin-bottom:6px;">ช่วยเหลือเกื้อกูลซึ่งกันและกันภายในศิษย์เก่าสวนกุหลาบวิทยาลัย</li>
      <li style="margin-bottom:6px;">แจ้งข่าวสารของเพื่อนร่วมรุ่น และร่วมโรงเรียนสวนกุหลาบวิทยาลัย</li>
      <li style="margin-bottom:6px;">ประกอบกิจกรรมที่เป็นประโยชน์ต่อสังคม และโรงเรียนสวนกุหลาบวิทยาลัย</li>
    </ol>

    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 12px;">ค่านิยมและวัฒนธรรมองค์กร</h3>
    <p style="text-align:center; font-size:18px; font-weight:700; color:#308EC4; margin-bottom:20px;">" เราไม่ทิ้งกัน "</p>

    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 12px;">ยุทธศาสตร์</h3>
    <ol style="margin:0 0 20px 20px; padding:0;">
      <li style="margin-bottom:6px;">จัดให้มีกิจกรรมเสริมสร้างความสัมพันธ์ระหว่างเพื่อนในรุ่น อย่างสม่ำเสมอ</li>
      <li style="margin-bottom:6px;">เสริมสร้างความสัมพันธ์ กับเพื่อน พี่ น้อง ศิษย์โรงเรียนสวนกุหลาบวิทยาลัย</li>
      <li style="margin-bottom:6px;">จัดหารายได้ เพื่อเป็นเงินทุนสำหรับดำเนินกิจกรรมของชมรมฯ</li>
      <li style="margin-bottom:6px;">จัดทำทำเนียบรุ่น ให้ถูกต้อง ครบถ้วน และเป็นปัจจุบัน สามารถใช้ประโยชน์ได้</li>
      <li style="margin-bottom:6px;">จัดทำเว็บไซด์ที่มีประสิทธิภาพ เพื่อเป็นสื่อกลาง ติดต่อ เผยแพร่ข้อมูลข่าวสาร</li>
      <li style="margin-bottom:6px;">จัดให้มีการดำเนินกิจกรรมสาธารณะประโยชน์</li>
      <li style="margin-bottom:6px;">จัดให้มีการช่วยเหลือการจัดกิจกรรมที่เกี่ยวข้องกับโรงเรียนสวนกุหลาบวิทยาลัย</li>
    </ol>

    <h3 style="background:#EBF4FB; padding:8px 14px; border-left:4px solid #308EC4; font-size:14px; color:#003366; margin:0 0 12px;">เป้าประสงค์</h3>
    <ol style="margin:0 0 20px 20px; padding:0;">
      <li style="margin-bottom:6px;">มีกิจกรรมพบปะสังสรรค์ เป็นประจำทุกเดือน และมีกิจกรรมที่สำคัญ อย่างน้อยปีละครั้ง</li>
      <li style="margin-bottom:6px;">ชมรมฯ ต้องเป็นที่รู้จักของ ศิษย์สวนกุหลาบวิทยาลัย ทุกรุ่น โดยมีเครือข่ายเชื่อมโยง</li>
      <li style="margin-bottom:6px;">ชมรมฯ มีเงินทุนดำเนินการไม่น้อยกว่า 300,000 บาท</li>
      <li style="margin-bottom:6px;">จัดทำทำเนียบรุ่นถูกต้องครบถ้วน แจกจ่ายให้เพื่อนสมาชิกทุกปี และสามารถค้นหาจากเว็บไซด์</li>
      <li style="margin-bottom:6px;">มีเว็บไซด์ที่มีประสิทธิภาพ และเป็นปัจจุบัน</li>
      <li style="margin-bottom:6px;">จัดให้มีการบริจาคโลหิตเพื่อการกุศล อย่างน้อยปีละ 1 ครั้ง</li>
      <li style="margin-bottom:6px;">จัดให้มีการทำบุญ หรือบริจาคทรัพย์สินและสิ่งของ เพื่อการกุศล อย่างน้อยปีละ 1 ครั้ง</li>
      <li style="margin-bottom:6px;">สนับสนุนการจัดกิจกรรมงานครบรอบจัดตั้งโรงเรียนสวนกุหลาบวิทยาลัย ทุกวันที่ 8 มีนาคม</li>
      <li style="margin-bottom:6px;">สนับสนุนการจัดงานวันสมานมิตร ของโรงเรียนสวนกุหลาบวิทยาลัย ทุกครั้ง</li>
    </ol>

    <p style="font-size:12px; color:#94A3B8; text-align:right;">ปรับปรุง 25 พ.ย. 2563</p>
  </div>
</div>
@endsection
