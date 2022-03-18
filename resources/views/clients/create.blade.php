
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success d-none d-flex align-items-center" id="success-show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <p class="text-green-600" id="success"></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form  method="post" id="clientAdd" enctype="multipart/form-data">
                    @csrf
                    <div class=" mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name"  id="name" >
                        <span id="name"></span>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">UserName</label>
                        <input type="text" class="form-control"     name="username" id="username" >
                    </div>
                    <div class="  mb-3">
                        <label for="exampleInputEmail1" class="form-label ">Email address</label>
                        <input type="email" class="form-control "    name="email" id="email" >
                    </div>
                    <div class=" mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control"   name="phone" id="phone" >
                    </div>
                    <div class=" mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control"  name="country" id="country" >
                    </div>
                    <div class=" mb-3">
                        <input class="form-control form-control" name="picture" id="picture" type="file">
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" style="color: #1a202c"  class="btn btn-primary hover:text-white-800" >Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" style="color: #1a202c"  class="btn btn-secondary close-add-modal" data-bs-dismiss="modal">Close</button>
                <button type="reset" style="color: #1a202c"  class="btn btn-secondary reset-modal" >Reset</button>
            </div>
        </div>
    </div>
</div>
