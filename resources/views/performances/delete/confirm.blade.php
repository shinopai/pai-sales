<x-modal-layout>
  <h2 class="modaal-iframe__heading">
    売上データ{{ $performance->id }}の削除
  </h2>
  <p class="modaal-iframe__txt">
    売上データ{{ $performance->id }}を削除します。宜しいですか？
  </p>
  <form action="{{ route('performances.delete.submit', ['performance' => $performance->id]) }}" class="modaal-iframe__form flex" method="POST">
    @csrf
    @method('delete')
    <a href="{{ route('performances.index') }}" target="_top">
      <button type="button" class="modaal-iframe__btn cancel">キャンセル</button>
    </a>
    <button type="submit" class="modaal-iframe__btn update">削除</button>
  </form>
</x-modal-layout>
