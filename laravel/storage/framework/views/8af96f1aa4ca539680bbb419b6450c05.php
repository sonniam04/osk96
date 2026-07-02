<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $__env->yieldContent('title', 'ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96) ยินดีต้อนรับทุกท่าน'); ?></title>
<link href="<?php echo e(asset('style.css')); ?>" rel="stylesheet" type="text/css">
<style type="text/css">
body {
    margin: 0;
    padding: 0;
    background-color: #308EC4;
    font-family: "Microsoft Sans Serif", Tahoma, sans-serif;
    font-size: 14px;
}
</style>
<?php echo $__env->yieldPushContent('scripts-head'); ?>
</head>

<body>
<table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center">
  <tr>
    <td align="center" valign="top">
      <table cellspacing="0" cellpadding="0">

        
        <tr>
          <td><?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></td>
        </tr>

        
        <tr>
          <td align="center">
            <img src="<?php echo e(asset('images/web-team_over_04.jpg')); ?>" alt="">
          </td>
        </tr>

        
        <tr>
          <td align="left" valign="top">
            <table cellspacing="0" cellpadding="0">
              <tr>
                
                <td width="216" valign="top">
                  <?php echo $__env->make('partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </td>

                
                <td width="748" align="center" valign="top">
                  <?php echo $__env->yieldContent('content'); ?>
                </td>

                
                <td width="40" valign="top" background="<?php echo e(asset('images/bp.png')); ?>">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>

        
        <tr>
          <td>
            <img src="<?php echo e(asset('images/web-team_over_08.jpg')); ?>" width="1004" height="7" alt="">
          </td>
        </tr>

        
        <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      </table>
    </td>
  </tr>
</table>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>