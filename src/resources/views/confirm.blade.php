@extends('layouts.app')

  @section('css')'
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
  @endsection

@section('content')
    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>お問い合わせ内容確認</h2>
      </div>
      <form action="/contact/thanks" method="POST" >
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                <input type="text" name="name" value="{{ $form['name'] }}" readonly  />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                <input type="email" name="email" value="{{ $form['email'] }}" readonly  />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">カテゴリ</th>
              <td class="confirm-table__text">
                <input type="hidden" name="category_id" value="{{ $form['category_id'] }}" />
                {{ $category->name }}
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                <input type="text" name="content" value="{{ $form['content'] }}" readonly  />
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button type="submit" formaction="/contact/edit">修正</button>
          <button type="submit">送信</button>
        </div>
      </form>
    </div>
@endsection 
