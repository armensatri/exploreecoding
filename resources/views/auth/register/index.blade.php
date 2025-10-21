@extends('auth.template.main')

@section('content-auth')
  <div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-sky-50 shadow rounded-3xl md:p-8">
      <div class="text-3xl mb-4 font-bold text-center text-gray-800">
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
            class="input-auth"
            value="{{ old('name') }}"
          />
          <x-message error="name"/>
        </div>

        <div class="w-full">
          <input type="text"
            id="username"
            name="username"
            placeholder="Masukkan username"
            class="input-auth"
            value="{{ old('username') }}"
          />
          <x-message error="username"/>
        </div>

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

        <div class="space-y-4 md:space-y-0 md:flex md:gap-4">
          <div class="w-full">
            <input type="password"
              id="password"
              name="password"
              placeholder="Masukkan password"
              class="input-auth"
            />
            <x-message error="password"/>
          </div>

          <div class="w-full">
            <input type="password"
              id="passkon"
              name="passkon"
              placeholder="Password konfirm"
              class="input-auth"
            />
            <x-message error="passkon"/>
          </div>
        </div>

        <button type="submit" class="button-auth">
          Create your account
        </button>

        @include('auth.register.button')
      </form>
    </div>
  </div>
@endsection
