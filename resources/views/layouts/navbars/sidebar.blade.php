<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="#" class="simple-text logo-mini">
      {{ Auth::user()->departemen }}
    </a>
    <a href="#" class="simple-text logo-normal">
      {{ __('Utility Departement') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="/dashboard">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'tambah_proyek') active @endif">
        <a href="/proyek/tambah">
          <i class="now-ui-icons ui-1_simple-add"></i>
          <p> {{ __('Tambah Proyek') }} </p>
        </a>
      </li>
      <li class="@if ($activePage == 'detail_proyek') active @endif">
        <a href="/proyek">
          <i class="now-ui-icons education_atom"></i>
          <p> {{ __('Detail Proyek') }} </p>
        </a>
      </li>
      <li class = " @if ($activePage == 'histori_proyek') active @endif">
        <a href="/histori">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Histori Proyek') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'proyek_batal') active @endif">
        <a href="/batal">
          <i class="now-ui-icons ui-2_settings-90"></i>
          <p>{{ __('Proyek Batal') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'kalender') active @endif">
        <a href="/calendar">
          <i class="now-ui-icons ui-1_calendar-60"></i>
          <p>{{ __('kalender') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'rating_kontaktor') active @endif">
        <a href="#">
          <i class="now-ui-icons users_circle-08"></i>
          <p>{{ __('Rating Kontaktor') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'info') active @endif">        
        <a href="#">
          <i class="now-ui-icons travel_info"></i>
          <p>{{ __('Info') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>