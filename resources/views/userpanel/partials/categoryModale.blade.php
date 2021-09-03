


<!-- Create Category -->
<div class="modal" id="addCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addCategory">
            @csrf

            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body">
                <div class="form-group">
                    <label for="CategoryName">Category Name</label>
                    <input type="text" class="form-control" id="category_name"  name="category_name" placeholder="Category name.. ">
                </div>
            </div>


            <div class="modal-footer">
                <button type="submit" class="bnt btn-success">Create</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
