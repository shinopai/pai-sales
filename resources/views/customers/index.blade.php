<x-app-layout>
  <!-- 検索エリア -->
  <div class="search">
    <h2 class="search__heading">検索条件</h2>
    <form action="" class="search-form flex">
      <div class="search-form__item">
        <label for="name" class="search-form__label">名前</label>
        <input
          type="text"
          name="name"
          id="name"
          class="search-form__input text"
        />
      </div>
      <div class="search-form__item">
        <div class="search-form__btn-wrap">
          <input type="submit" value="検索" class="search-form__btn" />
        </div>
        <input type="button" value="キャンセル" class="search-form__btn" />
      </div>
    </form>
  </div>

  <div class="upper flex">
    <div class="upper-btns flex">
      <a href="" class="upper-btns__btn create">新規作成</a>
      <a href="" class="upper-btns__btn edit">編集</a>
      <a href="" class="upper-btns__btn delete">削除</a>
    </div>
  </div>

  <div class="table-wrap">
    <table class="table">
      <tr>
        <th>会員番号</th>
        <th>名前</th>
        <th>性別</th>
        <th>誕生日</th>
        <th>郵便</th>
        <th>住所</th>
        <th>電話番号</th>
        <th>最終購入日</th>
        <th>購入合計</th>
      </tr>
      @foreach($customers as $customer)
      <tr>
        <td>{{ $customer->membership_number }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->sex }}</td>
        <td>
          {{ $customer->birth_year }}/{{ $customer->birth_month

          }}/{{ $customer->birth_day }}
        </td>
        <td>{{ substr_replace($customer->zip, '-', 3, 0) }}</td>
        <td>{{ $customer->address }}</td>
        <td>{{ $customer->tel }}</td>
        <td>{{ Functions::getLastPurchaseDate($customer->id) }}</td>
        <td>{{ Functions::getTotalPurchasePrice($customer->id) }}</td>
      </tr>
      @endforeach
    </table>
  </div>

  {{ $customers->links('vendor.pagination.default') }}
</x-app-layout>
