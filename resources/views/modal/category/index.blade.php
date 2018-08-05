<!-- Content Wrapper. Contains page content -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Service Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{ url('category') }}" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name">Name</label><span>*</span>
                        <input 
                            class="form-control align-center" 
                            placeholder="Name" 
                            maxlength="50" 
                            required 
                            name="name" 
                            type="text"
                            id="name"
                            value="">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label><span>*</span>
                        <textarea 
                            class="form-control align-center" 
                            placeholder="Description"
                            maxlength="100" 
                            required
                            name="description"
                            cols="50"
                            id="description"
                            rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>