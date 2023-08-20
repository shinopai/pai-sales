<x-app-layout>
  <!-- 検索エリア -->
  <div class="search">
    <h2 class="search__heading">検索条件</h2>
    <form action="" class="search-form flex">
      <div class="search-form__item">
        <label for="sales_date_from" class="search-form__label">日付</label>
        <input type="date" name="sales_date_from" id="sales_date_from" class="search-form__input">
        <span class="wavy">~</span>
        <input type="date" name="sales_date_to" class="search-form__input">
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
        <input type="text" name="item_name" id="item_name" class="search-form__input text">
      </div>
      <div class="search-form__item">
        <div class="search-form__btn-wrap">
          <input type="submit" value="検索" class="search-form__btn">
        </div>
        <input type="button" value="キャンセル" class="search-form__btn">
      </div>
    </form>
  </div>
</x-app-layout>
