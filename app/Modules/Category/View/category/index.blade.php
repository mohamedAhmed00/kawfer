@extends('layout')
@section('content-admin')
    @php
        $page = "category";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل الاقسام</h3>

            @can('create', \App\Modules\Category\Model\Category::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.category.create') }}"
                           class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>اضافة
                        </a>
                    </div>
                </div>
            @endcan


            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Category\Model\Category::class)
                            <th># القسم</th>
                        @endcan
                        <th>االاسم</th>
                        <th>الصورة</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Category\Model\Category::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Category\Model\Category::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Category\Model\Category::class)
                                <td>
                                    <a href="{{ route('auth.category.edit',$category->id) }}">{{ $loop->iteration }}</a>
                                </td>
                            @endcan
                            <td>{{ $category->name }}</td>
                            <td class="account-item text-center"><img src="{{ asset($category->image )}}"
                                                                      class="image float-none" alt=""></td>
                            <td><span class="status--process">{{ $category->created_at->diffForHumans() }}</span></td>

                            @if (Auth::user()->can('update', $category) Or Auth::user()->can('delete', $category))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Category\Model\Category::class)
                                            <a href="{{ route('auth.category.edit',$category->id) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Category\Model\Category::class)
                                            <a href="{{ route('auth.category.delete',$category->id) }}"
                                               class="item delete"
                                               data-toggle="tooltip" data-placement="top" title="حذف">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        @endcan
                                    </div>
                                </td>
                            @endif
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>

@endsection

@section('delete-script')
    <script>
        $(".delete").on("click", function () {
            return confirm("هل تريد حذف هذا العنصر ؟");
        });
    </script>
@endsection
