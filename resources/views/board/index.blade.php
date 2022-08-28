@extends('layouts.index')
@section('title', '게시판 목록')

@section('content')
<div class="list">
    <ul>
        <li>
            <div class="num">
                <span>1</span>
            </div>
            <div class="content">
                내용
            </div>
            <div class="writer">
                <span>조영재</span>
            </div>
            <div class="date">
                <span>2022-08-27 00:00:00</span>
            </div>
            <div class="etc">
                <div><button class="btn">수정</button></div>
                <div class="m-l-5"><button class="btn">삭제</button></div>
            </div>
        </li>
    </ul>
    <div class="write"><a href="{{ route('create') }}" class="btn">글쓰기</a></div>
</div>
@endsection