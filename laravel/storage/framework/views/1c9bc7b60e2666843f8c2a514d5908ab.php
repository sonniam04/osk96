<?php $__env->startSection('title', 'ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96) ยินดีต้อนรับทุกท่าน'); ?>

<?php $__env->startPush('scripts-head'); ?>
<script type="text/javascript">
function MM_swapImgRestore(){var i,x,a=document.MM_sr;for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++)x.src=x.oSrc;}
function MM_preloadImages(){var d=document;if(d.images){if(!d.MM_p)d.MM_p=new Array();var i,j=d.MM_p.length,a=MM_preloadImages.arguments;for(i=0;i<a.length;i++)if(a[i].indexOf("#")!=0){d.MM_p[j]=new Image;d.MM_p[j++].src=a[i];}}}
function MM_findObj(n,d){var p,i,x;if(!d)d=document;if((p=n.indexOf("?"))>0&&parent.frames.length){d=parent.frames[n.substring(p+1)].document;n=n.substring(0,p);}if(!(x=d[n])&&d.all)x=d.all[n];for(i=0;!x&&i<d.forms.length;i++)x=d.forms[i][n];for(i=0;!x&&d.layers&&i<d.layers.length;i++)x=MM_findObj(n,d.layers[i].document);if(!x&&d.getElementById)x=d.getElementById(n);return x;}
function MM_swapImage(){var i,j=0,x,a=MM_swapImage.arguments;document.MM_sr=new Array;for(i=0;i<(a.length-2);i+=3)if((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x;if(!x.oSrc)x.oSrc=x.src;x.src=a[i+2];}}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<table width="100%" cellspacing="0" cellpadding="0">

  
  <tr>
    <td background="<?php echo e(asset('images/bp.jpg')); ?>">
      <table width="594" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <img src="<?php echo e(asset('images/table-body_011.jpg')); ?>" width="530" height="27">
            <a href="<?php echo e(route('webboard.index', ['group_id' => 1])); ?>" title="ดูทั้งหมด">
              <img src="<?php echo e(asset('images/tool_bar2_02.jpg')); ?>" width="64" height="27" border="0">
            </a>
          </td>
        </tr>
        <tr>
          <td>
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" background="<?php echo e(asset('images/table-body_02.jpg')); ?>">
                  <img src="<?php echo e(asset('images/table-body_02.jpg')); ?>" width="5" height="132">
                </td>
                <td width="584" valign="top"><br>
                  <table width="100%" cellspacing="0" cellpadding="0">
                    <?php $__empty_1 = true; $__currentLoopData = $latestPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                      <td width="23%">
                        <table width="100%" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="<?php echo e(asset('images/table-box_01.jpg')); ?>" width="129" height="21"></td>
                          </tr>
                          <tr>
                            <td>
                              <table cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="11" valign="top"><img src="<?php echo e(asset('images/table-box_02.jpg')); ?>" width="11" height="87"></td>
                                  <td width="106" height="87" align="center" valign="middle" background="<?php echo e(asset('images/table-box_03.jpg')); ?>">
                                    <a href="<?php echo e(route('webboard.index')); ?>?question_id=<?php echo e($post->question_id); ?>" target="_blank">
                                      <?php if(!empty($post->question_file)): ?>
                                        <img src="/uploads/<?php echo e($post->question_file); ?>" border="0" width="105" height="87">
                                      <?php else: ?>
                                        <img src="<?php echo e(asset('images/0skkk2.jpg')); ?>" border="0">
                                      <?php endif; ?>
                                    </a>
                                  </td>
                                  <td width="12" valign="top"><img src="<?php echo e(asset('images/table-box_04.jpg')); ?>" width="12" height="87"></td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td><img src="<?php echo e(asset('images/table-box_05.jpg')); ?>" width="129" height="8"></td>
                          </tr>
                        </table>
                      </td>
                      <td valign="top" style="padding:4px; font-size:13px;">
                        <a href="<?php echo e(route('webboard.index')); ?>?question_id=<?php echo e($post->question_id); ?>" target="_blank" class="webboard">
                          <?php echo e(Str::limit($post->question_title, 60)); ?>

                        </a>
                        <?php if(\Carbon\Carbon::parse($post->question_date)->diffInDays(now()) <= 7): ?>
                          <img src="<?php echo e(asset('images/board_news.gif')); ?>" border="0">
                        <?php endif; ?>
                        <br>
                        <span style="font-size:11px; color:#666;">
                          <?php echo e(\Carbon\Carbon::parse($post->question_date)->locale('th')->isoFormat('D MMM YY')); ?>

                          &nbsp;|&nbsp; ตอบ <?php echo e($post->question_post ?? 0); ?>

                          &nbsp;|&nbsp; ดู <?php echo e($post->question_view ?? 0); ?>

                        </span>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="2" align="center" style="padding:20px; color:#666;">ยังไม่มีโพสต์</td></tr>
                    <?php endif; ?>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  
  <tr>
    <td background="<?php echo e(asset('images/bp.jpg')); ?>">
      <table width="594" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <img src="<?php echo e(asset('images/tool_bar2_01.jpg')); ?>" width="530" height="27">
            <a href="<?php echo e(route('webboard.index')); ?>" title="ดูทั้งหมด">
              <img src="<?php echo e(asset('images/tool_bar2_02.jpg')); ?>" width="64" height="27" border="0">
            </a>
          </td>
        </tr>
        <tr>
          <td>
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" background="<?php echo e(asset('images/table-body_02.jpg')); ?>">
                  <img src="<?php echo e(asset('images/table-body_02.jpg')); ?>" width="5" height="132">
                </td>
                <td width="584" valign="top">
                  <table width="100%" cellspacing="0" cellpadding="0">
                    <tr align="center" style="font-weight:bold; font-size:12px; background:#eef;">
                      <td width="55%">หัวข้อ</td>
                      <td width="15%">หมวด</td>
                      <td width="10%">ตอบ</td>
                      <td width="10%">ดู</td>
                      <td width="10%">วันที่</td>
                    </tr>
                    <?php $__empty_1 = true; $__currentLoopData = $recentTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr style="font-size:12px; border-bottom:1px solid #eee;">
                      <td style="padding:3px 5px;">
                        <a href="<?php echo e(route('webboard.index')); ?>?question_id=<?php echo e($topic->question_id); ?>"
                           class="webboard" target="_blank">
                          <?php echo e(Str::limit($topic->question_title, 50)); ?>

                        </a>
                        <?php if(\Carbon\Carbon::parse($topic->question_date)->diffInDays(now()) <= 7): ?>
                          <img src="<?php echo e(asset('images/board_news.gif')); ?>" border="0">
                        <?php endif; ?>
                      </td>
                      <td align="center"><?php echo e($topic->group_name); ?></td>
                      <td align="center"><?php echo e($topic->question_post ?? 0); ?></td>
                      <td align="center"><?php echo e($topic->question_view ?? 0); ?></td>
                      <td align="center">
                        <?php echo e(\Carbon\Carbon::parse($topic->question_date)->format('d/m/y')); ?>

                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" align="center" style="padding:10px; color:#666;">ยังไม่มีโพสต์</td></tr>
                    <?php endif; ?>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  
  <tr>
    <td background="<?php echo e(asset('images/bp.jpg')); ?>">
      <table width="594" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <img src="<?php echo e(asset('images/tool_bar3_01.jpg')); ?>" width="530" height="27">
            <img src="<?php echo e(asset('images/tool_bar3_02.jpg')); ?>" width="64" height="27">
          </td>
        </tr>
        <tr>
          <td>
            <table width="100%" cellspacing="0" cellpadding="4">
              <tr>
                <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <td align="center" valign="top" width="25%">
                  <?php if(!empty($act->act_pic)): ?>
                    <img src="/activity_images_small/<?php echo e($act->act_pic); ?>"
                         width="120" height="90" border="0" style="border:1px solid #ccc;">
                  <?php else: ?>
                    <img src="<?php echo e(asset('images/0skkk2.jpg')); ?>" width="120" height="90" border="0">
                  <?php endif; ?>
                  <br>
                  <span style="font-size:11px;"><?php echo e(Str::limit($act->act_title, 30)); ?></span>
                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <td align="center" colspan="4" style="padding:20px; color:#666;">ยังไม่มีกิจกรรม</td>
                <?php endif; ?>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>

</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/home/index.blade.php ENDPATH**/ ?>