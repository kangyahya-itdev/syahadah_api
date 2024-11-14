@extends('layouts.front')

@section('content')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center green-text">Register</h1>
      <div class="row center">
        <h5 class="center-align green-text">Masukan Data yang valid!</h5>
        <div class='row'>
        <form action="{{route('register')}}" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">smartphone</i>
                    <input id="text_telephone" type="tel" class="validate">
                    <label for="text_telephone">Handphone</label>
                </div>
            </div>
            <div class='row'>
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="text_name" type="text" class="validate">
                    <label for="text_name">Nama Lengkap</label>
                </div>
            </div>
            <div class='row'>
                <div class="input-field col s12">
                    <i class="material-icons prefix">mail</i>
                    <input id="text_mail" type="text" class="validate">
                    <label for="text_mail">Email</label>
                </div>
            </div>
            <div class='row'>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="text_password" type="text" class="validate">
                    <label for="text_password">Password</label>
                </div>
            </div>
            <div class='row'>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="text_conf_pass" type="text" class="validate">
                    <label for="text_conf_pass">Konfirmasi Password</label>
                </div>
            </div>
            <div class='row'>
                <div class="input-field col s12">
                    <i class="material-icons prefix">code</i>
                    <input id="icon_referral" type="text" class="validate">
                    <label for="icon_referral">Kode Referral</label>
                </div>
            </div>
            <div class='row'>
                <div class='input-field col s12'>
                    <input type="button" class='btn btn-primary' value="Gabung">
                </div>
                <p>Sudah punya akun? <a href='{{ route("login") }} '>Login</a></p>
            </div>
          </form>
        </div>
        
      </div>
      <br><br>
    </div>
  </div>
  @endsection