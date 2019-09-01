<a href="<?php echo e(route('compare')); ?>" class="nav-box-link">
    <i class="la la-refresh d-inline-block nav-box-icon"></i>
    <span class="nav-box-text d-none d-lg-inline-block"><?php echo e(__('Compare')); ?></span>
    <?php if(Session::has('compare')): ?>
        <span class="nav-box-number"><?php echo e(count(Session::get('compare'))); ?></span>
    <?php else: ?>
        <span class="nav-box-number">0</span>
    <?php endif; ?>
</a>
