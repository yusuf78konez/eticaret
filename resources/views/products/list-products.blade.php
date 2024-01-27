<x-admin-layout>
    <x-slot name="breadcrumb">
        <h4>Tüm Ürünler</h4>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('olustur.urun') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Ürün Adı*</label>
                        <input name="name" class="form-control">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kategori Id*</label>
                        <input name="category_id" class="form-control">
                        @error('category_id')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Urun Fiyatı*</label>
                        <input name="price" class="form-control">
                        @error('price')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Urun Miktarı*</label>
                        <input name="amount" class="form-control">
                        @error('amount')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Urun Detay*</label>
                        <input name="detail" class="form-control">
                        @error('detail')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="col-lg-6">

            </div>
        </div>
    </div>
</x-admin-layout>
