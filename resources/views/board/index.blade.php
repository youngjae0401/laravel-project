@extends('layouts.index')
@section('title', '게시판 목록')

@section('content')
<div class="list">
    <ul>
        <li class="top">
            <div class="num">
                <span>번호</span>
            </div>
            <div class="content">
                제목
            </div>
            <div class="writer">
                <span>작성자</span>
            </div>
            <div class="date">
                <span>생성일</span>
            </div>
            <div class="etc">
            </div>
        </li>
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
                    @if($user_id == $list->user_idx)
                        <div><a class="btn" href="{{ route('show', ['id' => $list->id]) }}">수정</a></div>
                        <form method="POST" action="{{ route('delete', ['id' => $list->id]) }}">
                            @method('DELETE')
                            @csrf
                            <div class="m-l-5"><button class="btn">삭제</button></div>
                        </form>
                    @endif
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