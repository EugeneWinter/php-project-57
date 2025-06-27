<div class="form-group">
    <x-input-label for="description" :value="__('app.task.description')" />
    <textarea id="description" name="description" rows="4" class="form-control"
    >{{ old('description', $task->description ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('description')" />
</div>