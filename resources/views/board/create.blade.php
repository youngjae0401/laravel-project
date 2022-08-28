@extends('layouts.index')
@section('title', '게시판 글쓰기')

@section('content')
<form method="POST" action="{{ route('store') }}">
    @csrf
    <div class="form-box">
        <div class="label"><label for="title">제목</label></div>
        <div class="input"><input type="text" id="title" name="title" value="{{ old('title') }}"></div>
        @error('title')
            <div class="error"><span>{{ $errors->first('title') }}</span></div>
        @enderror
    </div>
    <div class="form-box textarea">
        <div class="label"><label for="content">내용</label></div>
        <div class="input"><textarea name="content" id="content" cols="30" rows="10"></textarea></div>
        @error('content')
            <div class="error"><span>{{ $errors->first('content') }}</span></div>
        @enderror
    </div>
    <div class="form-box">
        <div><input type="submit" class="btn" value="등록"></div>
    </div>
</form>
@endsection