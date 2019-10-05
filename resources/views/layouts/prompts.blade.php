<div class="modal" id="delete-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Really???</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you absolutely sure???</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Never mind</button>
                <button type="submit" form="form-delete" class="btn btn-primary">Yep</button>
            </div>
        </div>
    </div>
</div>


<script>
    function deleteHandle(id){
        $('#delete-modal').modal('show');
    }
</script>