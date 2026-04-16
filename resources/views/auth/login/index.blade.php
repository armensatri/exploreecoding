@extends('auth.template.main')

@section('content-auth')
  <div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 shadow bg-sky-50 rounded-3xl md:p-8">
      <div class="mb-4 text-3xl font-bold text-center text-gray-900">
        Login
      </div>

      @if (session()->has('alert'))
        @include('sweetalert::alert')
      @endif

      <form action="{{ route('login.store') }}"
        method="POST"
        class="p-3 space-y-4">
        @csrf

        <div class="w-full">
          <input type="text"
            id="email"
            name="email"
            placeholder="Masukkan email"
            class="input-auth"
            value="{{ old('email') }}"
          />
          <x-message error="email"/>
        </div>

        <div class="w-full">
          <input type="password"
            id="password"
            name="password"
            placeholder="Masukkan password"
            class="input-auth"
          />
          <x-message error="password"/>
        </div>

        <button type="submit" class="button-auth">
          Login to your account
        </button>

        @include('auth.login.button')
      </form>
    </div>
  </div>
@endsection

