@extends('layouts.app')

@section('content')

<div class="layout-wrapper">

    {{-- ======================
         SIDEBAR SISWA
    ======================= --}}
    <aside class="sidebar">

        <div class="sidebar-header">
            📘 Gelombang, Bunyi, dan Cahaya
        </div>

        <div class="menu">

            {{-- ======================
                 GELOMBANG
            ======================= --}}
            <div class="menu-section">

                <div class="menu-item has-toggle" data-target="sub-gelombang">
                    Gelombang
                    <span class="arrow">▼</span>
                </div>

                <div class="submenu" id="sub-gelombang">

                    <a href="/pengantar_gelombang"
                       class="{{ request()->is('pengantar_gelombang') ? 'active-link' : '' }}">
                        Pengantar
                    </a>

                    <a href="/definisi_gelombang"
                       class="{{ request()->is('definisi_gelombang') ? 'active-link' : '' }}">
                        Definisi
                    </a>

                    <a href="/jenis_gelombang"
                       class="{{ request()->is('jenis_gelombang') ? 'active-link' : '' }}">
                        Jenis Gelombang
                    </a>

                    <a href="/beda_fase_gelombang"
                       class="{{ request()->is('beda_fase_gelombang') ? 'active-link' : '' }}">
                        Beda Fase
                    </a>

                    <a href="/prinsip_gelombang"
                       class="{{ request()->is('prinsip_gelombang') ? 'active-link' : '' }}">
                        Prinsip Gelombang
                    </a>

                    <a href="/kuis_gelombang"
                       class="{{ request()->is('kuis_gelombang') ? 'active-link' : '' }}">
                        Kuis 1
                    </a>

                </div>
            </div>


            {{-- ======================
                 GELOMBANG BUNYI
            ======================= --}}
            <div class="menu-section">

                <div class="menu-item has-toggle" data-target="sub-bunyi">
                    Gelombang Bunyi
                    <span class="arrow">▼</span>
                </div>

                <div class="submenu" id="sub-bunyi">

                    <a href="/pengantar_bunyi"
                       class="{{ request()->is('pengantar_bunyi') ? 'active-link' : '' }}">
                        Pengantar
                    </a>

                    <a href="/konsep_perambatan_bunyi"
                       class="{{ request()->is('konsep_perambatan_bunyi') ? 'active-link' : '' }}">
                        Konsep Dasar
                    </a>

                    <a href="/sumber_kar_bunyi"
                       class="{{ request()->is('sumber_kar_bunyi') ? 'active-link' : '' }}">
                        Sumber & Karakteristik
                    </a>

                    <a href="/fenomena_apk_bunyi"
                       class="{{ request()->is('fenomena_apk_bunyi') ? 'active-link' : '' }}">
                        Fenomena & Aplikasi
                    </a>

                    <a href="/kuis_bunyi"
                       class="{{ request()->is('kuis_bunyi') ? 'active-link' : '' }}">
                        Kuis 2
                    </a>

                </div>
            </div>


            {{-- ======================
                 GELOMBANG CAHAYA
            ======================= --}}
            <div class="menu-section">

                <div class="menu-item has-toggle" data-target="sub-cahaya">
                    Gelombang Cahaya
                    <span class="arrow">▼</span>
                </div>

                <div class="submenu" id="sub-cahaya">

                    <a href="/pengantar_cahaya"
                       class="{{ request()->is('pengantar_cahaya') ? 'active-link' : '' }}">
                        Pengantar
                    </a>

                    <a href="/sifat_cahaya"
                       class="{{ request()->is('sifat_cahaya') ? 'active-link' : '' }}">
                        Sifat Cahaya
                    </a>

                    <a href="/spektrum_cahaya"
                       class="{{ request()->is('spektrum_cahaya') ? 'active-link' : '' }}">
                        Spektrum Cahaya
                    </a>

                    <a href="/fenomena_apk_cahaya"
                       class="{{ request()->is('fenomena_apk_cahaya') ? 'active-link' : '' }}">
                        Fenomena & Aplikasi
                    </a>

                    <a href="/kuis_cahaya"
                       class="{{ request()->is('kuis_cahaya') ? 'active-link' : '' }}">
                        Kuis 3
                    </a>

                </div>
            </div>

        </div>
    </aside>


    {{-- ======================
         CONTENT
    ======================= --}}
    <main class="main-content">
        @yield('siswa-content')
    </main>

</div>

@endsection
