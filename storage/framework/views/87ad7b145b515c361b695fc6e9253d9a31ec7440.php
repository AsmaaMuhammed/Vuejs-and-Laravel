<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo app('translator')->getFromJson('companieslables.edit'); ?>
                </div>
                <div class="panel-body">

                    <?php echo app('translator')->getFromJson('companieslables.comingsoon'); ?>
                </div>

            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>