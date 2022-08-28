@extends('layouts.index')
@section('title', '로그인')

@section('content')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-box">
        <div class="label"><label for="user_id">아이디</label></div>
        <div class="input"><input type="text" id="user_id" name="user_id" value="{{ old('user_id') }}"></div>
        @error('user_id')
            <div class="error"><span>{{ $errors->first('user_id') }}</span></div>
        @enderror
    </div>
    <div class="form-box">
        <div class="label"><label for="password">비밀번호</label></div>
        <div class="input"><input type="password" id="password" name="password"></div>
        @error('password')
            <div class="error"><span>{{ $errors->first('password') }}</span></div>
        @enderror
    </div>
    <div class="form-box">
        <div><input type="submit" class="btn" value="로그인"></div>
        <div class="m-l-5"><a href="{{ route('register') }}" class="btn">회원가입</a></div>
    </div>
</form>
@endsection