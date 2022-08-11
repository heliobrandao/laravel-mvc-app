<x-layout title="Login">
  <form method="post" class="mt-2">
    @csrf
    <div class="form-group">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group">
      <label for="password" class="form-label">Senha</label>
      <input type="password" name="password" id="password" class="form-control">
    </div>

    <button class="btn btn-primary mt-3">
      Entrar
    </button>

    <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">
      Registrar
    </a>
  </form>
</x-layout>