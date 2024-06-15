<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($post->title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <h1><?php echo e($post->title); ?></h1>
        <p><?php echo e($post->content); ?></p>
        <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-primary">Kembali ke Berita</a>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\pwl\pwl\resources\views/posts/show.blade.php ENDPATH**/ ?>