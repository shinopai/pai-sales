<x-app-layout>
  <form method="POST" action="{{ route('performances.create.submit') }}" class="form" novalidate>
        @csrf

        <!-- 購入日 -->
        <div class="form__item">
            <x-input-label for="sales_date" :value="__('購入日')" class="form__label" />
            <x-text-input id="sales_date" class="form__text-field" type="datetime-local" name="sales_date" :value="old('sales_date')" required autofocus autocomplete="sales_date" />
            <x-input-error :messages="$errors->get('sales_date')" class="form__err-msg" />
        </div>

        <!-- 数量 -->
        <div class="form__item">
            <x-input-label for="quantity" :value="__('数量')" class="form__label" /><br>
            <x-text-input id="quantity" class="form__text-field" type="text" name="quantity" :value="old('quantity')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('quantity')" class="form__err-msg" />
        </div>

        <!-- 顧客 -->
        <div class="form__item">
        <label for="customer_id" class="form__label">顧客</label><br>
        <select name="customer_id" id="customer_id" class="form__select">
          @foreach(\App\Models\Customer::all() as $customer)
          <option value="{{ $customer->id }}">{{ $customer->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- 店舗 -->
      <div class="form__item">
        <label for="store_id" class="form__label">店舗</label><br>
        <select name="store_id" id="store_id" class="form__select">
          @foreach(\App\Models\Store::all() as $store)
          <option value="{{ $store->id }}">{{ $store->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- 商品 -->
      <div class="form__item">
        <label for="item_id" class="form__label">商品</label><br>
        <select name="item_id" id="item_id" class="form__select">
          @foreach(\App\Models\Item::all() as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>

        <div class="form__item flex">
            <a class="form__link" href="{{ route('performances.index') }}">
                {{ __('前のページに戻る') }}
            </a>

            <x-primary-button class="form__submit">
                {{ __('作成') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
