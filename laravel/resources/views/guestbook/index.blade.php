@extends('layouts.app')
@section('title', 'สมุดเยี่ยม — OSK96')

@section('content')

{{-- Write form --}}
<div class="card" style="overflow:hidden;">
  <div class="section-title">เขียนสมุดเยี่ยม</div>
  <div style="padding:16px;">
    @if(session('success'))
      <div style="background:#ECFDF5; border:1px solid #6EE7B7; color:#065F46;
                  padding:10px 14px; border-radius:6px; margin-bottom:12px; font-size:13px;">
        {{ session('success') }}
      </div>
    @endif
    <form method="POST" action="{{ route('guestbook.store') }}">
      @csrf
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-bottom:10px;">
        <div>
          <label style="font-size:12px; color:#003366; font-weight:600; display:block; margin-bottom:3px;">ชื่อ *</label>
          <input type="text" name="name" required value="{{ old('name') }}"
                 style="width:100%; border:1px solid #DCEEF8; border-radius:6px;
                        padding:7px 10px; font-family:'Sarabun',sans-serif; font-size:13px; box-sizing:border-box;">
        </div>
        <div>
          <label style="font-size:12px; color:#003366; font-weight:600; display:block; margin-bottom:3px;">ประเทศ</label>
          <input type="text" name="country" value="{{ old('country','ไทย') }}"
                 style="width:100%; border:1px solid #DCEEF8; border-radius:6px;
                        padding:7px 10px; font-family:'Sarabun',sans-serif; font-size:13px; box-sizing:border-box;">
        </div>
      </div>
      <div style="margin-bottom:10px;">
        <label style="font-size:12px; color:#003366; font-weight:600; display:block; margin-bottom:3px;">ข้อความ *</label>
        <textarea name="detail" required rows="3"
                  style="width:100%; border:1px solid #DCEEF8; border-radius:6px;
                         padding:7px 10px; font-family:'Sarabun',sans-serif; font-size:13px;
                         resize:vertical; box-sizing:border-box;">{{ old('detail') }}</textarea>
      </div>
      <button type="submit"
              style="background:#308EC4; color:#fff; border:none; border-radius:6px;
                     padding:8px 20px; font-family:'Sarabun',sans-serif; font-size:13px;
                     font-weight:600; cursor:pointer;">
        บันทึก
      </button>
    </form>
  </div>
</div>

{{-- Entries --}}
<div class="card" style="overflow:hidden;">
  <div class="section-title">
    <span>สมุดเยี่ยม</span>
    <span style="font-size:12px; opacity:.8;">{{ $entries->total() }} รายการ</span>
  </div>
  <div style="padding:16px; display:flex; flex-direction:column; gap:10px;">
    @forelse($entries as $e)
    <div style="border:1px solid #DCEEF8; border-radius:8px; padding:12px 14px; background:#FAFEFF;">
      <div style="display:flex; justify-content:space-between; align-items:baseline; margin-bottom:6px;">
        <span style="font-weight:700; font-size:13px; color:#003366;">{{ $e->name }}</span>
        <span style="font-size:11px; color:#94A3B8;">
          {{ $e->country ?? '' }}
          @if(!empty($e->submitdate))
            &bull; {{ \Carbon\Carbon::parse($e->submitdate)->locale('th')->isoFormat('D MMM BB') }}
          @endif
        </span>
      </div>
      <div style="font-size:13px; color:#374151; line-height:1.7; white-space:pre-wrap;">{{ $e->detail }}</div>
    </div>
    @empty
    <p style="text-align:center; color:#94A3B8; padding:30px 0;">ยังไม่มีข้อความ</p>
    @endforelse

    {{-- Pagination --}}
    @if($entries->lastPage() > 1)
    <div style="display:flex; justify-content:center; gap:6px; margin-top:8px; font-size:13px;">
      @if(!$entries->onFirstPage())
        <a href="{{ $entries->previousPageUrl() }}"
           style="padding:4px 10px; border:1px solid #DCEEF8; border-radius:4px;
                  color:#308EC4; text-decoration:none;">&laquo;</a>
      @endif
      <span style="padding:4px 12px; background:#308EC4; color:#fff; border-radius:4px;">
        {{ $entries->currentPage() }} / {{ $entries->lastPage() }}
      </span>
      @if($entries->hasMorePages())
        <a href="{{ $entries->nextPageUrl() }}"
           style="padding:4px 10px; border:1px solid #DCEEF8; border-radius:4px;
                  color:#308EC4; text-decoration:none;">&raquo;</a>
      @endif
    </div>
    @endif
  </div>
</div>

@endsection
