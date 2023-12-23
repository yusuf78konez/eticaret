<x-admin-layout>
    <x-slot name="title">
        Kategoriler
    </x-slot>
    <x-slot name="breadcrumb">
        <div class="page-header-title">
            <h5 class="m-b-10">{{ $category->category_name ?? 'Kategoriler' }}</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
        </ul>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </x-slot>


    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <?php
                
                function kategoriler($id = null)
                {
                    $categories = App\Models\Category::where('category_id', $id)->get();
                    if (!isset($categories)) {
                        return;
                    }
                    echo '<ul>';
                    foreach ($categories as $cat) {
                        echo '<li>';
                        echo $cat->category_name;
                        kategoriler($cat->id);
                        echo '</li>';
                    }    
                    echo '</ul>';
                }
                kategoriler();
                ?>



            </div>
            <div class="col-lg-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $mesaj)
                                <li>{{ $mesaj }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
                <form action="{{ route('create-category') }}" method="post">
                    @csrf
                    <input type="" name='category_id' value="{{ $category->id ?? '' }}" />
                    <div class="form-group">
                        <label for="category_name">Kategori Adı*</label>
                        <input name="category_name" class="form-control" id="category_name">
                        @error('category_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Kaydet</button>
                </form>
            </div>
            <div class="col-lg-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Düzenle</th>
                            <th>Kategori Adı</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>sil</td>
                                <td>
                                    <a href="{{ route('get-one-category', $category->id) }}">
                                        {{ $category->category_name }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</x-admin-layout>
