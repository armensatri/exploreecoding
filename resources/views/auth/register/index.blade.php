@extends('auth.template.main')

@section('content-auth')
  <div class="w-full max-w-md p-8 bg-white shadow rounded-3xl md:p-8">
    <div class="text-2xl font-bold text-center text-gray-900">
      Register
    </div>

    @if (session()->has('alert'))
      @include('sweetalert::alert')
    @endif

    <form action="{{ route('register.store') }}"
      method="POST"
      class="p-3 space-y-4">
      @csrf

      <div class="w-full">
        <input type="text"
          id="name"
          name="name"
          placeholder="Masukkan nama lengkap"
          class="app-auth-inputan"
          value="{{ old('name') }}"
        />
        <x-messages error="name"/>
      </div>

      <div class="w-full">
        <input type="text"
          id="username"
          name="username"
          placeholder="Masukkan username"
          class="app-auth-inputan"
          value="{{ old('username') }}"
        />
        <x-messages error="username"/>
      </div>

      <div class="w-full">
        <input type="text"
          id="email"
          name="email"
          placeholder="Masukkan email"
          class="app-auth-inputan"
          value="{{ old('email') }}"
        />
        <x-messages error="email"/>
      </div>

      <div class="space-y-4 md:space-y-0 md:flex md:gap-4">
        <div class="w-full">
          <input type="password"
            id="password"
            name="password"
            placeholder="Masukkan password"
            class="app-auth-inputan"
          />
          <x-messages error="password"/>
        </div>

        <div class="w-full">
          <input type="password"
            id="passkon"
            name="passkon"
            placeholder="Password konfirm"
            class="app-auth-inputan"
          />
          <x-messages error="passkon"/>
        </div>
      </div>

      <button type="submit" class="app-button-auth">
        Create your account
      </button>

      <div class="text-gray-700 app-auth-link">
        sudah mempunyai akun ?
        <a href="{{ route('login') }}"
          class="text-blue-600 underline">
          login sekarang
        </a>
      </div>

      <div class="text-gray-700 app-auth-link">
        back to
        <a href="{{ route('home') }}"
          class="text-blue-600 underline">
          home
        </a>
      </div>
    </form>
  </div>
@endsection
