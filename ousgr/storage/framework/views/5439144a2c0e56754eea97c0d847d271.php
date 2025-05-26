<?php $__env->startSection('content'); ?>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md p-8 bg-white rounded shadow">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Connexion</h2>

            <?php if(session('status')): ?>
                <div class="mb-4 text-green-600"><?php echo e(session('status')); ?></div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="mb-4 text-red-600">
                    <ul class="text-sm list-disc list-inside">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <input type="email" name="email" placeholder="Email" required class="w-full mb-4 px-3 py-2 border rounded">
                <input type="password" name="password" placeholder="Mot de passe" required class="w-full mb-4 px-3 py-2 border rounded">

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Se connecter</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\MAMP\htdocs\ousgr\resources\views/auth/login.blade.php ENDPATH**/ ?>