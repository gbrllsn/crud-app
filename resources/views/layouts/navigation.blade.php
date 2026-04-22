<nav x-data="{ open: false }" style="background: #323630; border-bottom: 1px solid rgba(255,255,255,0.07);">

    {{-- =========================================
         ADDED: dynamic avatar logic
         ========================================= --}}
    @php
        $avatars = ['avatar1.png', 'avatar2.png', 'avatar3.png'];
        $avatar = $avatars[Auth::user()->id % count($avatars)];
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- LEFT: Logo + Name -->
            <div class="flex items-center gap-3">
                <!-- LOGO -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">

                <!-- TEXT -->
                <span class="text-lg font-semibold" style="color: #dce4d4;">
                    Zen Dashboard
                </span>
            </div>
                <div class="flex items-center gap-4">
                
                {{-- CHANGED: custom logo --}}
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/sqimg_1776694944841.png') }}" 
                         class="w-10 h-10 rounded-full object-contain">
                </a>

                {{-- ADDED: system name --}}
                <div>
                    <p style="font-size: 11px; letter-spacing: 0.18em; color: #6b7d66;">
                        ZEN WORKSPACE
                    </p>
                    <span style="color: #dce4d4; font-family: Lora, serif;">
                        Dashboard
                    </span>
                </div>

            </div>

            <!-- RIGHT: Profile + Avatar + Logout -->
            <div class="hidden sm:flex sm:items-center gap-4">

                {{-- ADDED: username --}}
                <div style="text-align: right;">
                    <div style="color: #dce4d4; font-size: 14px;">
                        {{ Auth::user()->name }}
                    </div>
                    <div style="color: #8a9485; font-size: 12px;">
                        Logged in
                    </div>
                </div>

                {{-- ADDED: avatar --}}
                <img src="{{ asset('images/avatars/' . $avatar) }}"
                     class="w-10 h-10 rounded-full object-cover border border-white/10">

                {{-- CHANGED: logout button --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        style="
                            background: #4e6b4a;
                            color: #d4e0d0;
                            padding: 8px 16px;
                            border-radius: 999px;
                            font-size: 13px;
                            border: 1px solid rgba(255,255,255,0.08);
                            transition: 0.2s;
                        "
                        onmouseover="this.style.background='#5a7a56'"
                        onmouseout="this.style.background='#4e6b4a'"
                    >
                        Log out
                    </button>
                </form>

            </div>

            <!-- Mobile button (kept but styled minimal) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="p-2 rounded-md text-gray-400 hover:text-white">
                    ☰
                </button>
            </div>
        </div>
    </div>

</nav>