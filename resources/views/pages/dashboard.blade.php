@extends('template')

@section('title', 'PT Meksiko Login')

@section('content')
    @extends('components.add-item-modal')
    @extends('components.update-item-modal')
    <div class="position mx-auto">
        <div class="position-absolute start-50 top-50 h-50 w-75 translate-middle">
            <table class="table my-5">
                <thead class="m-5">
                    <form method="post" action="{{ url('/') }}"  class="d-flex" role="search">
                        @csrf
                        <div class="d-flex flex-row-reverse">
                            @if(Auth::check() && session('user')->isAdmin)
                                <div>
                                    <button type="button" class="btn btn-outline-success addEmployeeButton" data-bs-toggle="modal" data-bs-target="#addItemModal">
                                        Add Item
                                    </button>
                                </div>
                            @endif
                        </div>
                    </form>
                <tr class="mx-5">
                    <th scope="col">No</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Item Category</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Item Stock</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr class="align-middle">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ asset('pictures\\' . $item->picture) }}" width="150" height="150"></td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>
                            @if(session('user')->isAdmin)
                                <div class="">
                                    <button type="button" id="updateButton" value="
                                    {{ $item->getAttributes()['id'] . '~' .
                                       $item->categoryId . '~' .
                                       $item->name . '~' .
                                       $item->price . '~' .
                                       $item->stock . '~' .
                                       $item->category->name
                                    }}" class="btn btn-outline-warning updateButton" data-bs-toggle="modal" data-bs-target="#updateItemModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </button>
                                    <form class="py-1" action={{ url('deleteItem/' . $item->getAttributes()['id']) }} method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger flex-fill">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @else
                                @if((\App\Models\FactureDetail::where('invoiceId', '=', session('invoice'))->where('itemId', '=', $item->getAttributes()['id'])->first() === null))
                                <form action="{{ url('addFacture') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="
                                        {{ $item->getAttributes()['id'] }}" name="itemId">
                                    <button type="submit" id="updateButton" class="btn btn-outline-warning" name="addFacture">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="position-absolute end-0">
                {{ $items->links() }}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}" type="module"></script>
@endsection
