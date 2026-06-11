@extends('layouts.storefront')

@section('title', 'My Profile — DonutHub')

@section('content')
    <section class="py-12 bg-[#F1E8DF] min-h-[85vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <div class="mb-8">
                <nav class="flex text-sm font-semibold text-gray-500 mb-2">
                    <a href="{{ route('home') }}" class="hover:text-[#FF4E02] transition-colors">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-[#4A3220]">Profile</span>
                </nav>
                <h1 class="font-sans text-4xl font-extrabold text-[#4A3220]">My Account 👤</h1>
            </div>

            <div class="grid grid-cols-1 gap-8 max-w-3xl">
                {{-- Profile Info Card --}}
                <div class="p-6 sm:p-8 bg-white rounded-3xl border border-gray-100 shadow-sm">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                {{-- Password Card --}}
                <div class="p-6 sm:p-8 bg-white rounded-3xl border border-gray-100 shadow-sm">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                {{-- Delete Account Card --}}
                <div class="p-6 sm:p-8 bg-[#FAF4EE] rounded-3xl border border-red-100 shadow-sm">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

