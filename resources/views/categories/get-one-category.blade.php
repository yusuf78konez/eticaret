<x-admin-layout>
    <x-slot name="breadcrumb">
        <h4>Kategori Düzenle</h4>
        <h1>{{ $kategori->category_name }}</h1>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4  border-right border-info">
                <form method="post" action="{{ route('update.category', $kategori->id) }}">
                    <input name="_method" value="put" type="hidden">
                    @csrf
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    @method('put')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="category_name">Kategori adı*</label>
                        <input type="text" value="{{ old('category_name', $kategori->category_name) }}"
                            name="category_name" class="form-control" id="category_name">
                    </div>
                    <button class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>




</x-admin-layout>
