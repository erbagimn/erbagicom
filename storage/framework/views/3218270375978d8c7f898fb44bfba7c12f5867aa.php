<a href="<?php echo e(route('wishlists.index')); ?>" class="nav-box-link">
    <i class="la la-heart-o d-inline-block nav-box-icon"></i>
    <span class="nav-box-text d-none d-lg-inline-block"><?php echo e(__('Wishlist')); ?></span>
    <?php if(Auth::check()): ?>
        <span class="nav-box-number"><?php echo e(count(Auth::user()->wishlists)); ?></span>
    <?php else: ?>
        <span class="nav-box-number">0</span>
    <?php endif; ?>
</a>
