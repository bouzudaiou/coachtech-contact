@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')
    <div class="contact-show__content">
        <div class="contact-show__heading">
            <h2>管理画面用問い合わせ詳細</h2>
        </div>

        <div class="contact-show__detail">
            <div class="detail-row">
                <div class="detail-label">ID</div>
                <div class="detail-value">{{ $contact->id }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">お名前</div>
                <div class="detail-value">{{ $contact->name }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">メールアドレス</div>
                <div class="detail-value">{{ $contact->email }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">カテゴリー</div>
                <div class="detail-value category">{{ $contact->category->name }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">お問い合わせー</div>
                <div class="detail-value">{{ $contact->content }}</div>
            </div>

            <form action="/admin/contacts/{{ $contact->id }}" method="post">
            @csrf
            @method('PATCH')
            <select name="status">
                <option value="未対応" {{ $contact->status == '未対応' ? 'selected' : '' }}>未対応</option>
                <option value="対応中" {{ $contact->status == '対応中' ? 'selected' : '' }}>対応中</option>
                <option value="対応済み" {{ $contact->status == '対応済み' ? 'selected' : '' }}>対応済み</option>
            </select>
            <button type="submit">保存</button>
            </form>

            <div class="detail-row">
                <div class="detail-label">作成日時</div>
                <div class="detail-value">{{ $contact->created_at->format('Y-m-d H:i:s') }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">更新日時</div>
                <div class="detail-value">{{ $contact->updated_at->format('Y-m-d H:i:s') }}</div>
            </div>
            <a href="/admin/contacts">一覧に戻る</a>
        </div>
     </div>
@endsection