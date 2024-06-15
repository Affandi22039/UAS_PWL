

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h1>Berita Utama</h1>
    <div class="row">
        <?php $__currentLoopData = $mainPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <h2><a href="<?php echo e(route('posts.show', $post->id)); ?>"><?php echo e($post->title); ?></a></h2>
                <p><?php echo e(Str::limit($post->content, 100)); ?></p>
                <a href="<?php echo e(route('posts.show', $post->id)); ?>">Baca Selengkapnya</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <h1>Berita Lainnya</h1>
    <div class="row">
        <?php $__currentLoopData = $otherPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <h2><a href="<?php echo e(route('posts.show', $post->id)); ?>"><?php echo e($post->title); ?></a></h2>
                <p><?php echo e(Str::limit($post->content, 100)); ?></p>
                <a href="<?php echo e(route('posts.show', $post->id)); ?>">Baca Selengkapnya</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a href="<?php echo e(route('posts.all')); ?>" class="btn btn-primary mt-3">Semua Berita</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pwl\pwl\resources\views//posts/index.blade.php ENDPATH**/ ?>