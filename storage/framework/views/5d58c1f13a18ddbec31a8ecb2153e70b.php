<p>Dear <?php echo e($admin->name); ?> </p>
<p>
    we are recieved a request to reset password.. <?php echo e($admin->email); ?>.
    You can  reset your password by clicking the Button Below
    <br>
    <a href="<?php echo e($actionLink); ?>" target="_blank" style="color:#fff;border-color:#22bc66;border-style:solid;
    border-width:5px 10px;background-color:#22bc66;display:inline-block;text-decoration:none;border-radius:3px;
    box-shadow:0 2px 3px rgba(0,0,0,0,16);-webkit-text-size-adjust:none;box-sizing:border-box;">Reset Password </a>

    <br>
    <b>NB:</b> This link will valid within 15Minutes
    <br>
    if you did not request for the reset password Ignore this Email
</p>
<?php /**PATH C:\xampp\htdocs\Enroll\resources\views/email-templates/admin-forgot-email-template.blade.php ENDPATH**/ ?>