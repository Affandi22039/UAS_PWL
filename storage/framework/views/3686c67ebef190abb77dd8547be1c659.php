<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <h1>Semua Berita</h1>
        <div class="row">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <h2><a href="<?php echo e(route('posts.show', $post->id)); ?>"><?php echo e($post->title); ?></a></h2>
                    <p><?php echo e(Str::limit($post->content, 100)); ?></p>
                    <a href="<?php echo e(route('posts.show', $post->id)); ?>">Baca Selengkapnya</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo e($posts->links()); ?>

    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\pwl\pwl\resources\views/posts/all.blade.php ENDPATH**/ ?>