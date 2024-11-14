@extends('layouts.users')
@section('content')
<!-- Balance Section -->
<div class="container">
    <div class="balance-card z-depth-2">
      <h6><i class='material-icons'>account_balance_wallet</i>Saldo Dompet</h6>
      <h4>Rp 611.312,00</h4>
      <h6>Saldo Pendapatan</h6>
      <h5>Rp. 10.611.312,00</h5>
    </div>

    <!-- Quick Access Menu -->
    <div class="row">
      <div class="col s6 menu-item">
        <i class="material-icons">money</i>
        <p class="menu-label">Withdrawal</p>
      </div>
      <div class="col s6 menu-item">
        <i class="material-icons">phone_android</i>
        <p class="menu-label">Top Up</p>
      </div>
    </div>

    <!-- Search Feature -->
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">search</i>
        <input type="text" id="search-feature">
        <label for="search-feature">Cari Fitur</label>
      </div>
    </div>

    <!-- Feature Section -->
  </div>
@endsection