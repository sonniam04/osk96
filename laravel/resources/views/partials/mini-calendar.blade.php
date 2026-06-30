@php
    $now = now();
    $year  = (int) request('Y', $now->year);
    $month = (int) request('m', $now->month);
    $thaiYear  = $year + 543;
    $monthNames = ['','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน',
                   'กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
    $prevMonth = $month == 1 ? 12 : $month - 1;
    $prevYear  = $month == 1 ? $year - 1 : $year;
    $nextMonth = $month == 12 ? 1 : $month + 1;
    $nextYear  = $month == 12 ? $year + 1 : $year;
    $daysInMonth = (int) date('t', mktime(0,0,0,$month,1,$year));
    $firstDow    = (int) date('w', mktime(0,0,0,$month,1,$year));
    $startCol    = ($firstDow == 0) ? 7 : $firstDow;
@endphp

<style>
.mcal {
  font-family: 'Sarabun', sans-serif;
  font-size: 12px;
  user-select: none;
}
.mcal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 8px 12px 6px;
  border-bottom: 2px solid #308EC4;
}
.mcal-header .mcal-label {
  font-size: 13px;
  font-weight: 700;
  color: #003366;
  letter-spacing: 0.2px;
}
.mcal-header a {
  color: #308EC4;
  text-decoration: none;
  font-size: 15px;
  line-height: 1;
  padding: 2px 6px;
  border-radius: 3px;
}
.mcal-header a:hover { background: #EBF4FB; }

.mcal-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  padding: 6px 4px 8px;
  gap: 1px 0;
}
.mcal-dow {
  text-align: center;
  font-size: 10px;
  font-weight: 600;
  color: #94A3B8;
  padding-bottom: 5px;
  letter-spacing: 0.5px;
}
.mcal-dow.sun { color: #F87171; }

.mcal-day {
  text-align: center;
  padding: 4px 1px;
  color: #374151;
  border-radius: 50%;
  width: 26px;
  height: 26px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: default;
  transition: background .1s;
}
.mcal-day:hover:not(.empty) {
  background: #EBF4FB;
  cursor: pointer;
}
.mcal-day.sun { color: #EF4444; }
.mcal-day.sat { color: #8B5CF6; }
.mcal-day.today {
  background: #308EC4;
  color: #fff;
  font-weight: 700;
}
.mcal-day.today.sun,
.mcal-day.today.sat { color: #fff; }
</style>

<div class="mcal">
  <div class="mcal-header">
    <a href="?Y={{ $prevYear }}&m={{ $prevMonth }}">&#8249;</a>
    <span class="mcal-label">{{ $monthNames[$month] }} {{ $thaiYear }}</span>
    <a href="?Y={{ $nextYear }}&m={{ $nextMonth }}">&#8250;</a>
  </div>

  <div class="mcal-grid">
    @foreach([['จ',''],['อ',''],['พ',''],['พฤ',''],['ศ',''],['ส',''],['อา','sun']] as [$l,$c])
      <div class="mcal-dow {{ $c }}">{{ $l }}</div>
    @endforeach

    @for($i = 1; $i < $startCol; $i++)
      <div class="mcal-day empty"></div>
    @endfor

    @for($d = 1; $d <= $daysInMonth; $d++)
      @php
        $col = (($startCol - 1 + $d - 1) % 7) + 1;
        $isSun   = $col == 7;
        $isSat   = $col == 6;
        $isToday = ($d == $now->day && $month == $now->month && $year == $now->year);
        $cls = $isToday ? 'today' : '';
        if($isSun) $cls .= ' sun';
        if($isSat) $cls .= ' sat';
      @endphp
      <div class="mcal-day {{ trim($cls) }}">{{ $d }}</div>
    @endfor
  </div>
</div>
