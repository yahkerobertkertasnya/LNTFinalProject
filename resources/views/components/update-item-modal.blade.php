<div class="modal fade" id="updateItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/updateItem/') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="itemId" id="updateId" value="">
                    <div class="mb-3">
                        <label for="itemCategory" class="form-label">Item Category</label>
                        <select name="itemCategory" class="form-control" id="itemCategory">
                            <option value=""></option>
                            @foreach($category as $cat)
                                <option value="{{ $cat->getAttributes()['id'] }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Item Name</label>
                        <input name="itemName" type="text" class="form-control" id="itemName">
                    </div>
                    <div class="mb-3">
                        <label for="itemPrice" class="form-label" >Item Price (Rp)</label>
                        <input name="itemPrice" type="number" class="form-control" id="itemPrice">
                    </div>
                    <div class="mb-3">
                        <label for="itemNumber" class="form-label">Item Amount</label>
                        <input name="itemNumber" type="number" class="form-control" id="itemNumber">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Item Picture</label>
                        <input name="itemPicture" class="form-control" type="file" id="itemPicture">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
