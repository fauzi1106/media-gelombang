@extends('layouts.app')

@section('title', 'Media Pembelajaran Interaktif')

@section('content')

<div class="landing-wrapper">

  <!-- BACKGROUND GRADIENT -->
  <div class="bg-gradient"></div>

  <!-- FLOATING SHAPES -->
  <div class="float-circle circle1"></div>
  <div class="float-circle circle2"></div>
  <div class="float-circle circle3"></div>

  <!-- MAIN CONTENT -->
  <div class="landing-content">
    <h1 class="landing-title">
      Media Pembelajaran <br>
      <span>Gelombang, Bunyi & Cahaya</span>
    </h1>

    <p class="landing-subtitle">
      Belajar fisika dengan visual, animasi, dan simulasi interaktif.
    </p>

    <a href="{{ url('pengantar_gelombang') }}" class="btn-start">
      Mulai Belajar 🚀
    </a>
  </div>

</div>

@endsection
