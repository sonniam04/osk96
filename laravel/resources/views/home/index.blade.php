@extends('layouts.app')
@section('title', 'ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')

{{-- ── Section: Latest Posts ── --}}
<div class="card" style="overflow:hidden;">
  <div class="section-title">
    <span>ได้ข่าวว่า............</span>
    <a href="{{ route('webboard.index') }}?group_id=1">อื่นๆ &rsaquo;&rsaquo;</a>
  </div>
  <div style="padding:16px; display:flex; flex-direction:column; gap:14px;">
    @forelse($latestPosts as $post)
    <a href="{{ route('webboard.view', $post->question_id) }}" class="news-card">
      @if(!empty($post->question_file))
        <img src="{{ env('OSK_LEGACY_URL') }}/uploads/{{ $post->question_file }}" class="news-thumb" alt="">
      @else
        <div style="width:72px; height:72px; flex-shrink:0; display:flex;
                    align-items:center; justify-content:center; background:#fff;
                    border-radius:4px; border:1px solid #DCEEF8;">
          <img src="{{ asset('images/fallback.png') }}"
               style="width:64px; height:64px; object-fit:contain;" alt="">
        </div>
      @endif
      <div style="flex:1; min-width:0;">
        <div class="news-title">{{ $post->question_title }}</div>
        <div class="news-excerpt">
          {{ mb_substr(strip_tags($post->question_detail ?? ''), 0, 160) }}...
        </div>
        <div style="margin-top:8px; display:flex; gap:8px; align-items:center;">
          <span class="tag">{{ \Carbon\Carbon::parse($post->question_date)->locale('th')->isoFormat('D MMM YY') }}</span>
          <span style="font-size:12px; color:#94A3B8;">ตอบ {{ $post->question_post ?? 0 }} &bull; ดู {{ $post->question_view ?? 0 }}</span>
        </div>
      </div>
    </a>
    @empty
    <p class="text-gray-400 text-sm text-center py-4">ยังไม่มีโพสต์</p>
    @endforelse
  </div>
</div>

