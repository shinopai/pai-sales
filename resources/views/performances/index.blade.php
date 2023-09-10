<x-app-layout>
  <!-- 検索エリア -->
  <div class="search">
    <h2 class="search__heading">検索条件</h2>
    <form action="" class="search-form flex">
      <div class="search-form__item">
        <label for="sales_date_from" class="search-form__label">日付</label>
        <input
          type="date"
          name="sales_date_from"
          id="sales_date_from"
          class="search-form__input"
        />
        <span class="wavy">~</span>
        <input type="date" name="sales_date_to" class="search-form__input" />
      </div>
      <div class="search-form__item">
        <label for="store_id" class="search-form__label">店舗</label>
        <select name="store_id" id="store_id" class="search-form__select">
          @foreach(\App\Models\Store::all() as $store)
          <option value="{{ $store->id }}">{{ $store->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="search-form__item">
        <label for="item_name" class="search-form__label">商品</label>
        <input
          type="text"
          name="item_name"
          id="item_name"
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
      <a
        href="{{ route('performances.create.index') }}"
        class="upper-btns__btn create"
        >新規作成</a
      >
    </div>
    <div class="upper-numbers flex">
      <span class="upper-numbers__sum">合計&nbsp;</span>
      <span class="upper-numbers__total"
        >{{ $performances->total() }}&nbsp;件</span
      >
    </div>
  </div>

  <!-- フラッシュメッセージ -->
  @if (session('flash'))
  <p class="flash-msg">{{ session("flash") }}</p>
  @endif

  <div class="table-wrap">
    <table class="table">
      <tr>
        <th>日付</th>
        <th>店舗</th>
        <th>商品</th>
        <th>単価</th>
        <th>個数</th>
        <th>金額</th>
        <th></th>
      </tr>
      @foreach($performances as $performance)
      <tr>
        <td>
          {{ \Carbon\Carbon::parse($performance->sales_date)->format('Y/m/d H:m') }}
        </td>
        <td>{{ $performance->store->name }}</td>
        <td>{{ $performance->item->name }}</td>
        <td>{{ number_format($performance->item->price) }}</td>
        <td>{{ $performance->quantity }}</td>
        <td>
          {{ Functions::getTotalAmount($performance->item->price, $performance->quantity) }}
        </td>
        <td>
          <div class="flex">
            <a
              href="{{ route('performances.edit.index', ['performance' => $performance->id]) }}"
              class="table__btn edit"
              >編集</a
            >
            <a
              href="{{ route('performances.delete.confirm', ['performance' => $performance->id]) }}"
              class="table__btn delete iframe"
              >削除</a
            >
          </div>
        </td>
      </tr>
      @endforeach
    </table>
  </div>

  {{ $performances->links('vendor.pagination.default') }}

  <script src="{{ asset('js/modaal/main.js') }}"></script>
</x-app-layout>
