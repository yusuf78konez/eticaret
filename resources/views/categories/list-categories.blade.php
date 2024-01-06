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

                <div id="accordion">
                    {{-- <div class="card mb-0">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                Collapsible Group Item #1
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum..
                            </div>
                        </div>
                    </div> --}}

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
                            echo "<a href='" . route('get-all-categories', $cat->id) . "'>";
                            echo $cat->category_name;
                            echo '</a>';
                            kategoriler($cat->id);
                    
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    
                    function kategoriler1($id = null)
                    {
                        $categories = App\Models\Category::where('category_id', $id)->get();
                        if (!isset($categories)) {
                            return;
                        }
                        echo "<div class='card mb-0'>";
                        foreach ($categories as $cat) {
                            echo "<div class='card-header'>";
                            echo "<a href='".route('get-all-categories', $cat->id)."'>$cat->category_name</a>";
                            echo "<a class='card-link' data-toggle='collapse' href='#collapse$cat->id'>";
                            echo "<i class='feather icon-align-justify'></i>";
                            echo '</a>';
                            echo '</div>';
                    
                            echo "<div id='collapse$cat->id' class='collapse multi-collapse' data-parent='#accordion'>";
                            echo "<div class='card-body'>";
                            kategoriler1($cat->id);
                            echo '</div>';
                            echo '</div>';
                    
                            // echo '<li>';
                            // echo "<a href='" . route('get-all-categories', $cat->id) . "'>";
                            // echo $cat->category_name;
                            // echo '</a>';
                            // kategoriler($cat->id);
                    
                            // echo '</li>';
                        }
                        echo '</div>';
                    }
                       kategoriler1();
                    ?>

                </div>


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
                <h4>
                    @if (isset($category->category_name))
                        <a href="{{ route('get-one-category', [$category->id]) }}"><i
                                class="fa fa-edit text-warning"></i> {{ $category->category_name }}</a>
                    @endif
                </h4>
                <form action="{{ route('create-category') }}" method="post">
                    @csrf
                    <input type="hidden" name='category_id' value="{{ $category->id ?? '' }}" />
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
                <h4>Alt kategoriler tablosu</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Kategori Adı</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>

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
