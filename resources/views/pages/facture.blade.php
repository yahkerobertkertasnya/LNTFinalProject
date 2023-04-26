@extends('template')

@section('title', 'PT Meksiko Login')

@section('content')
    <form action="{{ url('updateFacture') }}" method="post">
        @csrf
    <div class="position mx-auto">
        <div class="position-absolute start-50 top-50 h-50 w-75 translate-middle">
            <table class="table my-5">
                <thead class="m-5">
                <div class="container text-center">
                    <div class="row row-cols-auto py-3">
                        <div class="col d-flex align-items-center" style="width: 150px;">Invoice Id: </div>
                        <div> {{ $facture->getAttributes()['invoiceId'] }} </div>
                    </div>
                    <form>
                        <div class="row row-cols-auto py-3">
                            <div class="col d-flex align-items-center" style="width: 150px;">Address:</div>
                            <div class="col p-0">
                                <textarea type="" class="form-control" name="address" value={{$facture->address}} style="width: 500px;">{{$facture->address}}</textarea>
{{--                                <input type="" class="form-control" name="address" value={{$facture->address}} style="width: 200px;">--}}
                            </div>
                        </div>
                        <div class="row row-cols-auto py-3">
                            <div class="col d-flex align-items-center" style="width: 150px;">Postal Code:</div>
                            <div class="col p-0">
                                <input type="text" class="form-control" name="postalCode" value={{$facture->postalCode}} style="width: 200px;">
                            </div>
                        </div>
                </div>
                <tr class="mx-5">
                    <th scope="col">No</th>
                    <th scope="col">Item Category</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @php($totalPrice = 0)
                @foreach($facture->factureDetail as $detail)
                    <tr class="align-middle">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $detail->item->category->name }}</td>
                        <td>{{ $detail->item->name }}</td>
                        <td>{{ $detail->item->price }}</td>
                        <td><input type="number" name="item-{{ $detail->item->getAttributes()['id'] }}" value="{{ $detail->quantity }}"></td>
                        <td>{{ $detail->quantity * $detail->item->price }}</td>
                    </tr>
                    @php($totalPrice += $detail->quantity * $detail->item->price)
                @endforeach
                    <tr>
                        <th> Total Price </th>
                        <td />
                        <td />
                        <td />
                        <td />
                        <td>
                            {{ $totalPrice }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex flex-row-reverse">
                <div class="p-2"><button type="submit" class="btn btn-outline-success">Save Data</button></div>
            </div>
        </div>
    </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}" type="module"></script>
@endsection
