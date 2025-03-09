Dear <b><?php echo e($student->name); ?></b><br>
<p>
    You are receiving this email because you requested to reset your password on <?php echo e(get_settings()->site_name); ?>

</p>
<p>
    Please, use the link below to reset it.
    <a href="<?php echo e($actionLink); ?>" target="_blank"><?php echo e($actionLink); ?></a><br>
</p>
<p>
    This password reset link is only valid for the next 15 minutes.
</p>
<p>
    If you are having trouble with the link above, copy and paste it into your web browser.
</p>
<p>
    NB: IF YOU DID NOT REQUEST A PASSWORD REST, PLEASE IGNORE THIS EMAIL
</p><br>
----------------------------------------------
<p>
    This e-mail was automaticaly sent by <?php echo e(get_settings()->site_name); ?>. Don't reply to it.
</p>
<?php /**PATH C:\xampp\htdocs\Enroll\resources\views/email-templates/student-forgot-email-template.blade.php ENDPATH**/ ?>