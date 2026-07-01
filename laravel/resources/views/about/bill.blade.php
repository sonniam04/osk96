@extends('layouts.app')
@section('title', 'บัญชีสถานะการเงิน — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)')

@section('content')
<div class="card">
  <div class="section-title">
    <span>บัญชีสถานะการเงิน</span>
    <a href="{{ route('home') }}">← กลับหน้าแรก</a>
  </div>

  <div style="padding:16px 20px;">
    <p style="text-align:center; font-weight:700; font-size:14px; color:#003366; margin-bottom:20px;">
      บัญชีสรุปสถานะการเงินของชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่นที่ 96
    </p>

    <table style="width:100%; border-collapse:collapse; font-size:13px;">
      <thead>
        <tr style="background:#308EC4; color:#fff;">
          <th style="padding:8px 14px; text-align:left;">ชื่อบัญชี</th>
          <th style="padding:8px 14px; text-align:center; width:70px;">เลขที่บัญชี</th>
          <th style="padding:8px 14px; text-align:right; width:120px;">ยกมา</th>
          <th style="padding:8px 14px; text-align:right; width:120px;">รวมรับ</th>
          <th style="padding:8px 14px; text-align:right; width:120px;">รวมจ่าย</th>
          <th style="padding:8px 14px; text-align:right; width:120px;">คงเหลือ</th>
        </tr>
      </thead>
      <tbody>
        @foreach($accounts as $acc)
        @php $s = $summaries[$acc->Numbill] ?? null; @endphp
        <tr style="border-bottom:1px solid #DCEEF8;"
            onmouseover="this.style.background='#EBF4FB'" onmouseout="this.style.background=''">
          <td style="padding:8px 14px; font-weight:600;">{{ $acc->bill_name }}</td>
          <td style="padding:8px 14px; text-align:center; color:#64748B;">{{ $acc->Numbill }}</td>
          @if($s)
          <td style="padding:8px 14px; text-align:right;">{{ number_format($s->yodma, 2) }}</td>
          <td style="padding:8px 14px; text-align:right; color:#16A34A;">{{ number_format($s->total_in, 2) }}</td>
          <td style="padding:8px 14px; text-align:right; color:#DC2626;">{{ number_format($s->total_out, 2) }}</td>
          <td style="padding:8px 14px; text-align:right; font-weight:700;
              color:{{ $s->balance >= 0 ? '#003366' : '#DC2626' }};">
            {{ number_format($s->balance, 2) }}
          </td>
          @else
          <td colspan="4" style="padding:8px 14px; text-align:center; color:#94A3B8;">ยังไม่มีรายการ</td>
          @endif
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr style="background:#EBF4FB; font-weight:700;">
          <td colspan="2" style="padding:8px 14px; color:#003366;">รวมทั้งหมด</td>
          <td style="padding:8px 14px; text-align:right;">{{ number_format($summaries->sum('yodma'), 2) }}</td>
          <td style="padding:8px 14px; text-align:right; color:#16A34A;">{{ number_format($summaries->sum('total_in'), 2) }}</td>
          <td style="padding:8px 14px; text-align:right; color:#DC2626;">{{ number_format($summaries->sum('total_out'), 2) }}</td>
          <td style="padding:8px 14px; text-align:right; color:#003366;">{{ number_format($summaries->sum('balance'), 2) }}</td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endsection
