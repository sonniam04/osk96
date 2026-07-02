<?php
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
?>

<table width="100%" border="0" cellspacing="0" cellpadding="1" style="font-size:11px;">
  <tr bgcolor="#004080">
    <td style="color:#fff;" align="left">
      <a href="?Y=<?php echo e($prevYear); ?>&m=<?php echo e($prevMonth); ?>&d=<?php echo e($day); ?>" style="color:#fff;">&lt;&lt;</a>
    </td>
    <td colspan="5" style="color:#fff;" align="center">
      <?php echo e($monthNames[$month]); ?> <?php echo e($thaiYear); ?>

    </td>
    <td style="color:#fff;" align="right">
      <a href="?Y=<?php echo e($nextYear); ?>&m=<?php echo e($nextMonth); ?>&d=<?php echo e($day); ?>" style="color:#fff;">&gt;&gt;</a>
    </td>
  </tr>
  <tr>
    <?php $__currentLoopData = ['จ','อ','พ','พฤ','ศ','ส','อา']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <td align="center" background="<?php echo e(asset('images/bg_cal1.jpg')); ?>" style="font-size:10px;"><?php echo e($d); ?></td>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tr>
  <?php
      // Adjust: first column = Mon (1), Sun = last (7)
      $startCol = ($firstDow == 0) ? 7 : $firstDow;
      $dayNum = 1;
      $col = 1;
  ?>
  <?php for($row = 1; $row <= 6; $row++): ?>
    <tr>
      <?php for($col = 1; $col <= 7; $col++): ?>
        <?php
            $showDay = ($row == 1 && $col < $startCol) ? '' : ($dayNum > $daysInMonth ? '' : $dayNum++);
            $isToday = ($showDay == $now->day && $month == $now->month && $year == $now->year);
        ?>
        <td align="center" bgcolor="<?php echo e($isToday ? '#66CCFF' : '#E9E9E9'); ?>" style="font-size:11px; width:22px;">
          <?php echo e($showDay); ?>

        </td>
      <?php endfor; ?>
    </tr>
    <?php if($dayNum > $daysInMonth): ?> <?php break; ?> <?php endif; ?>
  <?php endfor; ?>
</table>
<?php /**PATH /var/www/html/resources/views/partials/mini-calendar.blade.php ENDPATH**/ ?>