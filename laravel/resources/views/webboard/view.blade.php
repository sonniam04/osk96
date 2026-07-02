@extends('layouts.app')
@section('title', $question->question_title)

@section('content')
@php
  $legacyUrl = env('OSK_LEGACY_URL', '');
  $thMon = ['','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
  function thDate($dt, $mon) {
    try {
      $d = \Carbon\Carbon::parse($dt);
      return $d->format('d').' '.$mon[(int)$d->format('m')].' '.substr($d->year+543, 2)
             .' '.$d->format('H:i');
    } catch (\Exception $e) { return $dt ?? ''; }
  }
@endphp

<div class="card">
  <div class="section-title">
    <span>กระดานสนทนา</span>
    <a href="javascript:history.back()">← กลับ</a>
  </div>

  <div style="padding:14px 16px;">

    {{-- ── กระทู้หลัก ── --}}
    <div style="border:1px solid #DCEEF8; border-radius:6px; overflow:hidden; margin-bottom:16px;">
      <div style="background:#EBF4FB; padding:8px 14px; border-bottom:1px solid #DCEEF8;">
        <span style="font-weight:700; color:#003366; font-size:14px;">
          {{ $question->question_title }}
        </span>
        <span style="font-size:11px; color:#94A3B8; margin-left:8px;">[No. {{ $question->question_id }}]</span>
      </div>
      <div style="padding:12px 14px; font-size:13px; color:#1E293B; line-height:1.7;">
        {!! nl2br(e($question->question_detail)) !!}

        @if(!empty($question->question_file))
        <div style="margin-top:10px; text-align:center;">
          <img src="{{ $legacyUrl }}/uploads/{{ $question->question_file }}"
               style="max-width:100%; border-radius:4px;"
               onerror="this.style.display='none'">
        </div>
        @endif

        @if(!empty($question->question_vdo))
        <div style="margin-top:10px; text-align:center;">
          <video controls style="max-width:100%;">
            <source src="{{ $legacyUrl }}/vdo/{{ $question->question_vdo }}" type="video/mp4">
          </video>
        </div>
        @endif
      </div>
      <div style="padding:6px 14px 10px; font-size:11px; color:#64748B; border-top:1px solid #F1F5F9;">
        <strong>By: {{ $question->question_name }}</strong>
        &bull; อ่าน {{ $question->question_view }} &bull; ตอบ {{ $question->question_post }}
        &bull; {{ thDate($question->question_date, $thMon) }}
      </div>
    </div>

    {{-- ── ความคิดเห็น ── --}}
    @forelse($answers as $i => $ans)
    <div style="border:1px solid #F0ABFC; border-radius:6px; overflow:hidden; margin-bottom:10px;">
      <div style="background:#FDF5FF; padding:6px 14px; border-bottom:1px solid #F0ABFC;">
        <span style="font-size:12px; color:#A21CAF; font-weight:700;">ความคิดเห็นที่ {{ $i + 1 }}</span>
      </div>
      <div style="padding:10px 14px; font-size:13px; color:#1E293B; line-height:1.7;">
        {!! $ans->ans_detail !!}

        @if(!empty($ans->ans_file))
        <div style="margin-top:8px; text-align:center;">
          <img src="{{ $legacyUrl }}/uploads/{{ $ans->ans_file }}"
               style="max-width:100%; border-radius:4px;"
               onerror="this.style.display='none'">
        </div>
        @elseif(isset($answerFiles[$ans->ans_id]))
          @foreach($answerFiles[$ans->ans_id] as $af)
          <div style="margin-top:8px; text-align:center;">
            <img src="{{ $legacyUrl }}/uploads/{{ $af->file }}"
                 style="max-width:100%; border-radius:4px;"
                 onerror="this.style.display='none'">
          </div>
          @endforeach
        @endif
      </div>
      <div style="padding:4px 14px 8px; font-size:11px; color:#64748B; border-top:1px solid #FDF5FF;">
        <strong>By: {{ $ans->ans_name }}</strong>
        &bull; {{ thDate($ans->ans_date, $thMon) }}
      </div>
    </div>
    @empty
    <p style="text-align:center; color:#94A3B8; font-size:13px; padding:10px 0;">ยังไม่มีความคิดเห็น</p>
    @endforelse

    {{-- ── ฟอร์มเสนอความคิดเห็น ── --}}
    @if(session('replied'))
    <div style="background:#DCFCE7; border:1px solid #86EFAC; border-radius:6px; padding:10px 14px;
                font-size:13px; color:#166534; margin-bottom:12px;">
      บันทึกความคิดเห็นเรียบร้อยแล้ว
    </div>
    @endif

    @if(session('user'))
    <div style="border:1px solid #DCEEF8; border-radius:6px; overflow:hidden; margin-top:6px;">
      <div style="background:#EBF4FB; padding:8px 14px; border-bottom:1px solid #DCEEF8;">
        <span style="font-weight:700; color:#003366; font-size:13px;">เสนอความคิดเห็น</span>
      </div>
      <div style="padding:12px 14px;">

        @if($errors->any())
        <div style="background:#FEE2E2; border:1px solid #FCA5A5; border-radius:4px;
                    padding:8px 12px; margin-bottom:10px; font-size:13px; color:#B91C1C;">
          @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
        </div>
        @endif

        <form action="{{ route('webboard.reply', $question->question_id) }}" method="POST"
              enctype="multipart/form-data">
          @csrf

          <div style="margin-bottom:10px;">
            <label style="font-size:13px; color:#374151; display:block; margin-bottom:4px;">
              ชื่อ
            </label>
            <input type="text" value="{{ session('user')['name'] }}" readonly
                   style="width:100%; box-sizing:border-box; border:1px solid #D1D5DB; border-radius:4px;
                          padding:6px 10px; font-size:13px; background:#F3F4F6; color:#6B7280;">
          </div>

          <div style="margin-bottom:10px;">
            <label style="font-size:13px; color:#374151; display:block; margin-bottom:4px;">
              รายละเอียด <span style="color:#DC2626;">*</span>
            </label>
            <textarea name="post_detail" rows="6"
                      style="width:100%; box-sizing:border-box; border:1px solid #D1D5DB; border-radius:4px;
                             padding:6px 10px; font-size:13px; resize:vertical;"
                      required>{{ old('post_detail') }}</textarea>
          </div>

          <div style="margin-bottom:14px;">
            <label style="font-size:13px; color:#374151; display:block; margin-bottom:4px;">
              รูปภาพ (jpg/gif ไม่เกิน 500KB)
            </label>
            <input type="file" name="post_file" accept=".jpg,.jpeg,.gif"
                   style="font-size:13px;">
          </div>

          <div style="text-align:center;">
            <button type="submit"
                    style="background:#38B8F5; color:#fff; border:none; border-radius:5px;
                           padding:8px 32px; font-size:13px; font-weight:600; cursor:pointer;">
              บันทึก
            </button>
          </div>
        </form>
      </div>
    </div>
    @else
    <div style="text-align:center; padding:14px; font-size:13px; color:#64748B;
                border:1px dashed #DCEEF8; border-radius:6px; margin-top:6px;">
      <a href="#" onclick="document.getElementById('login-modal').style.display='flex';return false;"
         style="color:#38B8F5; font-weight:600;">เข้าสู่ระบบ</a>
      เพื่อเสนอความคิดเห็น
    </div>
    @endif

  </div>
</div>
@endsection
