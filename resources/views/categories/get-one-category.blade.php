<x-admin-layout>
    <x-slot name="breadcrumb">
        <h4>Kategori Düzenle</h4>
        <h1>{{ $kategori->category_name }}</h1>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Kategori Form</h4>
                    </div>
                    <div class="card-body">
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
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Özellikler Formu</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('create.property')}}" method="post">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $kategori->id }}">
                            <div class="form-group">
                                <label for="property_name">Özellik Adı*</label>
                                <input type="text" class="form-control" name="property_name" id="property_name">
                            </div>
                            <div class="form-group">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="category_type"
                                            value="text">Metin
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="category_type"
                                            value="radio">Tek seçim
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="category_type"
                                            value="enum">Çok seçim
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary">Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <ul>
                    @foreach($kategori->properties as $property)
                    <li>{{$property->name}}</li>
                    @endforeach
                </ul>
              
            </div>
        </div>
    </div>




</x-admin-layout>
