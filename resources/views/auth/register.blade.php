@extends('layouts.index')
@section('title', '회원가입')

@section('content')

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-box">
        <div class="label"><label for="user_id">아이디</label></div>
        <div class="input"><input type="text" id="user_id" name="user_id" value="{{ old('user_id') }}"></div>
        @error('user_id')
            <div class="error"><span>{{ $errors->first('user_id') }}</span></div>
        @enderror
    </div>
    <div class="form-box">
        <div class="label"><label for="user_pw">비밀번호</label></div>
        <div class="input"><input type="password" id="user_pw" name="user_pw"></div>
        @error('user_pw')
            <div class="error"><span>{{ $errors->first('user_pw') }}</span></div>
        @enderror
    </div>
    <div class="form-box">
        <div class="label"><label for="user_email">이메일</label></div>
        <div class="input"><input type="text" id="user_email" name="user_email" value="{{ old('user_email') }}"></div>
        @error('user_email')
            <div class="error"><span>{{ $errors->first('user_email') }}</span></div>
        @enderror
    </div>
    <div class="form-box">
        <div class="submit"><input type="submit" value="회원가입"></div>
    </div>
</form>
@endsection