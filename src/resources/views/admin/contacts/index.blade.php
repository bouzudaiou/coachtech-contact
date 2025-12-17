@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}" />
@endsection

@section('content')
    <div class="contact-list__content">
        <div class="contact-list__heading">
            <h2>管理画面用問い合わせ一覧</h2>
        </div>
        <table class="contact-list__table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>お名前</th>
                    <th>メールアドレス</th>
                    <th>カテゴリー</th>
                    <th>お問い合わせ内容</th>
                    <th>対応状況</th>
                    <th>作成日時</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->category->name }}</td>
                        <td>{{ Str::limit($contact->content, 30) }}</td>
                        <td>{{ $contact->status }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="/admin/contacts/{{ $contact->id }}" class="btn btn-edit">詳細</a>
                            <form action="/admin/contacts/{{ $contact->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-delete">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contacts->links() }}
    </div>
@endsection