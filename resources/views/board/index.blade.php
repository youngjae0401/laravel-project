@extends('layouts.index')
@section('title', '게시판 목록')

@section('content')
<div class="list">
    <ul>
        @forelse($lists as $key => $list)
            <li>
                <div class="num">
                    <span>{{ $key + 1 }}</span>
                </div>
                <div class="content">
                    {{ $list->title }}
                </div>
                <div class="writer">
                    <span>{{ $list->user_id }}</span>
                </div>
                <div class="date">
                    <span>{{ $list->created_at }}</span>
                </div>
                <div class="etc">
                    <div><button class="btn">수정</button></div>
                    <div class="m-l-5"><button class="btn">삭제</button></div>
                </div>
            </li>
        @empty
            <li>
                <div class="null">
                    <span>데이터가 없습니다.</span>
                </div>
            </li>
        @endforelse
    </ul>
    <div class="write"><a href="{{ route('create') }}" class="btn">글쓰기</a></div>
</div>
@endsection