{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
@section('title', 'Dashboard')
<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    @if (Auth::user())
                                    <h4 class="fs-16 mb-1">Welcome {{ Auth::user()->name }}</h4>
                                    @else
                                    <h4 class="fs-16 mb-1">Welcome Guest User</h4> </span>
                                    @endif

                                    <p class="text-muted mb-0">
                                        Here's what's happening with your store today.
                                    </p>
                                </div>
                            </div>
                            <!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-xl-2 col-md-6">
                            <div class="card card-animate rounded-0 py-0" style="border-bottom: 4px solid #ff8d4f;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <div class="overflow-hidden">
                                            <img src="{{asset('assets/images/icons/order.png')}}" alt="" height="30" width="30">
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                All Orders
                                            </p>
                                        </div>
                                        <div class="float-end">
                                            <h4 class="mt-1">
                                                <span class="counter-value" data-target="{{$allorderscnt}}">{{$allorderscnt}}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6">
                            <div class="card card-animate rounded-0 py-0" style="border-bottom: 4px solid #ff8d4f;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <div class="overflow-hidden">
                                            <img src="{{asset('assets/images/icons/hand.png')}}" alt="" height="30" width="30">
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Orders in Hold
                                            </p>
                                        </div>
                                        <div class="float-end">
                                            <h4 class="mt-1">
                                                <span class="counter-value" data-target="{{$ordershold}}">{{$ordershold}}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6">
                            <div class="card card-animate rounded-0 py-0" style="border-bottom: 4px solid #ff8d4f;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <div class="overflow-hidden">
                                            <img src="{{asset('assets/images/icons/commercial.png')}}" alt="" height="30" width="30">
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Orders in Processing
                                            </p>
                                        </div>
                                        <div class="float-end">
                                            <h4 class="mt-1">
                                                <span class="counter-value" data-target="{{$orderspending}}">{{$orderspending}}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6">
                            <div class="card card-animate rounded-0 py-0" style="border-bottom: 4px solid #ff8d4f;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <div class="overflow-hidden">
                                            <img src="{{asset('assets/images/icons/cancelled.png')}}" alt="" height="30" width="30">
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Orders Cancelled
                                            </p>
                                        </div>
                                        <div class="float-end">
                                            <h4 class="mt-1">
                                                <span class="counter-value" data-target="{{$orderscancelled}}">{{$orderscancelled}}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6">
                            <div class="card card-animate rounded-0 py-0" style="border-bottom: 4px solid #ff8d4f;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <div class="overflow-hidden">
                                            <img src="{{asset('assets/images/icons/coml.png')}}" alt="" height="30" width="30">
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Orders Completed
                                            </p>
                                        </div>
                                        <div class="float-end">
                                            <h4 class="mt-1">
                                                <span class="counter-value" data-target="{{$orderscompleted}}">{{$orderscompleted}}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6">
                            <div class="card card-animate rounded-0 py-0" style="border-bottom: 4px solid #ff8d4f;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-around">
                                        <div class="overflow-hidden">
                                            <img src="{{asset('assets/images/icons/team.png')}}" alt="" height="30" width="30">
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Registered Users
                                            </p>
                                        </div>
                                        <div class="float-end">
                                            <h4 class="mt-1">
                                                <span class="counter-value" data-target="{{$registerusercnt}}">{{$registerusercnt}}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">
                                        Orders Status
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div id="donutchart" style="width: 100%; height: 100%;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">
                                        Customer Wallet History
                                    </h4>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered  hover dt-responsive nowrap" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>
                                                    <th>Date</th>
                                                    <th>Customer Name</th>
                                                    <th>Transaction Type</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-body">
                                                @foreach ($credithistory->take(7) as $index => $data)
                                                <tr>
                                                    <th>{{$index + 1}}</th>
                                                    <td>{{$data->created_at->format('d M Y | h:i A') }}</td>
                                                    <td>{{$data->customername}}</td>
                                                    <td>
                                                        @if($data->transactiontype == 'Wallet Recharged')
                                                            Wallet Recharged
                                                        @elseif($data->transactiontype == 'serviceorder')
                                                           Service Order
                                                        @elseif($data->transactiontype == 'commission')
                                                            Commission Received
                                                        @endif
                                                    </td>
                                                    <td>₹ {{$data->amount}}/-</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">
                                        Recent Orders
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                            <thead class="text-muted table-light">
                                                <tr>
                                                    <th scope="col">Order ID</th>
                                                    <th scope="col">Customer</th>
                                                    <th scope="col">Service</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders->take(6) as $order)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('orderdetailsadmin', ['id' => $order->id]) }}" class="fw-medium link-primary">#Order{{$order->id}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">{{$order->customername}}</div>
                                                        </div>
                                                    </td>
                                                    <td>{{$order->servicename}}</td>
                                                    <td>
                                                        <span class="text-dark fw-bold">₹ {{$order->servicecharge}}/-</span>
                                                    </td>
                                                    <td>
                                                        @if($order->status == 'Unpaid')
                                                        <span class="badge bg-primary-subtle text-primary fs-6">Unpaid</span>
                                                        @elseif($order->status == 'Hold')
                                                        <span class="badge bg-secondary-subtle text-secondary fs-6">On Hold</span>
                                                        @elseif($order->status == 'Cancel')
                                                        <span class="badge bg-danger-subtle text-danger fs-6">Cancelled</span>
                                                        @elseif($order->status == 'Processing')
                                                        <span class="badge bg-info-subtle text-info fs-6">Processing</span>
                                                        @else
                                                        <span class="badge bg-success-subtle text-success fs-6">Completed</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var holds = {{$ordershold}};
                var inprocess = {{ $orderspending }};
                var completed = {{$orderscompleted}};
                var cancelled = {{$orderscancelled}};
                
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day']
                    , ['On Hold', holds]
                    , ['In Process', inprocess]
                    , ['Cancelled', cancelled]
                    , ['Completed', completed]
                ]);

                var options = {
                    pieHole: 0.4, // Donut chart style
                    colors: [
                        '#FFC107', // Yellow for "On Hold"
                        '#17A2B8', // Blue for "In Process"
                        '#DC3545', // Red for "Cancelled"
                        '#28A745' // Green for "Completed"
                    ]
                , };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }

        </script>
</x-app-layout>
