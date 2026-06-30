@php
    $now = now();
    $year = request('Y', $now->year);
    $month = request('m', $now->month);
    $day = request('d', $now->day);
    $thaiYear = $year + 543;
    $monthNames = ['','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน',
                   'กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
    $prevMonth = $month == 1 ? 12 : $month - 1;
    $prevYear  = $month == 1 ? $year - 1 : $year;
    $nextMonth = $month == 12 ? 1 : $month + 1;
    $nextYear  = $month == 12 ? $year + 1 : $year;
    $daysInMonth = (int) date('t', mktime(0,0,0,$month,1,$year));
    $firstDow = date('w', mktime(0,0,0,$month,1,$year)); // 0=Sun
@endphp

<table width="100%" border="0" cellspacing="0" cellpadding="1" style="font-size:11px;">
  <tr bgcolor="#004080">
    <td style="color:#fff;" align="left">
      <a href="?Y={{ $prevYear }}&m={{ $prevMonth }}&d={{ $day }}" style="color:#fff;">&lt;&lt;</a>
    </td>
    <td colspan="5" style="color:#fff;" align="center">
      {{ $monthNames[$month] }} {{ $thaiYear }}
    </td>
    <td style="color:#fff;" align="right">
      <a href="?Y={{ $nextYear }}&m={{ $nextMonth }}&d={{ $day }}" style="color:#fff;">&gt;&gt;</a>
    </td>
  </tr>
  <tr>
    @foreach(['จ','อ','พ','พฤ','ศ','ส','อา'] as $d)
      <td align="center" background="{{ asset('images/bg_cal1.jpg') }}" style="font-size:10px;">{{ $d }}</td>
    @endforeach
  </tr>
  @php
      // Adjust: first column = Mon (1), Sun = last (7)
      $startCol = ($firstDow == 0) ? 7 : $firstDow;
      $dayNum = 1;
      $col = 1;
  @endphp
  @for($row = 1; $row <= 6; $row++)
    <tr>
      @for($col = 1; $col <= 7; $col++)
        @php
            $showDay = ($row == 1 && $col < $startCol) ? '' : ($dayNum > $daysInMonth ? '' : $dayNum++);
            $isToday = ($showDay == $now->day && $month == $now->month && $year == $now->year);
        @endphp
        <td align="center" bgcolor="{{ $isToday ? '#66CCFF' : '#E9E9E9' }}" style="font-size:11px; width:22px;">
          {{ $showDay }}
        </td>
      @endfor
    </tr>
    @if($dayNum > $daysInMonth) @break @endif
  @endfor
</table>
