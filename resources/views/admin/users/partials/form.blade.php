<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="first_name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Contraseña</label>
    <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
</div>
@if(!isset($user))
<div class="mb-3">
    <label>Confirmar Contraseña</label>
    <input type="password" name="password_confirmation" class="form-control" required>
</div>
@endif
<div class="mb-3">
    <label>Rol</label>
    <select name="role" class="form-select" required>
        @foreach ($roles as $role)
            <option value="{{ $role->name }}" 
                {{ (isset($user) && $user->hasRole($role->name)) ? 'selected' : '' }}>
                {{ ucfirst($role->name) }}
            </option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-primary">{{ $button }}</button>