<div class="mb-3">
    <label>Nombre <span> *</span></label>
    <input type="text" name="first_name" class="form-control" value="{{ old('name', $user->first_name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Email <span> *</span></label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Contraseña <span> *</span></label>
    <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
</div>
@if(!isset($user))
<div class="mb-3">
    <label>Confirmar Contraseña <span> *</span></label>
    <input type="password" name="password_confirmation" class="form-control" required>
</div>
@endif
<div class="mb-3">
    <label>Rol <span> *</span></label>
    <select name="role" class="form-select" required>
        @foreach ($roles as $role)
            <option value="{{ $role->name }}" 
                {{ (isset($user) && $user->hasRole($role->name)) ? 'selected' : '' }}>
                {{ ucfirst($role->name) }}
            </option>
        @endforeach
    </select>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label>País <span> *</span></label>
            <select class="form-select" id="country" name="lc_country_id">
                <option value="" selected disabled hidden>Selecciona País</option>
                @foreach ($countries as $key => $value)
                    <option value="{{ $key }}" {{ old('lc_country_id', $user->country_id) == $key ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label>Estado <span> *</span></label>
            <select class="form-select" id="state" name="state_id">
                @php
                    $states = App\Models\CountryState::where('lc_country_id', $user->l_country_id)->get();
                @endphp
                <option value="" selected disabled hidden>Selecciona Estado</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ $user->state_id == $state->id ? 'selected' : '' }}>
                        {{ $state->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <button type="submit" class="btn btn-primary">{{ $button }}</button>
    </div>
</div>