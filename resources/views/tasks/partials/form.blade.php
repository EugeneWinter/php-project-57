<div class="mb-4">
    <x-input-label for="description" :value="__('app.task.description')" />
    <textarea id="description" name="description" rows="4"
        class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm"
    >{{ old('description', $task->description ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>