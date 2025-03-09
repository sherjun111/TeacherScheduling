<?php $__env->startSection('pageTittle',isset($pageTittle) ? $pageTittle : 'Settings'); ?>
<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Settings</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('admin.home')); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Settings
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-4">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin-settings');

$__html = app('livewire')->mount($__name, $__params, 'lw-2028177022-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
        $('input[type="file"][name="site_logo"][id="site_logo"]').ijaboViewer({
            preview:'#site_logo_image_preview',
            imageShape:'rectangular', //set square if is favicon
            allowedExtensions:['png', 'jpeg','jpg'],
            onErrorShape:function(message, element){
                alert('Error Image');
            },
            onInvalidType:function(message, element){
                alert('message');
            },
            onSuccess:function(message, element){}
        });
        $('#change_site_logo_form').on('submit', function(e){
            e.preventDefault();
            var form = this;
            var formdata = new FormData(form);
            var inputFileVal = $(form).find('input[type="file"][name="site_logo"]').val();

            if( inputFileVal.length > 0 ){
                $.ajax({
                 url:$(form).attr('action'),
                 method:$(form).attr('method'),
                 data:formdata,
                 processData:false,
                 dataType:'json',
                 contentType:false,
                 beforeSend:function(){
                    toastr.remove();
                    $(form).find('span.error-text').text('');
                 },
                 success:function(response){
                    if(response.status == 1){
                        toastr.success(response.msg);
                        $(form)[0].reset();
                    }else{
                        toastr.error(response.msg);
                    }
                 }
                });
            }else{
                $(form).find('span.error-text').text('Please, select logo image file. PNG file type is recommended.');
            }
        });


        $('input[type="file"][name="site_favicon"][id="site_favicon"]').ijaboViewer({
            preview:'#site_favicon_image_preview',
            imageShape:'square',
            allowedExtensions:['png'],
            onErrorShape:function(message, element){
                alert('message');
            },
            onInvalidType:function(message, element){
                alert('message');
            },
            onSuccess:function(message, element){}
        });


        $('#change_site_favicon_form').on('submit', function(e){
            e.preventDefault();
            var form = this;
            var formdata = new FormData(form);
            var inputFileVal = $(form).find('input[type="file"][name="site_favicon"]').val();

            if( inputFileVal.length > 0 ){
               $.ajax({
                  url:$(form).attr('action'),
                  method:$(form).attr('method'),
                  data:formdata,
                  processData:false,
                  dataType:'json',
                  contentType:false,
                  beforeSend:function(){
                    $(form).find('span.error-text').text('');
                  },
                  success:function(response){
                    if( response.status == 1 ){
                        toastr.success(response.msg);
                        $(form)[0].reset();
                    }else{
                        toastr.error(response.msg);
                    }
                  }
               });
            }else{
                $(form).find('span.error-text').text('Please, select favicon image file. PNG file type is recommended.');
            }
        });


     </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Enroll\resources\views/back/pages/settings.blade.php ENDPATH**/ ?>