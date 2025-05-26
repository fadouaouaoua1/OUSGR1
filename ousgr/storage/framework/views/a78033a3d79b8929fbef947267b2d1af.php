

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-6 py-8">
    <div class="bg-white shadow-md rounded px-6 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Modifier l'utilisateur</h1>

        <form method="POST" action="<?php echo e(route('admin.users.update', $user->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <input id="name" type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Nom complet">
            </div>

            <div class="mb-4">
                <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                <input id="telephone" type="text" name="telephone" value="<?php echo e(old('telephone', $user->telephone)); ?>"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Téléphone">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Adresse email">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input id="password" type="password" name="password"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Laisser vide pour ne pas modifier">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-100"
                       placeholder="Confirmer le mot de passe">
            </div>

            <h3 class="text-lg mt-8 mb-3 font-semibold text-gray-700">Rôle</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="inline-flex items-center mt-2">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="roles[]"
                               value="<?php echo e($role->id); ?>"
                               <?php echo e($user->role_id == $role->id ? 'checked' : ''); ?>>
                        <span class="ml-2 text-gray-700"><?php echo e($role->nom); ?></span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="text-right mt-8">
                <a href="<?php echo e(route('admin.users.index')); ?>"
                   class="inline-block mr-4 text-sm text-gray-500 hover:underline">← Annuler</a>

                <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\MAMP\htdocs\ousgr\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>