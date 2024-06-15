

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Berita Utama</h1>
        <?php if(Auth::user()->role == 'admin'): ?>
            <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary">Tambah Berita Baru</a>
        <?php endif; ?>
    </div>
    <div class="row">
        <?php $__currentLoopData = $mainPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php echo e(route('posts.show', $post->id)); ?>"><?php echo e($post->title); ?></a></h5>
                        <p class="card-text"><?php echo e(Str::limit($post->content, 100)); ?></p>
                        <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-primary">Baca Selengkapnya</a>
                        <?php if(Auth::user()->role == 'admin'): ?>
                            <div class="mt-2">
                                <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <h1>Berita Lainnya</h1>
    <div class="row">
        <?php $__currentLoopData = $otherPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php echo e(route('posts.show', $post->id)); ?>"><?php echo e($post->title); ?></a></h5>
                        <p class="card-text"><?php echo e(Str::limit($post->content, 100)); ?></p>
                        <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-primary">Baca Selengkapnya</a>
                        <?php if(Auth::user()->role == 'admin'): ?>
                            <div class="mt-2">
                                <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a href="<?php echo e(route('posts.all')); ?>" class="btn btn-primary mt-3">Semua Berita</a>
</div>

<?php if(session('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '<?php echo e(session('success')); ?>',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pwl\pwl\resources\views/posts/index.blade.php ENDPATH**/ ?>