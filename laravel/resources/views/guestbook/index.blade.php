@extends('layouts.app')
@section('title', 'สมุดเยี่ยม — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')

{{-- ฟอร์มลงชื่อ --}}
<div class="card" style="margin-bottom:16px;">
  <div class="section-title"><span>GUESTBOOK — สมุดเยี่ยม</span></div>

  <div style="padding:16px 20px;">
    <p style="font-size:13px; color:#4B5563; margin-bottom:16px; text-align:center;">
      กรุณาให้เกียรติลงนามในสมุดเยี่ยมชมของเราด้วยครับ
    </p>

    @if(session('success'))
    <div style="background:#DCFCE7; border:1px solid #86EFAC; border-radius:6px; padding:10px 14px;
                color:#166534; font-size:13px; margin-bottom:16px;">
      {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div style="background:#FEE2E2; border:1px solid #FCA5A5; border-radius:6px; padding:10px 14px;
                color:#991B1B; font-size:13px; margin-bottom:16px;">
      @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
    </div>
    @endif

    <form method="POST" action="{{ route('guestbook.store') }}" enctype="multipart/form-data">
      @csrf
      <table style="width:100%; border-collapse:collapse; font-size:13px;">
        <tr style="background:#EBF4FB;">
          <td style="padding:8px 14px; width:140px; font-weight:600; color:#003366;">ชื่อ *</td>
          <td style="padding:8px 14px;">
            <input type="text" name="name" value="{{ old('name') }}" maxlength="50"
                   style="width:100%; max-width:360px; border:1px solid #DCEEF8; border-radius:4px;
                          padding:5px 10px; font-size:13px; font-family:'Sarabun',sans-serif;">
          </td>
        </tr>
        <tr>
          <td style="padding:8px 14px; font-weight:600; color:#003366;">ประเทศ</td>
          <td style="padding:8px 14px;">
            <select name="country"
                    style="border:1px solid #DCEEF8; border-radius:4px; padding:5px 10px;
                           font-size:13px; font-family:'Sarabun',sans-serif;">
              <option value="Thailand" selected>Thailand</option>
              <option value="Australia">Australia</option>
              <option value="Canada">Canada</option>
              <option value="China">China</option>
              <option value="France">France</option>
              <option value="Germany">Germany</option>
              <option value="Japan">Japan</option>
              <option value="Singapore">Singapore</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
              <option value="Other">Other</option>
            </select>
          </td>
        </tr>
        <tr style="background:#EBF4FB;">
          <td style="padding:8px 14px; font-weight:600; color:#003366;">Email</td>
          <td style="padding:8px 14px;">
            <input type="text" name="email" value="{{ old('email') }}" maxlength="50"
                   style="width:100%; max-width:360px; border:1px solid #DCEEF8; border-radius:4px;
                          padding:5px 10px; font-size:13px; font-family:'Sarabun',sans-serif;">
          </td>
        </tr>
        <tr>
          <td style="padding:8px 14px; font-weight:600; color:#003366;">Website</td>
          <td style="padding:8px 14px;">
            <input type="text" name="website" value="{{ old('website', 'http://') }}" maxlength="50"
                   style="width:100%; max-width:360px; border:1px solid #DCEEF8; border-radius:4px;
                          padding:5px 10px; font-size:13px; font-family:'Sarabun',sans-serif;">
          </td>
        </tr>
        <tr style="background:#EBF4FB;">
          <td style="padding:8px 14px; font-weight:600; color:#003366;">Rating</td>
          <td style="padding:8px 14px;">
            <select name="rating"
                    style="border:1px solid #DCEEF8; border-radius:4px; padding:5px 10px;
                           font-size:13px; font-family:'Sarabun',sans-serif;">
              <option value="0">No Rating</option>
              <option value="5">★★★★★ 5 Stars</option>
              <option value="4">★★★★ 4 Stars</option>
              <option value="3">★★★ 3 Stars</option>
              <option value="2">★★ 2 Stars</option>
              <option value="1">★ 1 Star</option>
            </select>
          </td>
        </tr>
        <tr>
          <td style="padding:8px 14px; font-weight:600; color:#003366; vertical-align:top; padding-top:12px;">
            ข้อความ *
          </td>
          <td style="padding:8px 14px;">
            <textarea name="message" rows="4" cols="45"
                      style="width:100%; max-width:480px; border:1px solid #DCEEF8; border-radius:4px;
                             padding:5px 10px; font-size:13px; font-family:'Sarabun',sans-serif;
                             resize:vertical;">{{ old('message') }}</textarea>
          </td>
        </tr>
        <tr style="background:#EBF4FB;">
          <td style="padding:8px 14px; font-weight:600; color:#003366;">รูป Banner</td>
          <td style="padding:8px 14px;">
            <input type="file" name="image" accept="image/*"
                   style="font-size:13px; font-family:'Sarabun',sans-serif;">
            <div style="font-size:11px; color:#94A3B8; margin-top:4px;">jpg, png ขนาดไม่เกิน 1MB</div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="padding:10px 14px;">
            <button type="submit"
                    style="background:#308EC4; color:#fff; border:none; border-radius:6px;
                           padding:8px 24px; font-size:13px; font-family:'Sarabun',sans-serif;
                           cursor:pointer; font-weight:600;">
              ลงนามในสมุดเยี่ยม
            </button>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>

{{-- รายการสมุดเยี่ยม --}}
<div class="card">
  <div class="section-title"><span>รายการลงนาม ({{ $entries->total() }} รายการ)</span></div>

  <div style="padding:8px 0;">
    @forelse($entries as $e)
    @php
      $stars = $e->rating > 0 ? str_repeat('★', $e->rating).str_repeat('☆', 5-$e->rating) : '';
      $mm = ['','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
      $d = \Carbon\Carbon::parse($e->submitdate);
      $dateStr = $d->format('d').' '.$mm[(int)$d->format('m')].' '.($d->year+543);
    @endphp
    <div style="padding:12px 20px; border-bottom:1px solid #F1F5F9;">
      <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
        <span style="font-weight:700; color:#003366; font-size:14px;">{{ $e->name }}</span>
        <span style="font-size:12px; color:#94A3B8;">{{ $dateStr }}</span>
      </div>
      <div style="font-size:12px; color:#64748B; margin-bottom:6px;">
        {{ $e->country }}
        @if($stars)
          &nbsp;|&nbsp;<span style="color:#F59E0B;">{{ $stars }}</span>
        @endif
      </div>
      <div style="display:flex; gap:12px; align-items:flex-start;">
        @if(!empty($e->image))
        @php
          $imgSrc = file_exists(public_path('uploads/'.$e->image))
            ? asset('uploads/'.$e->image)
            : env('OSK_LEGACY_URL').'/uploads/'.$e->image;
        @endphp
        <img src="{{ $imgSrc }}" width="100"
             style="flex-shrink:0; border:1px solid #DCEEF8; border-radius:4px;"
             onerror="this.style.display='none'">
        @endif
        <div style="font-size:13px; color:#374151; line-height:1.7; white-space:pre-wrap;">{{ $e->message }}</div>
      </div>
    </div>
    @empty
    <div style="padding:32px; text-align:center; color:#94A3B8;">ยังไม่มีรายการในสมุดเยี่ยม</div>
    @endforelse
  </div>

  {{-- Pagination --}}
  @if($entries->lastPage() > 1)
  <div style="padding:12px 16px; display:flex; justify-content:center; gap:6px; flex-wrap:wrap; border-top:1px solid #EBF4FB;">
    @if($entries->onFirstPage())
      <span style="padding:4px 10px; border-radius:4px; font-size:13px; color:#94A3B8;">&laquo;</span>
    @else
      <a href="{{ $entries->previousPageUrl() }}"
         style="padding:4px 10px; border-radius:4px; font-size:13px; background:#EBF4FB; color:#308EC4; text-decoration:none;">&laquo;</a>
    @endif

    @foreach($entries->getUrlRange(1, $entries->lastPage()) as $page => $url)
      @if($page == $entries->currentPage())
        <span style="padding:4px 10px; border-radius:4px; font-size:13px; background:#308EC4; color:#fff; font-weight:700;">{{ $page }}</span>
      @else
        <a href="{{ $url }}"
           style="padding:4px 10px; border-radius:4px; font-size:13px; background:#EBF4FB; color:#308EC4; text-decoration:none;">{{ $page }}</a>
      @endif
    @endforeach

    @if($entries->hasMorePages())
      <a href="{{ $entries->nextPageUrl() }}"
         style="padding:4px 10px; border-radius:4px; font-size:13px; background:#EBF4FB; color:#308EC4; text-decoration:none;">&raquo;</a>
    @else
      <span style="padding:4px 10px; border-radius:4px; font-size:13px; color:#94A3B8;">&raquo;</span>
    @endif
  </div>
  @endif

</div>

@endsection
