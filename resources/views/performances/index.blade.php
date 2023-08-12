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
        </select>
      </div>
      <div class="search-form__item">
        <label for="item_id" class="search-form__label">商品</label>
        <select name="item_id" id="item_id" class="search-form__select">
        </select>
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
