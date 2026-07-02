@extends('layouts.app')
@section('title', 'แก้ไขข้อมูลส่วนตัว')

@section('content')
<div class="card">
  <div class="section-title">
    <span>แก้ไขข้อมูลในระบบฐานข้อมูล</span>
    <a href="{{ route('profile') }}">← กลับหน้าทะเบียน</a>
  </div>

  <div style="padding:16px 20px;">

    @if($errors->any())
    <div style="background:#FEE2E2; border:1px solid #FCA5A5; border-radius:4px; padding:10px 14px; margin-bottom:12px; font-size:13px; color:#B91C1C;">
      @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
    </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
          onsubmit="return checkForm(this);">
      @csrf

      @php
        $lbl = 'width:130px; flex-shrink:0; padding:6px 10px; color:#CC00CC; font-weight:600; font-size:13px; align-self:flex-start; padding-top:8px;';
        $val = 'padding:4px 10px; flex:1;';
        $inp = 'font-size:13px; border:1px solid #D1D5DB; border-radius:4px; padding:5px 8px; width:100%; box-sizing:border-box;';
        $row = 'display:flex; border-bottom:1px solid #FCEEF9; align-items:center;';
      @endphp

      {{-- รูปปัจจุบัน + อัปโหลดใหม่ --}}
      <div style="display:flex; gap:20px; margin-bottom:14px; align-items:flex-start;">
        @php
          $img = $member->fname ?? '';
          $imgSrc = $img
            ? (file_exists(public_path('uploads/member/'.$img))
                ? asset('uploads/member/'.$img)
                : env('OSK_LEGACY_URL').'/uploads/member/'.$img)
            : null;
        @endphp
        <div style="flex-shrink:0; text-align:center;">
          @if($imgSrc)
            <img src="{{ $imgSrc }}" style="width:95px; height:125px; object-fit:cover; object-position:top;
                 border:2px solid #DCEEF8; border-radius:4px;" onerror="this.style.display='none'">
          @else
            <div style="width:95px; height:125px; background:#EBF4FB; border:2px solid #DCEEF8; border-radius:4px;
                        display:flex; align-items:center; justify-content:center; color:#94A3B8; font-size:11px;">ไม่มีรูป</div>
          @endif
          <div style="font-size:11px; color:#94A3B8; margin-top:4px;">รูปปัจจุบัน</div>
        </div>
        <div style="flex:1;">
          <div style="font-size:13px; color:#374151; margin-bottom:6px;">เปลี่ยนภาพถ่าย (นามสกุล jpg เท่านั้น ไม่เกิน 2MB)</div>
          <input type="file" name="fname" accept=".jpg,.jpeg" style="font-size:13px;">
        </div>
      </div>

      {{-- username (readonly) + password --}}
      <div style="{{ $row }} background:#FDF5FF;">
        <div style="{{ $lbl }}">Username</div>
        <div style="{{ $val }} display:flex; gap:10px; flex-wrap:wrap;">
          <input type="text" value="{{ $member->username }}" readonly
                 style="{{ $inp }} width:120px; background:#F3F4F6; color:#6B7280;">
          <span style="padding-top:7px; font-size:13px; color:#374151;">Password ใหม่</span>
          <input type="text" name="password" id="password" placeholder="เว้นว่างถ้าไม่เปลี่ยน"
                 style="{{ $inp }} width:150px;">
          <span style="padding-top:7px; font-size:13px; color:#374151;">ยืนยัน</span>
          <input type="text" name="password2" id="password2" placeholder="พิมพ์ซ้ำ"
                 style="{{ $inp }} width:150px;">
        </div>
      </div>

      {{-- สรรพนาม --}}
      <div style="{{ $row }}">
        <div style="{{ $lbl }}">สรรพนาม</div>
        <div style="{{ $val }}">
          <input type="text" name="title" value="{{ old('title', $member->title) }}"
                 style="{{ $inp }} width:120px;">
        </div>
      </div>

      {{-- ชื่อ / นามสกุล --}}
      <div style="{{ $row }} background:#FDF5FF;">
        <div style="{{ $lbl }}">ชื่อ</div>
        <div style="{{ $val }} display:flex; gap:10px; flex-wrap:wrap;">
          <input type="text" name="name" value="{{ old('name', $member->name) }}"
                 style="{{ $inp }} width:180px;" required>
          <span style="padding-top:7px; font-size:13px; color:#374151;">นามสกุล</span>
          <input type="text" name="surname" value="{{ old('surname', $member->surname) }}"
                 style="{{ $inp }} width:180px;" required>
        </div>
      </div>

      {{-- สถานะ / ภารกิจ --}}
      <div style="{{ $row }}">
        <div style="{{ $lbl }}">สถานะ/อาชีพ</div>
        <div style="{{ $val }} display:flex; gap:10px; flex-wrap:wrap;">
          <input type="text" name="status" value="{{ old('status', $member->status) }}"
                 style="{{ $inp }} width:120px;">
          <span style="padding-top:7px; font-size:13px; color:#374151;">ภารกิจหน้าที่</span>
          <input type="text" name="work" value="{{ old('work', $member->work) }}"
                 style="{{ $inp }} flex:1; min-width:180px;">
        </div>
      </div>

      {{-- อีเมล์ / มือถือ --}}
      <div style="{{ $row }} background:#FDF5FF;">
        <div style="{{ $lbl }}">อีเมล์</div>
        <div style="{{ $val }} display:flex; gap:10px; flex-wrap:wrap;">
          <input type="email" name="e_mail" value="{{ old('e_mail', $member->e_mail) }}"
                 style="{{ $inp }} flex:1; min-width:180px;">
          <span style="padding-top:7px; font-size:13px; color:#374151;">มือถือ</span>
          <input type="text" name="tel_h" value="{{ old('tel_h', $member->tel_h) }}"
                 style="{{ $inp }} width:150px;">
        </div>
      </div>

      {{-- ที่อยู่ --}}
      <div style="{{ $row }}">
        <div style="{{ $lbl }}">ที่อยู่</div>
        <div style="{{ $val }}">
          <textarea name="addr1_tambom" rows="3"
                    style="{{ $inp }} resize:vertical;">{{ old('addr1_tambom', $member->addr1_tambom) }}</textarea>
        </div>
      </div>
      <div style="{{ $row }} background:#FDF5FF;">
        <div style="{{ $lbl }}">อำเภอ/เขต</div>
        <div style="{{ $val }} display:flex; gap:10px; flex-wrap:wrap;">
          <input type="text" name="addr2_amphur" value="{{ old('addr2_amphur', $member->addr2_amphur) }}"
                 style="{{ $inp }} flex:1; min-width:150px;">
          <span style="padding-top:7px; font-size:13px; color:#374151;">จังหวัด</span>
          <input type="text" name="addr3_province" value="{{ old('addr3_province', $member->addr3_province) }}"
                 style="{{ $inp }} width:130px;">
          <span style="padding-top:7px; font-size:13px; color:#374151;">รหัสไปรษณีย์</span>
          <input type="text" name="postal_code" value="{{ old('postal_code', $member->postal_code) }}"
                 style="{{ $inp }} width:70px;">
        </div>
      </div>
      <div style="{{ $row }}">
        <div style="{{ $lbl }}">โทรศัพท์บ้าน</div>
        <div style="{{ $val }}">
          <input type="text" name="telephone" value="{{ old('telephone', $member->telephone) }}"
                 style="{{ $inp }} width:160px;">
        </div>
      </div>

      {{-- separator --}}
      <div style="border-top:1px solid #F0ABFC; margin:8px 0; text-align:center; font-size:12px; color:#A21CAF; padding:4px;">
        ที่อยู่ที่ทำงาน / ที่อยู่ต่างประเทศ
      </div>

      <div style="{{ $row }} background:#FDF5FF;">
        <div style="{{ $lbl }}">ที่อยู่ 2/ทำงาน</div>
        <div style="{{ $val }}">
          <textarea name="off" rows="3"
                    style="{{ $inp }} resize:vertical;">{{ old('off', $member->off) }}</textarea>
        </div>
      </div>
      <div style="{{ $row }}">
        <div style="{{ $lbl }}">อำเภอ/เขต</div>
        <div style="{{ $val }} display:flex; gap:10px; flex-wrap:wrap;">
          <input type="text" name="off_amphur" value="{{ old('off_amphur', $member->off_amphur) }}"
                 style="{{ $inp }} flex:1; min-width:150px;">
          <span style="padding-top:7px; font-size:13px; color:#374151;">จังหวัด</span>
          <input type="text" name="off_province" value="{{ old('off_province', $member->off_province) }}"
                 style="{{ $inp }} width:130px;">
          <span style="padding-top:7px; font-size:13px; color:#374151;">รหัสไปรษณีย์</span>
          <input type="text" name="off_post" value="{{ old('off_post', $member->off_post) }}"
                 style="{{ $inp }} width:70px;">
        </div>
      </div>
      <div style="{{ $row }} background:#FDF5FF;">
        <div style="{{ $lbl }}">โทรศัพท์ทำงาน</div>
        <div style="{{ $val }}">
          <input type="text" name="off_tel" value="{{ old('off_tel', $member->off_tel) }}"
                 style="{{ $inp }} width:160px;">
        </div>
      </div>

      {{-- separator --}}
      <div style="border-top:1px solid #F0ABFC; margin:8px 0;"></div>

      {{-- งานอดิเรก / ขนาดเสื้อ --}}
      <div style="{{ $row }}">
        <div style="{{ $lbl }}">งานอดิเรก</div>
        <div style="{{ $val }}">
          <input type="text" name="sport" value="{{ old('sport', $member->sport) }}"
                 style="{{ $inp }}">
        </div>
      </div>
      <div style="{{ $row }} background:#FDF5FF;">
        <div style="{{ $lbl }}">ขนาดเสื้อ</div>
        <div style="{{ $val }}">
          <input type="text" name="size" value="{{ old('size', $member->size) }}"
                 style="{{ $inp }} width:60px;" maxlength="4">
        </div>
      </div>

      {{-- ร่วมงานเลี้ยง --}}
      <div style="{{ $row }}">
        <div style="{{ $lbl }}">ร่วมงานเลี้ยง</div>
        <div style="{{ $val }} display:flex; gap:6px; flex-wrap:wrap; align-items:center;">
          @foreach([65,66,67,68,69,70,71] as $yr)
          <span style="font-size:13px; color:#374151;">{{ $yr }}</span>
          <input type="text" name="act_{{ $yr }}" value="{{ old('act_'.$yr, $member->{'act_'.$yr}) }}"
                 style="border:1px solid #D1D5DB; border-radius:4px; padding:4px; width:28px; font-size:13px; text-align:center;">
          @endforeach
          <span style="font-size:11px; color:#6B7280; margin-left:4px;">(N-ไม่มา, N/A-ยังไม่จัด)</span>
        </div>
      </div>

      {{-- Facebook / Line --}}
      <div style="{{ $row }} background:#FDF5FF;">
        <div style="{{ $lbl }}">Facebook</div>
        <div style="{{ $val }}">
          <input type="text" name="facebook" value="{{ old('facebook', $member->facebook) }}"
                 style="{{ $inp }}">
        </div>
      </div>
      <div style="{{ $row }}">
        <div style="{{ $lbl }}">Line ID</div>
        <div style="{{ $val }}">
          <input type="text" name="line_id" value="{{ old('line_id', $member->line_id) }}"
                 style="{{ $inp }}">
        </div>
      </div>
      <div style="{{ $row }} background:#FDF5FF;">
        <div style="{{ $lbl }}">บริจาคโลหิตครั้งสุดท้าย</div>
        <div style="{{ $val }}">
          <input type="text" name="last_donate" value="{{ old('last_donate', $member->last_donate) }}"
                 style="{{ $inp }}">
        </div>
      </div>

      {{-- ปุ่ม --}}
      <div style="margin-top:14px; display:flex; gap:8px; justify-content:center;">
        <button type="submit"
                style="background:#38B8F5; color:#fff; border:none; border-radius:5px;
                       padding:8px 28px; font-size:13px; font-weight:600; cursor:pointer;">
          บันทึกข้อมูล
        </button>
        <a href="{{ route('profile') }}"
           style="background:#E5E7EB; color:#374151; border-radius:5px;
                  padding:8px 20px; font-size:13px; font-weight:600; text-decoration:none;">
          กลับ
        </a>
      </div>

    </form>
  </div>
</div>

<script>
function checkForm(frm) {
  var p = frm.password.value;
  var p2 = frm.password2.value;
  if (p !== '' && p !== p2) {
    alert('รหัสผ่านทั้งสองช่องไม่ตรงกัน');
    return false;
  }
  return true;
}
</script>
@endsection
