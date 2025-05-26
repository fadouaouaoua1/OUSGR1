 

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-6 py-8">
    <div class="bg-white shadow-md rounded px-6 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Ajouter un nouvel utilisateur</h1>

        <form method="POST" action="<?php echo e(route('admin.users.store')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Entrer le nom">
            </div>

            <div class="mb-4">
                <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                <input id="telephone" name="telephone" type="text" value="<?php echo e(old('telephone')); ?>"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Entrer le téléphone">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Entrer l'email">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input id="password" name="password" type="password"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Entrer le mot de passe">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Confirmer le mot de passe">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Rôle</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="roles[]" value="<?php echo e($role->id); ?>"
                                   class="form-radio text-blue-600">
                            <span class="text-gray-700"><?php echo e($role->nom); ?></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="text-right">
                <a href="<?php echo e(route('admin.users.index')); ?>"
                   class="inline-block mr-4 text-sm text-gray-500 hover:underline">← Retour</a>

                <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\MAMP\htdocs\ousgr\resources\views/admin/users/create.blade.php ENDPATH**/ ?>