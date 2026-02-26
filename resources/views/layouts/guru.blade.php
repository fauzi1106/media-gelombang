    @extends('layouts.app')

    @section('content')

        <div class="layout-wrapper guru-layout">

            {{-- SIDEBAR --}}
            <aside class="sidebar">

                <div class="sidebar-header">
                    📊 Menu Guru
                </div>

                <div class="menu">

                    <a class="menu-item {{ request()->is('dashboard-guru') ? 'active' : '' }}" href="/dashboard-guru">
                        Dashboard
                    </a>

                    <a class="menu-item {{ request()->is('guru-nilai*') ? 'active' : '' }}" href="/guru-nilai">
                        Data Nilai
                    </a>

                    <a class="menu-item {{ request()->is('guru-siswa*') ? 'active' : '' }}" href="/guru-siswa">
                        Data Siswa
                    </a>

                    {{-- ACCORDION ANALISIS --}}
                    <div class="menu-section">

                        <div class="menu-item has-toggle
                {{ request()->is('guru/analysis/*') ? 'menu-item-open' : '' }}" data-target="sub-analysis">

                            Analisis Soal
                            <span class="arrow">▼</span>
                        </div>

                        <div class="submenu
                {{ request()->is('guru/analysis/*') ? 'open' : '' }}" id="sub-analysis">

                            <a class="{{ request()->is('guru/analysis/1') ? 'active-link' : '' }}" href="/guru/analysis/1">
                                Analisis Gelombang
                            </a>

                            <a class="{{ request()->is('guru/analysis/2') ? 'active-link' : '' }}" href="/guru/analysis/2">
                                Analisis Bunyi
                            </a>

                            <a class="{{ request()->is('guru/analysis/3') ? 'active-link' : '' }}" href="/guru/analysis/3">
                                Analisis Cahaya
                            </a>

                        </div>

                    </div>


                </div>

            </aside>


            {{-- CONTENT --}}
            <main class="main-content">
                @yield('guru-content')
            </main>

        </div>

    @endsection