{{-- ── Section: Recent Topics ── --}}
<div class="card" style="overflow:hidden;">
  <div class="section-title">
    <span>แกงโฮะอร่อยทุกเรื่อง</span>
    <a href="{{ route('webboard.index') }}">อื่นๆ &rsaquo;&rsaquo;</a>
  </div>
  <div style="overflow-x:auto;">
    <table style="width:100%; border-collapse:collapse; font-size:12.5px;">
      <thead>
        <tr style="background:#EBF4FB; border-bottom:2px solid #308EC4;">
          <th style="padding:6px 14px; text-align:left; color:#003366; font-weight:700;">หัวข้อ</th>
          <th style="padding:6px 14px; text-align:center; color:#003366; font-weight:700; white-space:nowrap;">หมวด</th>
          <th style="padding:6px 14px; text-align:center; color:#003366; font-weight:700; white-space:nowrap;">วันเดือนปี</th>
        </tr>
      </thead>
      <tbody>
        @forelse($recentTopics as $topic)
        <tr style="border-bottom:1px solid #F1F5F9; transition:background .15s;"
            onmouseover="this.style.background='#EBF4FB'" onmouseout="this.style.background=''">
          <td style="padding:4px 14px;">
            <a href="{{ route('webboard.view', $topic->question_id) }}"
               style="color:#003366; text-decoration:none; font-weight:500; line-height:1.3; display:block;">
              {{ mb_substr($topic->question_title, 0, 60) }}...
            </a>
          </td>
          <td style="padding:4px 14px; text-align:center;">
            <a href="{{ route('webboard.index') }}?group_id={{ $topic->group_id }}&old_group_id={{ $topic->old_group_id }}"
               style="text-decoration:none;">
              <span class="tag">{{ mb_substr($topic->group_name, 0, 11) }}</span>
            </a>
          </td>
          <td style="padding:4px 14px; text-align:center; color:#64748B; white-space:nowrap;">
            @php
              $d = \Carbon\Carbon::parse($topic->question_date);
              $mm = ['','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
              echo $d->format('d').' '.$mm[(int)$d->format('m')].' '.substr($d->year+543, 2);
            @endphp
          </td>
        </tr>
        @empty
        <tr><td colspan="3" style="padding:20px; text-align:center; color:#94A3B8;">ยังไม่มีโพสต์</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

{{-- ── Section 2: Activity Slideshow (activity_ran) ── --}}
@if($activityPhotos->count())
@push('scripts-head')
<style>
.mcal-slide { display:none; }
.mcal-slide.active { display:block; }
.slide-dot { width:10px; height:10px; border-radius:50%; background:#ccc; display:inline-block; margin:0 3px; cursor:pointer; transition:background .3s; }
.slide-dot.active { background:#308EC4; }
</style>
@endpush
<div class="card" style="overflow:hidden;">
  <div style="position:relative; background:#000; border-radius:10px 10px 0 0; overflow:hidden;">
    @foreach($activityPhotos as $i => $pic)
    <div class="mcal-slide{{ $i === 0 ? ' active' : '' }}" data-slide="{{ $i }}">
      <img src="{{ env('OSK_LEGACY_URL') }}/activity_images/{{ $pic }}"
           style="width:100%; height:320px; object-fit:cover; display:block;" alt="">
    </div>
    @endforeach
  </div>
  <div style="text-align:center; padding:8px 0 10px; background:#fff;">
    @foreach($activityPhotos as $i => $pic)
    <span class="slide-dot{{ $i === 0 ? ' active' : '' }}" data-idx="{{ $i }}"></span>
    @endforeach
  </div>
</div>
<script>
(function(){
  var slides = document.querySelectorAll('.mcal-slide');
  var dots   = document.querySelectorAll('.slide-dot');
  var idx    = 0;
  function go(n) {
    slides[idx].classList.remove('active'); dots[idx].classList.remove('active');
    idx = (n + slides.length) % slides.length;
    slides[idx].classList.add('active');    dots[idx].classList.add('active');
  }
  dots.forEach(function(d){ d.addEventListener('click', function(){ go(+this.dataset.idx); }); });
  setInterval(function(){ go(idx+1); }, 3000);
})();
</script>
@endif

{{-- ── Section 3: ภาพเด็คลิปโดน (blog_vdo / group_id=6) ── --}}
@if($photoClips->count())
<div class="card" style="overflow:hidden;">
  <div class="section-title">
    <span>ภาพเด็ดคลิปโดน</span>
    <a href="{{ route('webboard.index') }}?group_id=6">อื่นๆ &rsaquo;&rsaquo;</a>
  </div>
  <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:1px; background:#DCEEF8;">
    @foreach($photoClips as $clip)
    <a href="{{ route('webboard.index') }}?question_id={{ $clip->question_id }}"
       target="_blank"
       style="display:flex; flex-direction:column; align-items:center; gap:6px;
              padding:10px 8px; background:#fff; text-decoration:none;
              transition:background .15s;"
       onmouseover="this.style.background='#EBF4FB'" onmouseout="this.style.background='#fff'">
      @if(!empty($clip->question_file))
        <img src="{{ env('OSK_LEGACY_URL') }}/uploads/{{ $clip->question_file }}"
             style="width:90px; height:72px; object-fit:cover; border-radius:4px;" alt="">
      @else
        <div style="width:90px; height:72px; background:#EBF4FB; border-radius:4px;
                    display:flex; align-items:center; justify-content:center;">
          <img src="{{ asset('images/fallback.png') }}" style="width:56px; height:56px; object-fit:contain;" alt="">
        </div>
      @endif
      <span style="font-size:11px; color:#003366; text-align:center; line-height:1.4;">
        {{ mb_substr($clip->question_title, 0, 15) }}...
      </span>
    </a>
    @endforeach
  </div>
</div>
@endif


@endsection
