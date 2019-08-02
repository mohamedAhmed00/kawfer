@extends('layout')
@section('content-admin')
    @php
        $page = "report";
    @endphp
    <div class="row">
        <h2>تقرير سنوي لعام 2018</h2>
        <br><br>
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">احصائيات ( ملخص )</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>السعر الاصلي</th>
                        <th>السعر النهائي</th>
                        <th>صافي الربح</th>
                        <th>العدد</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>الطلبات</td>
                        <td>4000</td>
                        <td>4400</td>
                        <td>400</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>العمليات</td>
                        <td>4000</td>
                        <td>4400</td>
                        <td>400</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>العملاء</td>
                        <td>4000</td>
                        <td>4400</td>
                        <td>400</td>
                        <td>15</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <br>

        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">الطلبات</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>الشهر</th>
                        <th class="text-right">السعر الاصلي</th>
                        <th class="text-right">السعر النهائي</th>
                        <th class="text-right">صافي الربح</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1200.00</td>
                        <td class="text-right">300.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>

        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">العمليات</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>الشهر</th>
                        <th class="text-right">السعر</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td class="text-right">1200.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">العمال</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>اسم العامل</th>
                        <th>عدد العملاء</th>
                        <th class="text-right">السعر</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>نادر احمد</td>
                        <td>5</td>
                        <td class="text-right">$999.00</td>
                    </tr>
                    <tr>
                        <td>نادر احمد</td>
                        <td>5</td>
                        <td class="text-right">$999.00</td>
                    </tr>
                    <tr>
                        <td>نادر احمد</td>
                        <td>5</td>
                        <td class="text-right">$999.00</td>
                    </tr>
                    <tr>
                        <td>نادر احمد</td>
                        <td>5</td>
                        <td class="text-right">$999.00</td>
                    </tr>
                    <tr>
                        <td>نادر احمد</td>
                        <td>5</td>
                        <td class="text-right">$999.00</td>
                    </tr>
                    <tr>
                        <td>نادر احمد</td>
                        <td>5</td>
                        <td class="text-right">$999.00</td>
                    </tr>
                    <tr>
                        <td>نادر احمد</td>
                        <td>5</td>
                        <td class="text-right">$999.00</td>
                    </tr>
                    <tr>
                        <td>نادر احمد</td>
                        <td>5</td>
                        <td class="text-right">$999.00</td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
