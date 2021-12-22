<div class="entry">

    <div class="entry-background">
        <a href="/posts/<?php echo e($post->id); ?>" class="entry-link">
            <div class="entry-content">
                <div class="entry-title"><?php echo e($post->title); ?></div>
                <div class="entry-summary">Summary</div>
                <div class="entry-summary-text"><?php echo e($post->body); ?></div>
                <div class="entry-bottom">
                    <?php echo $__env->yieldContent('bottom'); ?>
                </div>
            </div>
        </a>
    </div>

</div>
<div class="line-container">
    <div class="line-small"></div>
</div>
<?php /**PATH C:\xampp\htdocs\TripReview\resources\views/inc/entrytemplate.blade.php ENDPATH**/ ?>